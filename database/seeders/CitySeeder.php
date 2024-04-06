<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
        foreach ($cities as $city) {
            City::factory()->create([
                'name' => $city
            ]);
        }
    }
}
