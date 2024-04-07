<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'Замена шин' => 5000,
            'Подкачка шин' => 500,
            'Покраска авто' => 20000,
            'Кап. ремонт двигателя' => 50000,
            'Замена масла' => 2000,
        ];


        foreach($services as $service => $price){
            Service::create([
                'name' => $service,
                'price' => $price,
            ]);
        }
    }
}
