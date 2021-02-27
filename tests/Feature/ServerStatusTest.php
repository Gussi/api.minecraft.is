<?php

namespace Tests\Feature;

use App\Models\Server;
use App\Models\ServerStatus;
use App\Models\ServerStatusPlayer;
use App\Models\ServerStatusPlugin;
use App\Http\Resources\ServerStatusResource;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;

use Tests\TestCase;

class ServerStatusTest extends TestCase
{
    public function test_model_factory()
    {
        $server_status = ServerStatus::factory()
            ->for(Server::factory())
            ->create();

        $this->assertInstanceOf(ServerStatus::class, $server_status);
    }

    public function test_model_relationship_server()
    {
        $server_status = ServerStatus::factory()
            ->for(Server::factory())
            ->create();

        $this->assertInstanceOf(Server::class, $server_status->server);
    }

    public function test_model_relationship_server_status_player()
    {
        $count = 5;
        $server_status = ServerStatus::factory()
            ->for(Server::factory())
            ->has(ServerStatusPlayer::factory()->count($count))
            ->create();

        $this->assertInstanceOf(ServerStatusPlayer::class, $server_status->serverStatusPlayer->first());
        $this->assertCount($count, $server_status->serverStatusPlayer);
    }

    public function test_model_relationship_server_status_plugin()
    {
        $count = 5;
        $server_status = ServerStatus::factory()
            ->for(Server::factory())
            ->has(ServerStatusPlugin::factory()->count($count))
            ->create();

        $this->assertInstanceOf(ServerStatusPlugin::class, $server_status->serverStatusPlugin->first());
        $this->assertCount($count, $server_status->serverStatusPlugin);
    }

    public function test_api_index()
    {
        $count = 5;

        $server = Server::factory()
            ->has(ServerStatus::factory()->count($count))
            ->create();

        $this->getJson("/api/server/{$server['id']}/status")
            ->assertJsonCount($count, 'data')
            ->assertOk();
    }

    public function test_api_store()
    {
        $server = Server::factory()->create();
        $status = ServerStatus::factory()
            ->for($server)
            ->make();

        $this->postJson("/api/server/{$server['id']}/status", $status->toArray())
            ->assertForbidden();
    }

    public function test_api_show()
    {
        $status = ServerStatus::factory()
            ->for(Server::factory())
            ->create();

        $this->getJson("/api/server/{$status->server['id']}/status/{$status['id']}")
            ->assertOk();
    }

    public function test_api_update()
    {
        $status = ServerStatus::factory()
            ->for(Server::factory())
            ->create();

        $this->putJson("/api/server/{$status->server['id']}/status/{$status['id']}", ['name' => 'modified'])
            ->assertForbidden();
    }

    public function test_api_destroy()
    {
        $status = ServerStatus::factory()
            ->for(Server::factory())
            ->create();

        $this->deleteJson("/api/server/{$status->server['id']}/status/{$status['id']}")
            ->assertForbidden();
    }
}
