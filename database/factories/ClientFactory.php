<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cities = [
            'Алматы',
            'Астана',
            'Шымкент',
            'Тараз',
            'Караганда',
            'Кокшетау',
        ];
        return [
            'name' => fake()->name(),
            'birthday' => fake()->date('Y-m-d', '2005-01-01'),
            'city' => $cities[array_rand($cities)],
            'phone' => fake()->phoneNumber(),
        ];
    }
}
