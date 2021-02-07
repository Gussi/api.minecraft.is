<?php

namespace Database\Seeders;

use App\Models\ServerStatusPlayer;

use Illuminate\Database\Seeder;

class ServerStatusPlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServerStatusPlayer::factory()
            ->count(50)
            ->create();
    }
}
