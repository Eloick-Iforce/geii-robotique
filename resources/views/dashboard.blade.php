<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mon Espace') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (Auth::user()->is_verified)
                        <h2 class="text-2xl font-bold">Bienvenue {{ Auth::user()->name }}</h2>
                        @if (Auth::user()->billing_address)

                        <div class="mt-6">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden h-1/2 w-1/3 border shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <div class="flex justify-between items-center">
                                    <h2 class="text-xl font-bold">Votre adresse de facturation :</h2>
                                    <div class="flex gap-4 items-center">
                                    <a href="{{ route('billingadress.edit', Auth::user()->billing_address) }}" class="btn-edit">
                                        Modifier
                                    </a>
                                    <form action="{{ route('billingadress.destroy') }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id_billing" value="{{Auth::user()->billing_address->id}}">
                                        <button type="submit" class="btn-delete">
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
</x-app-layout>
