@extends('master')
@section('content')
    <div class="p-20">
        <div class="grid gap-8">
            <div class="bg-gray-100 rounded-lg shadow-lg p-4">
                <h2 class="text-xl font-semibold mb-2">Средний возраст авто: <span
                        class="text-blue-500">{{ $avgAge }}</span></h2>
            </div>
            <div class="grid gap-8">
                <div class="bg-gray-100 rounded-lg shadow-lg p-4">
                    <h2 class="text-xl font-semibold mb-2">Самый популярный брэнд: <span
                            class="text-green-500">{{ $mostPopularBrand }}</span></h2>
                </div>
            </div>
            <div class="grid gap-8">
                <div class="bg-gray-100 rounded-lg shadow-lg p-4">
                    <h2 class="text-xl font-semibold mb-2">Средняя мощность по типу:</h2>
                    @foreach ($avgHpByType as $type => $hp)
                        <ul class="list-disc ml-8">
                            <li class="text-base">{{ $type }}: <span class="text-purple-500">{{ $hp }}
                                    л.с.</span></li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
