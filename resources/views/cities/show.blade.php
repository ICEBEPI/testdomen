@extends('master')
@section('content')
    <h1 class="text-3xl font-bold mb-4 text-center text-gray-800">{{ $title ?? 'Данные клиента' }}</h1>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h2 class="text-2xl font-bold underline"><a href="{{ route('cities.edit', $city) }}">Редактировать</a></h2>
    </div>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h1 class="text-xl font-semibold mb-2">Название:</h1>

        <h2 class="text-2xl font-bold underline"> <a href="{{ route('cities.edit', $city) }}">{{ $city->name }}
        </h2></a>
    </div>



    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        @if($city->clients->count())
            <h2 class="text-xl font-semibold mb-2 mt-4">Жители:</h2>
            <ol class="text-2xl font-bold">
                @foreach($city->clients as $client)
                    <li>
                        <a href="{{ route("clients.show", $client) }}">
                            {{ $client->name }}
                        </a>
                    </li>
                @endforeach
            </ol>
        @endif
        @if ($city->clients->count() == 0)
            <h2 class="text-xl font-semibold mb-2 mt-4">Нет жителей</h2>
        @endif
    </div>

@endsection
