@extends('master')
@section('content')
    <div class="p-20">
        <div class="grid grid-cols-3 gap-8">
            @foreach ($clients as $client)
                <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
                    <h2 class="text-2xl font-bold underline"><a href="{{ route('clients.edit', $client) }}">Редактировать</a>
                    </h2>

                    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
                        <h2 class="text-xl font-semibold mb-2">Имя:</h2>
                        <h2 class="text-2xl font-bold">{{ $client->name }} л3</h2>

                        <h2 class="text-xl font-semibold mb-2 mt-4">Год рождения:</h2>
                        <h2 class="text-2xl font-bold">{{ $client->birthday }}</h2>

                        <h2 class="text-xl font-semibold mb-2 mt-4">Город:</h2>
                        <h2 class="text-2xl font-bold">{{ $client->city }} л.с.</h2>

                        <h2 class="text-xl font-semibold mb-2 mt-4">Телефон:</h2>
                        <h2 class="text-2xl font-bold">{{ $client->phone }} л.с.</h2>                        
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

