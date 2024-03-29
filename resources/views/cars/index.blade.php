@extends('master')
@section('content')
    <div class="p-20">
        <div class="grid grid-cols-3 gap-8">
            @foreach ($cars as $car)
                <div><a class="block bg-slate-700 text-center py-4 text-3xl text-white font-semibold"
                        href="{{ route('cars.show', $car) }}">
                        <h1>{{ $car->number }} </h1>
                    </a>
                    <div class="p-8 bg-slate-400 text-2xl">
                        <ul>
                            <li>Модель: {{ $car->brand }}</li>
                            <li>Год выпуска: {{ $car->year }}</li>
                            <li>Количество сидений: {{ $car->seats }}</li>
                            <li><a class="text-2xl font-semibold mb-6 text-red-800 underline" href="{{ route('cars.destroy', $car) }}">Удалить авто из базы</a></li>
                        </ul>
                        <h3 class="mt-6 mb-3 text-3xl font-semibold">Параметры двигателя: </h3>
                        <ul>
                            <li>Объем: {{ $car->engine->volume }}</li>
                            <li>Тип : {{ $car->engine->type }}</li>
                            <li>Мощность: {{ $car->engine->hp }} л.с. </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
