@extends('master')

@section('content')
    <div class="p-20">
        @include('partials.alarm')
        <div class="grid grid-cols-3 gap-8">
            @foreach ($payments as $payment)
                <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold underline">
                            <a href="{{ route('payments.edit', $payment) }}"
                                class="text-blue-600 hover:text-blue-800">Редактировать</a>
                        </h2>
                        <form action="{{ route('payments.destroy', $payment) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-700 font-semibold px-4 py-2 bg-red-100 hover:bg-red-200 rounded-lg flex items-center">
                                Удалить
                            </button>
                        </form>
                    </div>

                    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
                        <h2 class="text-xl font-semibold mb-2">Заказ: {{ $payment->order->id }}</h2>
                        <h2 class="text-xl font-semibold mb-2 underline"> <a href="{{ route('payments.show', $payment) }}">Номер платежа: {{ $payment->id }}</h2></a>
                        <h2 class="text-xl font-semibold mb-2">Сумма платежа: {{ $payment->sum }}</h2>
                        <h2 class="text-xl font-semibold mb-2">Общая сумма заказа: {{ $payment->order->sum }}</h2>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
