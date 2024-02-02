<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Billing Address') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form action="{{ route('billingadress.store') }}" method="POST" class="p-6 max-w-sm mx-auto  rounded-xl shadow-md flex items-center space-x-4">
                    @csrf
                    @method('POST')
                
                    <div class="flex-1">
                        <div class="mb-4">
                            <label class="text-xl text-white" for="title">Pays:</label>
                            <input class="border-2 border-gray-600 bg-gray-700 text-white p-2 w-full" type="text" name="country" id="title" required>
                        </div>
            
                        <div class="mb-4">
                            <label class="text-xl text-white" for="description">Ville:</label>
                            <input class="border-2 border-gray-600 bg-gray-700 text-white p-2 w-full" type="text" name="city" id="description" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-white" for="description">Code Postal:</label>
                            <input class="border-2 border-gray-600 bg-gray-700 text-white p-2 w-full" type="text" name="zip_code" id="description" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-white" for="description">Adresse:</label>
                            <input class="border-2 border-gray-600 bg-gray-700 text-white p-2 w-full" type="text" name="address" id="description" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-white" for="description">Région:</label>
                            <input class="border-2 border-gray-600 bg-gray-700 text-white p-2 w-full" type="text" name="state" id="description" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-white" for="description">Etablissement:</label>
                            <input class="border-2 border-gray-600 bg-gray-700 text-white p-2 w-full" type="text" name="etablisement" id="description" required>
                        </div>
                        <div class="mb-4">
                            <label class="text-xl text-white" for="description">Nom:</label>
                            <input class="border-2 border-gray-600 bg-gray-700 text-white p-2 w-full" type="text" name="lastname" id="description" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-white" for="description">Prenom:</label>
                            <input class="border-2 border-gray-600 bg-gray-700 text-white p-2 w-full" type="text" name="name" id="description" required>
                        </div>
                        
                
                        <button class="px-4 py-2 text-white font-light bg-green-800  tracking-wider  rounded" type="submit">Valider mon addresse</button>
                    </div>
                </form>
        </div>
    </div>
</x-app-layout>