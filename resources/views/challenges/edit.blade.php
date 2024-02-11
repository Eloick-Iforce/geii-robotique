<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black dark:text-white leading-tight">
            {{ __('Competitions') }}
        </h2>
    </x-slot>
    <form action="{{ route('challenges.update', $challenge->id) }}" method="POST" class="p-6 max-w-md mx-auto  rounded-xl shadow-md flex items-center space-x-4">
        @csrf
        @method('PUT')

        <input type="hidden" name="competition_id" value="{{ $challenge->competition_id }}">
        <input type="hidden" name="challenge_id" value="{{ $challenge->id }}">
        <div class="flex-1">
            <div class="mb-4">
                <label class="text-xl text-black dark:text-white" for="title">Titre du challenge:</label>
                <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="text" name="name" id="title" value="{{ $challenge->name }}" required>
            </div>

            <div class="mb-4">
                <label class="text-xl text-black dark:text-white" for="description">Description du challenge:</label>
                <textarea class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" name="description" id="description" cols="30" rows="10" required>{{ $challenge->description }}</textarea>
            </div>
    
            <div class="mb-4">
                <label class="text-xl text-black dark:text-white" for="points">Type de points:</label>
                <select class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2" name="points" id="points">
                    <option value="points" {{ $challenge->points == "points" ? 'selected' : '' }}>Points</option>
                    <option value="temps" {{ $challenge->points == "temps" ? 'selected' : '' }}>Temps</option>
                    <option value="mètres" {{ $challenge->points == "mètres" ? 'selected' : '' }}>Mètres</option>
                    <option value="autre" {{ $challenge->points == "autre" ? 'selected' : '' }}>Autre</option>
                </select>
            </div>
    
            <button class="px-4 py-2 text-white font-light bg-green-500  tracking-wider  rounded" type="submit">Mettre à jour le challenge</button>
        </div>
    </form>
</x-app-layout>