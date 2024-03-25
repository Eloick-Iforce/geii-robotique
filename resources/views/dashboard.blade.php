<x-app-layout>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (Auth::user()->is_verified)
                        <h2 class="text-2xl font-bold" id="welcome">Bienvenue {{ Auth::user()->name }} sur votre espace</h2>
                        @if (Auth::user()->billing_address)

                        <div class="mt-6 flex flex-wrap justify-center 2xl:flex-nowrap gap-4">
                            <div class="flex flex-col 2xl:w-1/3 w-full gap-4">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden h-1/2 border shadow-sm sm:rounded-lg" id="billing-address">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <div class="flex justify-between items-center">
                                    <h2 class="text-xl font-bold">Votre adresse de facturation :</h2>
                                    <div class="flex gap-4 items-center">
                                    <a href="{{ route('billingadress.edit', Auth::user()->billing_address) }}" class="btn btn-primary">
                                        Modifier
                                    </a>
                                    <form action="{{ route('billingadress.destroy') }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id_billing" value="{{Auth::user()->billing_address->id}}">
                                        <button type="submit" class="btn btn-error btn-outline">
                                            Supprimer
                                        </button>
                                    </form>
                                    </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="border-b border-gray-300 pb-2">
                                            <span class="font-bold">Pays:</span> {{ Auth::user()->billing_address->country }}
                                        </div>
                                        <div class="border-b border-gray-300 pb-2">
                                            <span class="font-bold">Ville:</span> {{ Auth::user()->billing_address->city }}
                                        </div>
                                        <div class="border-b border-gray-300 pb-2">
                                            <span class="font-bold">Code Postal:</span> {{ Auth::user()->billing_address->zip_code }}
                                        </div>
                                        <div class="border-b border-gray-300 pb-2">
                                            <span class="font-bold">Adresse:</span> {{ Auth::user()->billing_address->address }}
                                        </div>
                                        <div class="border-b border-gray-300 pb-2">
                                            <span class="font-bold">Région:</span> {{ Auth::user()->billing_address->state }}
                                        </div>
                                        <div class="border-b border-gray-300 pb-2">
                                            <span class="font-bold">Etablissement:</span> {{ Auth::user()->billing_address->etablisement }}
                                        </div>
                                        <div class="border-b border-gray-300 pb-2">
                                            <span class="font-bold">Nom:</span> {{ Auth::user()->billing_address->lastname }}
                                        </div>
                                        <div class="pb-2">
                                            <span class="font-bold">Prenom:</span> {{ Auth::user()->billing_address->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="bg-white dark:bg-gray-800 overflow-hidden h-1/2 border shadow-sm sm:rounded-lg" id="quick-actions">
                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                        <h2 class="text-xl font-bold mb-8">Actions Rapide :</h2>
                                        <div class="flex flex-col w-full gap-4">
                                        <a href="{{ route('teams.index') }}" class="btn btn-primary btn-outline">
                                            Voir toutes vos équipes
                                        </a>
                                        <a href="{{ route('teams.create') }}" class="btn btn-primary btn-outline">
                                            Créer une équipe
                                        </a>
                                        <a href="{{ route('competitions.index') }}" class="btn btn-primary btn-outline">
                                            Voir les compétitions
                                        </a>
                                        <a href="{{ route('forum.unread') }}" class="btn btn-primary btn-outline">
                                            Voir les messages non lus du forum
                                        </a>
                                        @if (Auth::user()->role == 'admin')
                                        <a href="{{ route('competitions.create') }}" class="btn btn-primary btn-outline">
                                            Ajouter une compétition
                                        </a>
                                        @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="relative overflow-hidden bg-gray-200 dark:bg-gray-700 rounded-lg" id="image-container">
                                <img src={{ asset("img/csm_IMG_0428_c8b0bb3be1.jpg")}} width="1200" height="800" alt="Image 1" class="w-full h-full object-cover">
                            </div>
                        </div>
                        @else
                            <p class="text-xl mb-8">Vous n'avez pas d'adresse de facturation associée, merci d'en rajouter une</p>
                            <a href="{{ route('billingadress.create') }}" class="btn-add">
                                Ajouter une adresse de facturation
                            </a>
                        @endif
                    @else
                    <h2 class="text-2xl font-bold text-center">Votre compte n'est pas encore vérifié</h2>
                    <p class="text-xl text-center">Vous recevrez un mail quand votre compte sera vérifié</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        gsap.from("#billing-address", { opacity: 0, duration: 1, x: -250 });
        gsap.from("#quick-actions", { opacity: 0, duration: 1, y: 250 });
        gsap.from("#image-container", { opacity: 0, duration: 1, x: 250 });
    </script>
</x-app-layout>
