<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            $orderSum = $order->sum;
            $countPayments = random_int(1, 5);
            if ($countPayments == 1) {
                Payment::create([
                    'order_id' => $order->id,
                    'sum' => $order->sum,
                ]);
            } else {
                $part = $orderSum / $countPayments;
                $particle = round($part / 10, -1);
                while ($part < $orderSum - $particle * 4) {
                    $newPart = round($part, -2) + $particle * random_int(0, 4);
                    Payment::create([
                        'order_id' => $order->id,
                        'sum' => $newPart,
                    ]);
                    $orderSum -= $newPart;
                }
                if ($order->is_closed) {
                    Payment::create([
                        'order_id' => $order->id,
                        'sum' => $orderSum,
                    ]);
                }
            }
        }
    }
}
