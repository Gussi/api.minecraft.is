<?php

namespace Tests\Feature;

use App\Models\ServerStatusPlayer;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class ServerStatusPlayerTest extends TestCase
{
    public function test_factory()
    {
        $server_status_players = ServerStatusPlayer::factory()->create();

        $this->assertInstanceOf(ServerStatusPlayer::class, $server_status_players);
    }
}
