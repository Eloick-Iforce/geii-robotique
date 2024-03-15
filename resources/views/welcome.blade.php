<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rencontres de Robotique GEII</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class=" bg-[#f3f4f6] selection:bg-[#E63462] selection:text-white">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif

            <header class="min-h-screen flex justify-center items-center mb-16">
                <img src="{{ asset("img/robot.png")}}" class="h-[45%] w-[45%]">
                <div>
                <h1 class=" text-8xl font-bold">Rencontres de Robotique GEII</h1>
                <button class="bg-[#E63462] hover:bg-red-600  font-bold py-4 px-8 text-2xl rounded mt-4">Plus d'informations</button>
                <div>
            </header>

        </div>
    </body>
</html>
