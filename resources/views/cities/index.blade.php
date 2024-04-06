@extends('master')
@section('content')
    <div class="p-20">
        @include('partials.alarm')
        <div class="grid grid-cols-3 gap-8">
            @foreach ($cities as $city)
                <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
            <div class="p-8 bg-slate-400 text-2xl">
                    <h2 class="text-2xl font-bold underline"><a href="{{ route('cities.edit', $city) }}">Редактировать</a>


                <div class="flex justify-end">
                    <h2>
                        <form action="{{ route('cities.destroy', $city) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-700 font-semibold px-6" type="submit">Удалить</button>
                        </form>
                    </h2>
                </div>
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

