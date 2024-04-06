@extends('master')
@section('content')
    <h1 class="text-3xl font-bold mb-4 text-center text-gray-800">{{ $title ?? 'Данные типа двигателя' }}</h1>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h2 class="text-2xl font-bold underline"><a href="{{ route('typeEngines.edit', $typeEngine) }}">Редактировать</a></h2>
    </div>

    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        <h1 class="text-xl font-semibold mb-2">Название:</h1>

        <h2 class="text-2xl font-bold underline"> <a href="{{ route('typeEngines.edit', $typeEngine) }}">{{ $typeEngine->name }}
        </h2></a>
    </div>



    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
        @if($typeEngine->engines->count())
            <h2 class="text-xl font-semibold mb-2 mt-4">Двигатели:</h2>
            <ol class="text-2xl font-bold">
                @foreach($typeEngine->engines as $engine)
                    <li>
                        <a href="{{ route("engines.show", $engine) }}">
                            {{ $engine->volume }} см3 - {{ $engine->hp }}
                            л.с. ({{ $engine->type_engine->name }})
                        </a>
                    </li>
                @endforeach
            </ol>
        @endif
        @if ($typeEngine->engines->count() == 0)
            <h2 class="text-xl font-semibold mb-2 mt-4">Нет двигателей</h2>
        @endif
    </div>

@endsection
