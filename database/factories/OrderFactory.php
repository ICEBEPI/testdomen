<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $client = Client::whereHas('cars')->get()->random();
        $car = $client->cars->random();
        return [
            'client_id' => $client->id,
            'car_id' => $car->id,
            'sum' => 1,
            'is_closed' => random_int(0, 1)
        ];
    }
}
