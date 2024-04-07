@extends('master')
@section('content')
    <div class="p-20">
        @include('partials.alarm')
        <div class="grid grid-cols-3 gap-8">
            @foreach ($cars as $car)
                <div><a class="block bg-slate-700 text-center py-4 text-3xl text-white font-semibold"
                        href="{{ route('cars.show', $car) }}">
                        <h1>{{ $car->number }} </h1>
                    </a>
                    <div class="p-8 bg-slate-400 text-2xl">

                        <ul>
                            <li>Модель: {{ $car->brand->name }}</li>
                            <li>Год выпуска: {{ $car->year }}</li>
                            <li>Количество сидений: {{ $car->seats }}</li>
                        </ul>

                        @if ($car->engine)
                            <h2 class="mt-6 mb-3 text-3xl font-semibold underline"><a href="{{ route('engines.show', $car->engine) }}">Параметры двигателя:</h2></a>
                            <ul>
                                <li>Объем: {{ $car->engine->volume }}</li>
                                <li>Тип : {{ $car->engine->type_engine->name }}</li>
                                <li>Мощность: {{ $car->engine->hp }} л.с. </li>
                            </ul>
                        @else
                            <h2 class="text-xl font-semibold mb-2 mt-4">У этой машины нет двигателя.</h2>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
