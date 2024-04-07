<?php

namespace Database\Factories;

use App\Models\Brand;
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
        $number = random_int(100, 999) . fake()->regexify('[A-Z]{3}') . random_int(10, 99);

        return [
            'number' => $number,
            'brand_id' => Brand::all()->random()->id,
            'year' => random_int(1994, 2024),
            'seats' => random_int(1, 4),
        ];
    }
}
