@extends('master')
@section('content')
    <div class="p-20">
        @include('partials.alarm')
        <div class="grid grid-cols-3 gap-8">
            @foreach ($cities as $city)
                <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold underline">
                            <a href="{{ route('cities.edit', $city) }}" class="text-blue-600 hover:text-blue-800">Редактировать</a>
                        </h2>
                        <form action="{{ route('cities.destroy', $city) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-700 font-semibold px-4 py-2 bg-red-100 hover:bg-red-200 rounded-lg flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v1h2v2h-1v9a2 2 0 01-2 2H5a2 2 0 01-2-2V8H2V6H0V5h2zm2-1h12v1H4V4zm9 6v7a1 1 0 01-1 1H8a1 1 0 01-1-1v-7h6zm-4 2h2v5H9v-5zm4 0h2v5h-2v-5z" clip-rule="evenodd" />
                                </svg>
                                Удалить
                            </button>
                        </form>
                    </div>

                    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
                        <h2 class="text-xl font-semibold mb-2">Название города:</h2>
                        <h2 class="text-2xl font-bold underline"><a href="{{ route('cities.show', $city) }}"> {{ $city->name }}</a></h2>

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
                </div>
            @endforeach
        </div>
    </div>
@endsection

