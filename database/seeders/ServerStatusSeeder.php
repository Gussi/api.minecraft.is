<?php

namespace Database\Seeders;

use App\Models\ServerStatus;

use Illuminate\Database\Seeder;

class ServerStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServerStatus::factory()
            ->count(50)
            ->create();
    }
}
