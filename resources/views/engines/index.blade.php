@extends('master')
@section('content')
    <div class="p-20">
        <div class="grid grid-cols-3 gap-8">
            @foreach ($engines as $engine)
                <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
                    <h2 class="text-2xl font-bold underline"><a href="{{ route('engines.edit', $engine) }}">Редактировать</a>
                    </h2>

                    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
                        <h2 class="text-xl font-semibold mb-2">Объем:</h2>
                        <h2 class="text-2xl font-bold">{{ $engine->volume }} л3</h2>

                        <h2 class="text-xl font-semibold mb-2 mt-4">Тип:</h2>
                        <h2 class="text-2xl font-bold">{{ $engine->type }}</h2>

                        <h2 class="text-xl font-semibold mb-2 mt-4">Мощность:</h2>
                        <h2 class="text-2xl font-bold">{{ $engine->hp }} л.с.</h2>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
