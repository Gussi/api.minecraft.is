<?php

namespace Database\Seeders;

use App\Models\Server;
use App\Models\ServerStatus;
use App\Models\ServerStatusPlayer;
use App\Models\ServerStatusPlugin;

use Illuminate\Database\Seeder;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Server::factory()
            ->has(ServerStatus::factory()->count(10)
                ->has(ServerStatusPlayer::factory()->count(8))
                ->has(ServerStatusPlugin::factory()->count(8))
            )
            ->count(25)
            ->create();
    }
}
