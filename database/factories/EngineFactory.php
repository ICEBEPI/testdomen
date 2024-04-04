<?php

namespace Database\Factories;

use App\Models\TypeEngine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Engine>
 */
class EngineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'volume' => random_int(10, 80) / 10,
            'type_engine_id' => TypeEngine::all()->random()->id,
            'hp' => random_int(90, 600)
        ];

    }


}
