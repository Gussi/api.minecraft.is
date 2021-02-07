<?php

namespace Tests\Feature;

use App\Models\Server;
use App\Models\ServerStatus;
use App\Models\ServerStatusPlugin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class ServerStatusPluginTest extends TestCase
{
    public function test_model_factory()
    {
        $server_status_plugin = ServerStatusPlugin::factory()
            ->for(ServerStatus::factory()
                ->for(Server::factory())
            )
            ->create();

        $this->assertInstanceOf(ServerStatusPlugin::class, $server_status_plugin);
    }

    public function test_model_relationship_server_status()
    {
        $server_status_plugin = ServerStatusPlugin::factory()
            ->for(ServerStatus::factory()
                ->for(Server::factory())
            )
            ->create();

        $this->assertInstanceOf(ServerStatus::class, $server_status_plugin->serverStatus);
    }
}
