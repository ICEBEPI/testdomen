@extends('master')

@section('content')
    <div class="p-20">
        @include('partials.alarm')
        <div class="grid grid-cols-3 gap-8">
            @foreach ($orders as $order)
                <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold underline">
                            <a href="{{ route('orders.edit', $order) }}"
                                class="text-blue-600 hover:text-blue-800">Редактировать</a>
                        </h2>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-700 font-semibold px-4 py-2 bg-red-100 hover:bg-red-200 rounded-lg flex items-center">
                                Удалить
                            </button>
                        </form>
                    </div>

                    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
                        <h2 class="text-xl font-semibold mb-2">Заказ: {{ $order->id }}</h2>
                        <h2 class="text-xl font-semibold mb-2">Общая сумма заказа: {{ $order->sum }}</h2>

                        {{-- @if ($order->services->count())
                <h2 class="text-xl font-semibold mb-2 mt-4">Заказанные услуги:</h2>
                <ol class="text-xl font-bold">
                    @foreach ($order->services as $service)
                    <li>{{ $service->name }}</li>
                    @endforeach
                </ol>
                @endif --}}

                        @if ($order->payments->count())
                            <h2 class="text-xl font-semibold mb-2 mt-4">Платежи:</h2>
                            <ol class="text-xl font-bold">
                                @foreach ($order->payments as $payment)
                                    <li>{{ $payment->sum }}</li>
                                @endforeach
                            </ol>
                        @else
                            <h2 class="text-xl font-semibold mb-2 mt-4">Нет платежей</h2>
                        @endif

                        @if ($order->is_closed == 1)
                            <h2 class="text-xl font-semibold mb-2 mt-4 text-green-500 underline">Заказ оплачен</h2>
                        @else
                            <h2 class="text-xl font-semibold mb-2 mt-4 text-red-500 underline">Заказ не оплачен</h2>
                        @endif


                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
