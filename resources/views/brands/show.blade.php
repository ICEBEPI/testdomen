@extends('master')
@section('content')
    <h1 class="text-3xl font-bold mb-4 text-center text-gray-800">{{ $title ?? 'Данные брэнда' }}</h1>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h2 class="text-2xl font-bold underline"><a href="{{ route('brands.edit', $brand) }}">Редактировать</a></h2>
    </div>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h1 class="text-xl font-semibold mb-2">Название:</h1>

        <h2 class="text-2xl font-bold underline"> <a href="{{ route('brands.edit', $brand) }}">{{ $brand->name }}
        </h2></a>
    </div>



    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        @if($brand->cars->count())
            <h2 class="text-xl font-semibold mb-2 mt-4">Автомобили:</h2>
            <ol class="text-2xl font-bold">
                @foreach($brand->cars as $car)
                    <li>
                        <a href="{{ route("cars.show", $car) }}">
                            {{ $car->number }}
                        </a>
                    </li>
                @endforeach
            </ol>
        @endif
        @if ($brand->cars->count() == 0)
            <h2 class="text-xl font-semibold mb-2 mt-4">Нет авто</h2>
        @endif
    </div>

@endsection
