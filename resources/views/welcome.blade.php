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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>

        
        
          <meta name="viewport" content="width=device-width, initial-scale=1">
                     @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif


            <header id="header" class="w-full min-h-screen flex flex-col md:flex-row justify-center items-center gap-32">
              <img src="{{ asset("img/geii.png")}}" class="w-64 lg:w-auto">
              <div class="w-96">
                <h1 class="text-6xl font-bold">Rencontres de Robotique</h1>
                <div class="text-green-400">
                  <p class="text-2xl">GeSi</p>
                  <p class="text-2xl">Association des départements GEII des IUT de France</p>
                </div>
              </div>
            </header>



            <main class="flex flex-col items-center justify-center mb-16">


                <ul class="timeline timeline-snap-icon max-md:timeline-compact timeline-vertical w-1/2 text-justify">
                    <li>
                      <div class="timeline-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                      </div>
                      <div class="timeline-start md:text-end mb-10">
                        <time class="font-mono italic">Mars</time>
                        <div class="text-lg font-black">Inscription sur le site</div>
                        <p class="w-full text-justify">Création du compte utilisateur puis attente de sa validation.</p>
                      </div>
                      <hr/>
                    </li>
                    <li>
                      <hr />
                      <div class="timeline-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                      </div>
                      <div class="timeline-end mb-10">
                        <div class="text-lg font-black ">Confirmation d'inscription sur le site</div>
                        <p class="w-full text-justify">Une fois la validation reçue dans votre boîte mail, vous pouvez à nouveau vous connecter sur le site et voir les différentes compétitions de cette année ainsi que les challenges. Vous pouvez aussi accéder à la partie forum pour pouvoir poser des questions ou bien communiquer sur les différentes compétitions.</p>
                      </div>
                      <hr />
                    </li>
                    <li>
                      <hr />
                      <div class="timeline-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                      </div>
                      <div class="timeline-start md:text-end mb-10">
                        <div class="text-lg font-black ">Envie de s'inscrire ?</div>
                        <p class="w-full text-justify">Une fois que vous avez choisi la compétition où vous voulez vous inscrire, rien de plus simple : vous devez tout d'abord rentrer votre adresse de facturation, puis ensuite vous rendre dans la nouvelle partie disponible, à savoir "Équipes". Dans cette partie, vous allez pouvoir directement créer et gérer vos équipes afin de pouvoir les inscrire à une compétition. Une fois votre équipe créée et inscrite au tournoi, il ne vous reste plus qu'à vérifier si le devis généré est bien le bon, puis à appuyer sur le bouton "recevoir par mail" pour l'obtenir dans votre boîte mail, il sera envoyé automatiquement aux organisateurs.</p>
                      </div>
                      <hr />
                    </li>
                    <li>
                      <hr />
                      <div class="timeline-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                      </div>
                      <div class="timeline-end mb-10">
                        <time class="font-mono italic">Juin</time>
                        <div class="text-lg font-black">Début de la compétition</div>
    
                      </div>
                    </li>
                  </ul>

                  <div class="my-8">
                    <p class="mb-8 font-bold text-2xl">Regardez la compétition en direct :</p>
                  <iframe width="560" height="315" src="{{ $liveStatus }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                  </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="relative overflow-hidden bg-gray-200 dark:bg-gray-700 rounded-lg">
                        <img src={{ asset("img/csm_IMG_0428_c8b0bb3be1.jpg")}} alt="Image 1" width="600" height="400"  class="w-full h-full object-cover">
                    </div>
                    <div class="relative overflow-hidden bg-gray-200 dark:bg-gray-700 rounded-lg">
                      <img src={{ asset("img/csm_IMG_0467_9593c8c289.jpg")}} alt="Image 1" width="600" height="400" class="w-full h-full object-cover">
                    </div>
                    <div class="relative overflow-hidden bg-gray-200 dark:bg-gray-700 rounded-lg">
                      <img src={{ asset("img/csm_IMG_0470_1a5801ed12.jpg")}} alt="Image 1" width="600" height="400" class="w-full h-full object-cover">
                    </div>
                    <div class="relative overflow-hidden bg-gray-200 dark:bg-gray-700 rounded-lg">
                      <img src={{ asset("img/csm_IMG_0428_c8b0bb3be1.jpg")}} alt="Image 1" width="600" height="400"  class="w-full h-full object-cover">
                  </div>
                  <div class="relative overflow-hidden bg-gray-200 dark:bg-gray-700 rounded-lg">
                    <img src={{ asset("img/csm_IMG_0467_9593c8c289.jpg")}} alt="Image 1" width="600" height="400" class="w-full h-full object-cover">
                  </div>
                  <div class="relative overflow-hidden bg-gray-200 dark:bg-gray-700 rounded-lg">
                    <img src={{ asset("img/csm_IMG_0470_1a5801ed12.jpg")}} alt="Image 1" width="600" height="400" class="w-full h-full object-cover">
                  </div>
                  
                </div>



            </main>


    


        <footer class="p-8 bg-[#2fc0cc] text-white w-full">
            <p class="text-center">© 2024 - Rencontres de Robotique GEII - Créé par <a href="https://eloick.fr" target="blank" class="underline text-red-500">Eloïck </a></p>
        </footer>

        <script>
            gsap.from("header", { opacity: 0, duration: 1, y: -100 });
            gsap.from(".timeline li", { duration: 1, opacity: 0, y: 50, stagger: 0.2 });
            gsap.from(".grid div", { duration: 1, opacity: 0, x: -50, stagger: 0.2 });
            gsap.from("footer", { duration: 1, opacity: 0, y: 50 });
        </script>
    </body>
</html>
