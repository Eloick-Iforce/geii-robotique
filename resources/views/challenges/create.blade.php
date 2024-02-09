<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black dark:text-white leading-tight">
            {{ __('Competitions') }}
        </h2>
    </x-slot>
    <form action="{{ route('challenges.store') }}" method="POST" class="p-6 max-w-sm mx-auto  rounded-xl shadow-md flex items-center space-x-4">
        @csrf
        @method('POST')
        <input type="hidden" name="competition_id" value="{{ $competition_id }}">
    
        <div class="flex-1">
            <div class="mb-4">
                <label class="text-xl text-black dark:text-white" for="title">Titre du challenge:</label>
                <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="text" name="name" id="title" required>
            </div>

            <div class="mb-4">
                <label class="text-xl text-black dark:text-white" for="description">Description du challenge:</label>
                <textarea class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" name="description" id="description" cols="30" rows="10" required></textarea>
            </div>
    
            <div class="mb-4">
                <label class="text-xl text-black dark:text-white" for="date">Type de points:</label>
                <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="date" name="date" id="date" required>
            </div>
    
            <button class="px-4 py-2 text-white font-light bg-green-500  tracking-wider  rounded" type="submit">Créer le challenge</button>
        </div>
    </form>
</x-app-layout>