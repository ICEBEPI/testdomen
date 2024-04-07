<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = Service::all();
        Order::factory()->count(20)->create();
        $orders = Order::all();
        foreach($orders as $order){
            $randomServices = $services->random(random_int(1, 5));
            $order->services()->attach($randomServices);
            $sum = $randomServices->sum('price');
            $order->sum = $sum;
            $order->save();
        }
    }
}
