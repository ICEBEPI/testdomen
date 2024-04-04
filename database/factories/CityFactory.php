<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
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
            'Костанай',
            'Павлодар',
            'Петропавл',
            'Семей',
        ];

        $cityKey = array_rand($cities);
        $city = $cities[$cityKey];

        return [
            'name' => $city,
        ];
    }
}
