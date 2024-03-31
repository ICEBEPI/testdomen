@extends('master')
@section('content')
    <h1 class="text-3xl font-bold mb-4 text-center text-gray-800">{{ $title ?? 'Данные автомобиля' }}</h1>
    
    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h1 class="text-xl font-semibold mb-2">Владелец:</h1>
        <h2 class="text-2xl font-bold text-red-600 underline">{{ $car->client?->name ?? 'Нет владельца' }}</h2>
    </div>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h1 class="text-xl font-semibold mb-2">Номер авто:</h1>
        <h2 class="text-2xl font-bold text-red-600 underline">{{ $car->number }}</h2>
    </div>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h2 class="text-xl font-semibold mb-2">Год:</h2>
        <h2 class="text-2xl font-bold">{{ $car->year }}</h2>

        <h2 class="text-xl font-semibold mb-2 mt-4">Бренд:</h2>
        <h2 class="text-2xl font-bold">{{ $car->brand }}</h2>

        <h2 class="text-xl font-semibold mb-2 mt-4">Количество мест:</h2>
        <h2 class="text-2xl font-bold">{{ $car->seats }}</h2>
    </div>

    <h1 class="text-3xl font-bold mb-4 text-center text-gray-800">Двигатель:</h1>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h2 class="text-xl font-semibold mb-2">Объем:</h2>
        <h2 class="text-2xl font-bold">{{ $car->engine->volume }}</h2>

        <h2 class="text-xl font-semibold mb-2 mt-4">Тип:</h2>
        <h2 class="text-2xl font-bold">{{ $car->engine->type }}</h2>

        <h2 class="text-xl font-semibold mb-2 mt-4">Мощность:</h2>
        <h2 class="text-2xl font-bold">{{ $car->engine->hp }} л.с.</h2>
    </div>
@endsection
