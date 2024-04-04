<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">@if (isset($engine))Редактирование двигателя @else Добавить двигатель @endif</h2>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label for="volume" class="block text-sm font-medium leading-6 text-gray-900">Объем
                    двигателя</label>
                <div class="mt-2">
                    <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="number" step="0.1" name="volume" id="volume"
                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                            placeholder="3.5 л." @if (isset($engine)) value="{{ $engine->volume }}" @endif>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label for="hp" class="block text-sm font-medium leading-6 text-gray-900">Мощность
                    двигателя</label>
                <div class="mt-2">
                    <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="number" name="hp" id="hp"
                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                            placeholder="300 л.с." @if (isset($engine)) value="{{ $engine->hp }}" @endif>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10 sm:col-span-4">
            <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Тип
                двигателя</label>
            <div class="mt-2">
                <select id="type" name="type"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    @foreach ($types as $type)
                        <option @if(isset($type) && $type->type_id == $type->id) selected @endif value="{{ $type->id }}">{{ $type->name }}
                    </option>
                @endforeach
                </select>
            </div>
        </div>

    </div>
</div>
