<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">
            @if (isset($brand))
                Редактировать брэнд
            @else
                Добавить брэнд
            @endif
        </h2>
        <div class="sm:col-span-4">
            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Название</label>
            <div class="mt-2">
                <div
                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="name" id="brand"
                        class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                        placeholder="Audi"
                        @if (isset($brand)) value="{{ $brand->name }}" @endif>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="mt-6 flex items-center justify-start gap-x-6">
    <button type="submit"
        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
</div>
