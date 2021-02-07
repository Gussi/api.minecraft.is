<?php

namespace Tests\Feature;

use App\Models\ServerStatus;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class ServerStatusTest extends TestCase
{
    public function test_factory()
    {
        $server_status = ServerStatus::factory()->create();

        $this->assertInstanceOf(ServerStatus::class, $server_status);
    }
}
