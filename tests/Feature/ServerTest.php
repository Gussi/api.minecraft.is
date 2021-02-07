<?php

namespace Tests\Feature;

use App\Models\Server;
use App\Models\ServerStatus;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class ServerTest extends TestCase
{
    public function test_model_factory()
    {
        $server = Server::factory()->create();

        $this->assertInstanceOf(Server::class, $server);
    }

    public function test_model_relationship_status()
    {
        $count = 5;
        $server = Server::factory()
            ->has(ServerStatus::factory()->count($count))
            ->create();

        $this->assertCount($count, $server->serverStatus);
    }

    public function test_api_index()
    {
        Server::factory()
            ->count(50)
            ->create();

        $this->get('/api/server')
            ->assertStatus(200)
            ->assertJsonCount(15, 'data');
    }

    public function test_api_store()
    {
        $server = Server::factory()->make()->toArray();

        $this->post('/api/server', $server)
            ->assertStatus(201);

        $this->assertTrue(Server::count() == 1);
    }

    public function test_api_show()
    {
        $server = Server::factory()->create();

        $this->get("/api/server/{$server->id}")
            ->assertJson($server->toArray())
            ->assertStatus(200);
    }

    public function test_api_update()
    {
        $server = Server::factory()->create();
        $server_update = Server::factory()->make();
        $this->assertTrue($server->host != $server_update->host);

        $this->put("/api/server/{$server->id}", $server_update->toArray())
            ->assertStatus(200);

        $server->refresh();

        $this->assertTrue($server->host == $server_update->host);
    }

    public function test_api_destroy()
    {
        $server = Server::factory()->create();

        $this->delete("/api/server/{$server->id}")
            ->assertStatus(204);

        $this->assertTrue(Server::count() == 0);
    }
}
