<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">
            @if (isset($city))
                Редактировать город
            @else
                Добавить город
            @endif
        </h2>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8">
            <div class="sm:col-span-4">
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Город</label>
                <select id="name" name="name"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    @foreach ($cities as $city)
                        <option @if(isset($city) && $city->city_id == $city->id) selected @endif    value="{{ $city->id }}">{{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>


<div class="mt-6 flex items-center justify-start gap-x-6">
    <button type="submit"
        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
</div>
