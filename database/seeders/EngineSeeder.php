<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Engine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carsIds = Car::all()->pluck('id');
        foreach($carsIds as $carId){
            Engine::factory()->create([
                'car_id' => $carId,
            ]);
        }
        Engine::factory()->count(10)->create();
    }
}
