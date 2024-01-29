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
        <div class="bg-dots-lighter bg-[#272727] selection:bg-[#E63462] selection:text-white">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif

            <header class="min-h-screen flex justify-center items-center mb-16">
                <img src="{{ asset("img/robot.png")}}" class="h-[45%] w-[45%]">
                <div>
                <h1 class="text-white text-8xl font-bold">Rencontres de Robotique GEII</h1>
                <button class="bg-[#E63462] hover:bg-red-600 text-white font-bold py-4 px-8 text-2xl rounded mt-4">Plus d'informations</button>
                <div>
            </header>

            <div class="mx-16 border-[#E63462] border-solid rounded-lg border-8 bg-slate-800 p-4">
                <h2 class="text-4xl font-bold text-[#E63462]">Informations</h2>
                <p class="text-2xl text-white mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet placerat elit. Nullam mollis dolor augue, a pellentesque orci venenatis sed. Cras vel consectetur purus. Suspendisse vel porttitor velit. Aliquam interdum eleifend neque ac posuere. Nam non urna magna. Donec ullamcorper aliquet dui. Aenean a tincidunt risus. In id orci sodales, tempus augue at, fringilla enim. Fusce viverra commodo purus quis egestas. Fusce in nisi vel purus rutrum vulputate. Cras tempor porta tellus id bibendum. Vestibulum vulputate nibh ac purus dignissim, vel gravida sem vestibulum.</p>
                <p class="text-2xl text-white mb-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta quia delectus distinctio omnis excepturi, similique, quibusdam esse vitae optio rerum repellendus veniam aut porro maxime rem exercitationem recusandae deserunt autem?</p>
                <button class="bg-[#E63462] hover:bg-red-600 text-white font-bold py-4 px-8 text-2xl rounded mt-4">Les catégories</button> 
            </div>

            <div class="min-h-screen flex justify-center items-center">
            </div>
        </div>
    </body>
</html>
