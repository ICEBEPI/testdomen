<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Car;
use App\Models\Client;
use App\Models\Service;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('payments', 'services')->orderByDesc('created_at')->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::all();
        $clients = Client::all();
        $services = Service::all();
        $orders = Order::all();
        return view('orders.create', compact('orders', 'services', 'clients', 'cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();
        $serviceIds = $data['service_ids'];
        $services = Service::findMany($serviceIds);
        if ($services->count() != count($serviceIds)) {
            return redirect()->route('orders.index')->withErrors('Одна или несколько услуг не найдены');
        }
        $sum = $services->sum('price');
        $order = Order::create([
            'client_id' => $data['client_id'],
            'car_id' => $data['car_id'],
            'is_closed' => 0,
            'sum' => $sum,
        ]);
        $order->services()->attach($serviceIds);
        return redirect()->route('orders.index')->with('success', 'Заказ создан успешно');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $cars = Car::all();
        $clients = Client::all();
        $services = Service::all();
        return view('orders.edit', compact('order', 'services', 'clients', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $data = $request->validated();
        $serviceIds = $data['service_ids'];
        $services = Service::findMany($serviceIds);
        if ($services->count() != count($serviceIds)) {
            return redirect()->route('orders.index')->withErrors('Одна или несколько услуг не найдены');
        }
        $sum = $services->sum('price');
        $order->update([
            'client_id' => $data['client_id'],
            'car_id' => $data['car_id'],
            'is_closed' => 0,
            'sum' => $sum,
        ]);
        $order->services()->detach();
        $order->services()->attach($serviceIds);
        return redirect()->route('orders.index')->with('success', 'Заказ успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if($order->payments->count() > 0){
            return redirect()->back()->withErrors('Заказ не может быть удален');
        }
        $order->delete();
        return redirect()->route('orders.index')->withSuccess('Заказ успешно удален');
    }
}
