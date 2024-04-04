<?php

namespace Database\Factories;

use App\Models\City;
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
        $cities = City::all();
        return [
            'name' => fake()->name(),
            'birthday' => fake()->date('Y-m-d', '2005-01-01'),
            'city_id' => $cities->random()->id,
            'phone' => fake()->phoneNumber(),
        ];
    }
}
