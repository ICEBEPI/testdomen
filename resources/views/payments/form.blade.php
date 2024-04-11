<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">
            @if (isset($payment))
                Редактировать платеж
            @else
                Добавить платеж
            @endif
        </h2>
        <div class="sm:col-span-4">
            <label for="sum" class="block text-sm font-medium leading-6 text-gray-900">Платеж</label>
            <div class="mt-2">
                <div
                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="sum" id="sum"
                        class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                        placeholder="Укажите сумму платежа"
                        @if (isset($payment)) value="{{ $payment->sum }}" @endif>
                </div>
            </div>
        </div>

        <div class="sm:col-span-4">
            <label for="order" class="block text-sm font-medium leading-6 text-gray-900">Выбор заказа</label>
            <div class="mt-2">
                <select id="order" name="order_id"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option value="0">Не выбрано</option>
                    @foreach ($orders as $order)
                        <option value="{{ $order->id }}" @if (isset($payment) && $payment->order_id == $order->id) selected @endif>
                            {{ $order->id }} ({{ $order->client->name }}, {{ $order->car->brand->name }})
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
