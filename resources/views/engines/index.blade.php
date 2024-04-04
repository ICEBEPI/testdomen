@extends('master')
@section('content')
    <div class="p-20">
        @include('partials.alarm')
         <div class="grid grid-cols-3 gap-8">
            @foreach ($engines as $engine)
                <div><a class="block bg-slate-700 text-center py-4 text-3xl text-white     font-semibold"
                        href="{{ route('engines.show', $engine) }}">
                        <h1>{{ $engine->name }} Данные двигателя</h1>
                    </a>
                    <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
                        <h2 class="text-2xl font-bold underline"><a
                                href="{{ route('engines.edit', $engine) }}">Редактировать</a>
                        </h2>

                        <div class="bg-gray-100 rounded-lg shadow-lg p-4 mb-6">
                            <h2 class="text-xl font-semibold mb-2">Объем:</h2>
                            <h2 class="text-2xl font-bold">{{ $engine->volume }} л3</h2>

                            <h2 class="text-xl font-semibold mb-2 mt-4">Тип:</h2>
                            <h2 class="text-2xl font-bold">{{ $engine->type_engine->name }}</h2>

                            <h2 class="text-xl font-semibold mb-2 mt-4">Мощность:</h2>
                            <h2 class="text-2xl font-bold">{{ $engine->hp }} л.с.</h2>
                        </div>
                        <div class="flex justify-end">
                            @if ($engine->car)
                                <span class="px-6">Двигатель установлен на авто</span>
                            @else
                                <form action="{{ route('engines.destroy', $engine) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-700 font-semibold px-6" type="submit">Удалить</button>
                                </form>
                            @endif
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
