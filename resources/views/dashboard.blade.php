<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (Auth::user()->is_verified)
                        <h2 class="text-2xl font-bold">Bienvenue {{ Auth::user()->name }}</h2>
                        @if (Auth::user()->billing_address)
                            <h2 class="text-2xl font-bold mt-4">Votre adresse de facturation</h2>
                            <div class="grid grid-cols-2 gap-4 mb-8">
                                <div class="border p-4 rounded">
                                    <h2 class="text-2xl font-bold mb-2">Pays</h2>
                                    <p>{{ Auth::user()->billing_address->country }}</p>
                                </div>
                                <div class="border p-4 rounded">
                                    <h2 class="text-2xl font-bold mb-2">Ville</h2>
                                    <p>{{ Auth::user()->billing_address->city }}</p>
                                </div>
                                <div class="border p-4 rounded">
                                    <h2 class="text-2xl font-bold mb-2">Code Postal</h2>
                                    <p>{{ Auth::user()->billing_address->zip_code }}</p>
                                </div>
                                <div class="border p-4 rounded">
                                    <h2 class="text-2xl font-bold mb-2">Adresse</h2>
                                    <p>{{ Auth::user()->billing_address->address }}</p>
                                </div>
                                <div class="border p-4 rounded">
                                    <h2 class="text-2xl font-bold mb-2">Région</h2>
                                    <p>{{ Auth::user()->billing_address->state }}</p>
                                </div>
                                <div class="border p-4 rounded">
                                    <h2 class="text-2xl font-bold mb-2">Etablissement</h2>
                                    <p>{{ Auth::user()->billing_address->etablisement }}</p>
                                </div>
                                <div class="border p-4 rounded">
                                    <h2 class="text-2xl font-bold mb-2">Nom</h2>
                                    <p>{{ Auth::user()->billing_address->lastname }}</p>
                                </div>
                                <div class="border p-4 rounded ">
                                    <h2 class="text-2xl font-bold mb-2">Prenom</h2>
                                    <p>{{ Auth::user()->billing_address->name }}</p>
                                </div>
                            </div>

                            <a href="{{ route('billingadress.edit', Auth::user()->billing_address) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Modifier mon adresse de facturation
                            </a>
                        @else
                            <p class="text-xl">Vous n'avez pas d'adresse de facturation associée, merci d'en rajouter une</p>
                            <a href="{{ route('billingadress.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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
</x-app-layout>
