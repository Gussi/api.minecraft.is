<?php

namespace Database\Factories;

use App\Models\ServerStatus;
use App\Models\ServerStatusPlugin;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServerStatusPluginFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServerStatusPlugin::class;

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
