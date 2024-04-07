<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">
            @if (isset($client))
                Редактировать клиента
            @else
                Добавить клиента
            @endif
        </h2>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">ФИО</label>
                <div class="mt-2">
                    <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="text" name="name" id="name"
                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                            placeholder="Иванов Иван Иванович"
                            @if (isset($client)) value="{{ $client->name }}" @endif>
                    </div>
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="birthday" class="block text-sm font-medium leading-6 text-gray-900">Дата рождения</label>
                <div class="mt-2">
                    <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="date" name="birthday" id="birthday"
                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                            @if (isset($client)) value="{{ $client->birthday }}" @else value="2000-01-01" @endif>
                    </div>
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Город</label>
                <div class="mt-2">
                    <div class="mt-2">
                        <select id="city" name="city_id"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            @foreach ($cities as $city)
                                <option @if (isset($client) && $client->city_id == $city->id) selected @endif value="{{ $city->id }}">
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Телефон</label>
                <div class="mt-2">
                    <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="text" name="phone" id="phone"
                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                            placeholder="+7 (999) 999-99-99"
                            @if (isset($client)) value="{{ $client->phone }}" @endif>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="mt-6 flex items-center justify-start gap-x-6">
    <button type="submit"
        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
</div>
