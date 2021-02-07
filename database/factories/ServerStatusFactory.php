<?php

namespace Database\Factories;

use App\Models\Server;
use App\Models\ServerStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServerStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServerStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date'              => $this->faker->date,
            'hostname'          => $this->faker->domainName,
            'gametype'          => $this->faker->word,
            'version'           => '1.0.0',
            'map'               => $this->faker->word,
            'players_current'   => $this->faker->numberBetween(0, 64),
            'players_max'       => 64,
            'ip'                => $this->faker->localipv4,
            'software'          => $this->faker->word,
        ];
    }
}
