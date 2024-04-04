@if ($errors->any() || session('success') || session('error'))
    @if (session('success'))
        <div class="bg-green-700 text-white py-3 px-10 mb-5">
            <p class="text-xl">{{ session('success') }}</p>
        </div>
    @endif
    @if ($errors->any())
        <div class="bg-red-700 text-white py-3 px-10 mb-5">
            <p class="text-2xl">Произошла ошибка!</p>
            <ul style="margin: 0">
                @foreach ($errors->all() as $error)
                    <li class="text-xl">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endif
