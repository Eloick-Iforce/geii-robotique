<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black dark:text-white leading-tight">
            {{ __('Competitions') }}
        </h2>
    </x-slot>
    <form action="{{ route('challenges.update', $challenge->id) }}" method="POST" class="max-w-xl p-6 mx-auto  rounded-xl shadow-md flex items-center space-x-4">
        @csrf
        @method('PUT')

        <input type="hidden" name="competition_id" value="{{ $challenge->competition_id }}">
        <input type="hidden" name="challenge_id" value="{{ $challenge->id }}">
        <div class="flex-1">
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="title">Titre du challenge:</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="name" id="title" value="{{ $challenge->name }}" required>
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="description">Description du challenge:</label>
                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="description" id="description" cols="30" rows="10" required>{{ $challenge->description }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="points">Type de points:</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="points" id="points">
                    <option value="points" {{ $challenge->points == "points" ? 'selected' : '' }}>Points</option>
                    <option value="temps" {{ $challenge->points == "temps" ? 'selected' : '' }}>Temps</option>
                    <option value="mètres" {{ $challenge->points == "mètres" ? 'selected' : '' }}>Mètres</option>
                    <option value="autre" {{ $challenge->points == "autre" ? 'selected' : '' }}>Autre</option>
                </select>
            </div>

            <button class="btn-add mt-4" type="submit">Mettre à jour le challenge</button>
        </div>
    </form>
</x-app-layout>