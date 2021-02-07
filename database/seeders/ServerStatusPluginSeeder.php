<?php

namespace Database\Seeders;

use App\Models\ServerStatusPlugin;

use Illuminate\Database\Seeder;

class ServerStatusPluginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServerStatusPlugin::factory()
            ->count(50)
            ->create();
    }
}
