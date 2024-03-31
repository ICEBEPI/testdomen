<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    @include('partials.menu')
    @yield('content')
    <div class="container mx-auto mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="md:flex md:flex-col md:justify-center md:items-center">
                <h1 class="text-4xl font-bold text-center mb-4">Добро пожаловать на наш сайт!</h1>
                <p class="text-lg text-gray-700 text-center mb-6">Здесь вы найдете всю необходимую информацию о машинах и двигателях.</p>
                <a href="{{ route('cars.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded-full hover:bg-blue-600 transition duration-300 ease-in-out">Узнать больше</a>
            </div>
            <div class="md:flex md:justify-center md:items-center">
                <img src="https://cdn.fishki.net/upload/post/201503/05/1453071/9_ja4.jpg" alt="Машина" class="rounded-lg shadow-lg">
            </div>
        </div>
    </div>

</body>
</html>
