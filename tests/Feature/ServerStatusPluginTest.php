<?php

namespace Tests\Feature;

use App\Models\ServerStatusPlugin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class ServerStatusPluginTest extends TestCase
{
    public function test_factory()
    {
        $server_status_plugin = ServerStatusPlugin::factory()->create();

        $this->assertInstanceOf(ServerStatusPlugin::class, $server_status_plugin);
    }
}
