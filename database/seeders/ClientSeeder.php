<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::factory()->count(20)->create();
        $cars = Car::all();
        $clients = Client::all();
        foreach($cars as $car){
            $client = $clients->random();
            $car->client_id = $client->id;
            $car->save();
        }
    }
}
