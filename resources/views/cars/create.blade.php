@extends('master')
@section('content')
    <div class="p-20">
        @if ($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
        <form action="{{ route('cars.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful
                        what you share.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="number" class="block text-sm font-medium leading-6 text-gray-900">Номер
                                машины</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="number" id="number"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="777AAA02">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="brand" class="block text-sm font-medium leading-6 text-gray-900">Бренд</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="brand" id="brand"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="Audi">
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="seats" class="block text-sm font-medium leading-6 text-gray-900">Количество сидений</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="number" name="seats" id="seats"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="4">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="year" class="block text-sm font-medium leading-6 text-gray-900">Год
                                производства</label>
                            <div class="mt-2">
                                <select id="year" name="year"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    @foreach (array_reverse(range(1980, date('Y'))) as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="engine"
                                class="block text-sm font-medium leading-6 text-gray-900">Двигатель</label>
                            <div class="mt-2">
                                <select id="engine" name="engine"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    @foreach ($engines as $engine)
                                        <option value="{{ $engine->id }}">{{ $engine->volume }} см3 - {{ $engine->hp }}
                                            л.с. ({{ $engine->type }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-start gap-x-6">
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>


    </div>
@endsection
