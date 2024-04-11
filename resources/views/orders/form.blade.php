<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">
            @if (isset($order))
                Редактировать заказ
            @else
                Добавить заказ
            @endif
        </h2>
        <div class="sm:col-span-4">
            <label for="client" class="block text-sm font-medium leading-6 text-gray-900">Выбор владельца</label>
            <div class="mt-2">
                <select id="client" name="client_id"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option value="0">Не выбрано</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" @if (isset($order) && $order->client_id == $client->id) selected @endif>
                            {{ $client->name }} ({{ $client->city->name }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="sm:col-span-4">
            <label for="car" class="block text-sm font-medium leading-6 text-gray-900">Выбор авто</label>
            <div class="mt-2">
                <select id="car" name="car_id"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option value="0">Не выбрано</option>
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}" @if (isset($order) && $order->car_id == $car->id) selected @endif>
                            {{ $car->brand->name }} ({{ $car->number }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="sm:col-span-4">
            <label for="service_id" class="block text-sm font-medium leading-6 text-gray-900">Название услуги</label>
            <div class="mt-2">
                @foreach ($services as $service)
                    <label class="flex items-center">
                        <input type="checkbox" name="service_ids[]"
                            class="service-checkbox rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                            value="{{ $service->id }}" data-price="{{ $service->price }}"
                            @if (isset($order) && $order->services->contains($service->id)) checked @endif>
                        <span class="ml-2">{{ $service->name }} ({{ $service->price }} тг)</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="sm:col-span-4">
            <label for="sum" class="block text-sm font-medium leading-6 text-gray-900">Сумма заказа</label>
            <div class="mt-2">
                <input type="text" name="sum" id="sum"
                    class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    readonly value="{{ $order->total_price ?? '0' }}">
            </div>
        </div>
    </div>

    <div class="sm:col-span-4">
        <label class="block text-sm font-medium leading-6 text-gray-900">Статус оплаты заказа</label>
        <div class="mt-2">
            <div class="flex items-center mb-2">
                <input type="radio" id="is_closed_true" name="is_closed" value="1"
                    class="rounded-md border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    @if (isset($order) && $order->is_closed) checked @endif>
                <label for="is_closed_true" class="ml-2">Оплачен</label>
            </div>
            <div class="flex items-center">
                <input type="radio" id="is_closed_false" name="is_closed" value="0"
                    class="rounded-md border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    @if (isset($order) && !$order->is_closed) checked @endif>
                <label for="is_closed_false" class="ml-2">Не оплачен</label>
            </div>
        </div>
    </div>



    <div class="mt-6 flex items-center justify-start gap-x-6">
        <button type="submit"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const serviceCheckboxes = document.querySelectorAll('.service-checkbox');
        const sumInput = document.getElementById('sum');

        function updateTotalPrice() {
            let total = 0;
            serviceCheckboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    total += parseFloat(checkbox.getAttribute('data-price'));
                }
            });
            sumInput.value = total;
        }
        serviceCheckboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', updateTotalPrice);
        });
        updateTotalPrice();
    });
</script>
