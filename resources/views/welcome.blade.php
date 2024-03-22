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
    <body class="bg-[#f3f4f6] selection:bg-[#E63462] selection:text-white">
        <div class="  mx-auto w-[90%] ">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif

            <header class="min-h-screen flex justify-between items-center">
                <img src="{{ asset("img/robot.png")}}" class="h-[30%] w-[30%]">
                <div>
                <h1 class=" text-8xl font-bold">Rencontres de Robotique GEII</h1>
                <p class=" text-2xl">Bienvenue sur le site des rencontres de robotique GEII</p>
                </div>
            </header>

            <main class="flex flex-col items-center justify-center mb-16">


                <ol class="relative border-s border-gray-200 dark:border-gray-700 w-1/2 mb-16">
                    <li class="mb-10 ms-4">
                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Inscription sur le site</h3>
                        <p class="mb-4 text-base font-normal text-justify text-gray-500 dark:text-gray-400">Création du compte utilisateur puis attente de sa validation.</p>
                    </li>
                    <li class="mb-10 ms-4">
                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Confirmation d'inscription sur le site</h3>
                        <p class="text-base font-normal text-gray-500 text-justify dark:text-gray-400">Une fois la validation reçue dans votre boîte mail, vous pouvez à nouveau vous connecter sur le site et voir les différentes compétitions de cette année ainsi que les challenges. Vous pouvez aussi accéder à la partie forum pour pouvoir poser des questions ou bien communiquer sur les différentes compétitions.</p>
                    </li>
                    <li class="ms-4">
                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Envie de s'inscrire ?</h3>
                        <p class="text-base font-normal text-gray-500 text-justify dark:text-gray-400">Une fois que vous avez choisi la compétition où vous voulez vous inscrire, rien de plus simple : vous devez tout d'abord rentrer votre adresse de facturation, puis ensuite vous rendre dans la nouvelle partie disponible, à savoir "Équipes". Dans cette partie, vous allez pouvoir directement créer et gérer vos équipes afin de pouvoir les inscrire à une compétition. Une fois votre équipe créée et inscrite au tournoi, il ne vous reste plus qu'à vérifier si le devis généré est bien le bon, puis à appuyer sur le bouton "recevoir par mail" pour l'obtenir dans votre boîte mail, il sera envoyé automatiquement aux organisateurs.</p>
                    </li>
                </ol>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="relative overflow-hidden bg-gray-200 dark:bg-gray-700 rounded-lg">
                        <img src="https://placehold.co/600x400" alt="Image 1" class="w-full h-full object-cover">
                    </div>
                    <div class="relative overflow-hidden bg-gray-200 dark:bg-gray-700 rounded-lg">
                        <img src="https://placehold.co/600x400" alt="Image 2" class="w-full h-full object-cover">
                    </div>
                    <div class="relative overflow-hidden bg-gray-200 dark:bg-gray-700 rounded-lg">
                        <img src="https://placehold.co/600x400" alt="Image 3" class="w-full h-full object-cover">
                    </div>
                    <div class="relative overflow-hidden bg-gray-200 dark:bg-gray-700 rounded-lg">
                        <img src="https://placehold.co/600x400" alt="Image 4" class="w-full h-full object-cover">
                    </div>
                    <div class="relative overflow-hidden bg-gray-200 dark:bg-gray-700 rounded-lg">
                        <img src="https://placehold.co/600x400" alt="Image 5" class="w-full h-full object-cover">
                    </div>
                    <div class="relative overflow-hidden bg-gray-200 dark:bg-gray-700 rounded-lg">
                        <img src="https://placehold.co/600x400" alt="Image 6" class="w-full h-full object-cover">
                    </div>


                

            </main>




        </div>

        <footer class="p-8 bg-gray-200 w-full">
            <p class="text-center">© 2024 - Rencontres de Robotique GEII - Créé par <a href="https://eloick.fr" target="blank" class="underline text-red-500">Eloïck </a></p>
        </footer>
    </body>
</html>
