@extends('master')
@section('content')
    <h1 class="text-3xl font-bold mb-4 text-center text-gray-800">{{ $title ?? 'Данные двигателя' }}</h1>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h2 class="text-2xl font-bold underline"><a href="{{ route('engines.edit', $engine) }}">Редактировать</a></h2>
    </div>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h2 class="text-xl font-semibold mb-2">Объем:</h2>
        <h2 class="text-2xl font-bold">{{ $engine->volume }}</h2>

        <h2 class="text-xl font-semibold mb-2 mt-4">Тип:</h2>
        <h2 class="text-2xl font-bold">{{ $engine->type }}</h2>

        <h2 class="text-xl font-semibold mb-2 mt-4">Мощность:</h2>
        <h2 class="text-2xl font-bold">{{ $engine->hp }} л.с.</h2>
        @if ($engine->car)
            <h2 class="text-xl font-semibold mb-2 mt-4">Установлен в машине:</h2>
            <h2 class="text-2xl font-bold underline"><a href="{{ route("cars.show", $engine->car) }}">{{ $engine->car->brand }}</h2>
        @else
            <h2 class="text-xl font-semibold mb-2 mt-4">Этот двигатель не привязан к какой-либо машине.</h2>
        @endif
    </div>
@endsection
