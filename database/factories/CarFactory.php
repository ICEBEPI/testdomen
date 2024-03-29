<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $brands = [
            'Audi',
            'Mercedes',
            'Jac',
            'Tesla',
            'BMW',
            'Daewoo',
        ];

        $brandkey = array_rand($brands);
        $brand = $brands[$brandkey];

        $number = random_int(100, 999) . fake()->regexify('[A-Z]{3}') . random_int(10, 99);


        return [
            'number' => $number,
            'brand' => $brand,
            'year' => random_int(1994, 2024),
            'seats' => random_int(1, 4),
        ];
    }
}
