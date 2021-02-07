<?php

namespace Tests\Feature;

use App\Models\Server;
use App\Models\ServerStatus;
use App\Models\ServerStatusPlayer;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class ServerStatusPlayerTest extends TestCase
{
    public function test_model_factory()
    {
        $server_status_players = ServerStatusPlayer::factory()
            ->for(ServerStatus::factory()
                ->for(Server::factory())
            )
            ->create();

        $this->assertInstanceOf(ServerStatusPlayer::class, $server_status_players);
    }

    public function test_model_relationship_server_status()
    {
        $server_status_players = ServerStatusPlayer::factory()
            ->for(ServerStatus::factory()
                ->for(Server::factory())
            )
            ->create();

        $this->assertInstanceOf(ServerStatus::class, $server_status_players->serverStatus);
    }
}
