<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black dark:text-white leading-tight">
            {{ __('Billing Address') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form action="{{ route('billingadress.update', $billingadress->id) }}" method="POST" class="p-6 max-w-sm mx-auto  rounded-xl shadow-md flex items-center space-x-4">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value="{{ $billingadress->id }}">
                
                    <div class="flex-1">
                        <div class="mb-4">
                            <label class="text-xl text-black dark:text-white" for="title">Pays:</label>
                            <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="text" name="country" id="title" value="{{ $billingadress->country }}" required>
                        </div>
            
                        <div class="mb-4">
                            <label class="text-xl text-black dark:text-white" for="description">Ville:</label>
                            <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="text" name="city" id="description" value="{{ $billingadress->city }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-black dark:text-white" for="description">Code Postal:</label>
                            <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="text" name="zip_code" id="description" value="{{ $billingadress->zip_code }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-black dark:text-white" for="description">Adresse:</label>
                            <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="text" name="address" id="description" value="{{ $billingadress->address }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-black dark:text-white" for="description">Région:</label>
                            <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="text" name="state" id="description" value="{{ $billingadress->state }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-black dark:text-white" for="description">Etablissement:</label>
                            <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="text" name="etablisement" id="description" value="{{ $billingadress->etablisement }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="text-xl text-black dark:text-white" for="description">Nom:</label>
                            <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="text" name="lastname" id="description" value="{{ $billingadress->lastname }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-black dark:text-white" for="description">Prenom:</label>
                            <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="text" name="name" id="description" value="{{ $billingadress->name }}" required>
                        </div>
                        
                
                        <button class="mt-8 px-4 py-2 text-white font-light bg-green-500  tracking-wider  rounded" type="submit">Valider mon addresse</button>
                    </div>
                </form>
        </div>
    </div>
</x-app-layout>