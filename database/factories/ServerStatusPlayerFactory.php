<?php

namespace Database\Factories;

use App\Models\ServerStatus;
use App\Models\ServerStatusPlayer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServerStatusPlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServerStatusPlayer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->word,
        ];
    }
}
