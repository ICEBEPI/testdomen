<?php

namespace Database\Factories;

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
        $types = ['benzine', 'diezel', 'electric'];
        $typeKey = array_rand($types);
        $type = $types[$typeKey];
        return [
            'volume' => random_int(10, 80) / 10,
            'type' => $type,
            'hp' => random_int(90, 600)
        ];

    }


}
