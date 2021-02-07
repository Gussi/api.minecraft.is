<?php

namespace Tests\Feature;

use App\Models\Server;
use App\Models\ServerStatus;
use App\Models\ServerStatusPlayer;
use App\Models\ServerStatusPlugin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

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
}
