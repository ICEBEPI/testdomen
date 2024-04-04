@extends('master')
@section('content')
    <h1 class="text-3xl font-bold mb-4 text-center text-gray-800">{{ $title ?? 'Данные клиента' }}</h1>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h2 class="text-2xl font-bold underline"><a href="{{ route('clients.edit', $client) }}">Редактировать</a></h2>
    </div>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h1 class="text-xl font-semibold mb-2">ФИО:</h1>

        <h2 class="text-2xl font-bold font-bold underline"> <a href="{{ route('clients.edit', $client) }}">{{ $client->name }}
        </h2></a>
    </div>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h1 class="text-xl font-semibold mb-2">Номер телефона:</h1>
        <h2 class="text-2xl font-bold">{{ $client->phone }}</h2>
    </div>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h1 class="text-xl font-semibold mb-2">Город:</h1>
        <h2 class="text-2xl font-bold ">{{ $client->city->name }}</h2>
    </div>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h1 class="text-xl font-semibold mb-2">Год рождения:</h1>
        <h2 class="text-2xl font-bold">{{ $client->birthday }}</h2>
    </div>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        @if ($client->cars->count())
            <h2 class="text-xl font-semibold mb-2 mt-4">Список авто</h2>
            <ol class="text-2xl font-bold">
                @foreach ($client->cars as $car)
                    <li>
                        <a href="{{ route('cars.show', $car) }}">
                            {{ $car->brand }} ({{ $car->year }})
                        </a>
                    </li>
                @endforeach
            </ol>
        @endif
    </div>
    @if ($client->cars->count() == 0)
        <h2 class="text-xl font-semibold mb-2 mt-4">Нет авто</h2>
    @endif
@endsection
