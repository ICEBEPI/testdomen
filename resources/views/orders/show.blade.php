@extends('master')
@section('content')
    <h1 class="text-3xl font-bold mb-4 text-center text-gray-800">{{ $title ?? 'Данные заказа' }}</h1>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h2 class="text-2xl font-bold underline"><a href="{{ route('orders.edit', $order) }}">Редактировать</a></h2>
    </div>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h1 class="text-xl font-semibold mb-2">Номер заказа:</h1>

        <h2 class="text-2xl font-bold underline"> <a href="{{ route('orders.edit', $order) }}">{{ $order->id }}
        </h2></a>
    </div>



    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        {{-- @if ($order->services->count())
                            <h2 class="text-xl font-semibold mb-2 mt-4">Заказанные услуги:</h2>
                            <ol class="text-2xl font-bold">
                                @foreach ($order->services as $service)
                                    <li>
                                        <a href="{{ route("services.show", $service) }}">
                                            {{ $service->number }}
                                        </a>
                                    </li>
                                @endforeach
                            </ol>
                        @endif --}}
        @if ($order->payments->count())
            <h2 class="text-xl font-semibold mb-2 mt-4">Платежи:</h2>
            <ol class="text-2xl font-bold">
                @foreach ($order->payments as $payment)
                    <li>
                        <a href="{{ route('payments.show', $payment) }}">
                            {{ $payment->sum }}
                        </a>
                    </li>
                @endforeach
            </ol>
        @endif
        @if ($order->payments->count() == 0)
            <h2 class="text-xl font-semibold mb-2 mt-4">Нет платежей</h2>
        @endif
    </div>

@endsection
