@extends('master')
@section('content')
    <h1 class="text-3xl font-bold mb-4 text-center text-gray-800">{{ $title ?? 'Данные платежа' }}</h1>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h2 class="text-2xl font-bold underline"><a href="{{ route('payments.edit', $payment) }}">Редактировать</a></h2>
    </div>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h1 class="text-xl font-semibold mb-2">Номер заказа:</h1>

        <h2 class="text-2xl font-bold underline"> <a href="{{ route('orders.edit', $payment->order) }}">{{ $payment->order->id }}
        </h2></a>
    </div>



    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
            <h2 class="text-xl font-semibold mb-2">Номер платежа: {{ $payment->id }}</h2>
            <h2 class="text-xl font-semibold mb-2">Сумма платежа: {{ $payment->sum }}</h2>

        </div>
    </div>

@endsection
