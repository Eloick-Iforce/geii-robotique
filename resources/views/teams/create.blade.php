<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black dark:text-white leading-tight">
            {{ __('Équipes') }}
        </h2>
    </x-slot>
    <form action="{{ route('teams.store') }}" method="POST" class="p-6 max-w-sm mx-auto  rounded-xl shadow-md flex items-center space-x-4">
        @csrf
        @method('POST')
    
        <div class="flex-1">

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <div class="mb-4">
                <label class="text-xl text-black dark:text-white" for="title">Nom de l'équipe:</label>
                <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="text" name="name" id="title" required>
            </div>

            <p class="text-xl text-black dark:text-white">Nombre de robot par but (150 € pour le 1er robot, 50 € par robot supplémentaire, 0€ pour les
                robots BUT3)</p><br>

            <div class="mb-4">
                <label class="text-xl text-black dark:text-white" for="title">Nombre de robot BUT1:</label>
                <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="number" name="number_of_robots_but1" id="title" required min="0">
            </div>

            <div class="mb-4">
                <label class="text-xl text-black dark:text-white" for="title">Nombre de robot BUT2:</label>
                <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="number" name="number_of_robots_but2" id="title" required min="0">
            </div>

            <div class="mb-4">
                <label class="text-xl text-black dark:text-white" for="title">Nombre de robot BUT3:</label>
                <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="number" name="number_of_robots_but3" id="title" required min="0">
            </div>

            <div class="mb-4">
                <label class="text-xl text-black dark:text-white" for="title">Nombre de membre de l'équipe (80€ par étudiant en dessous de 6, 40 € par étudiant
                    supplémentaire):</label>
                <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="number" name="number_of_members" id="title" required min="1">
            </div>

            <div class="mb-4">
                <label class="text-xl text-black dark:text-white" for="title">Nombre d'enseignant (45€ par enseignant):</label>
                <input class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" type="number" name="number_of_teachers" id="title" required min="1">
            </div>

            <div class="mb-4">
                <label class="text-xl text-black dark:text-white" for="title">Compétition:</label>
                <select class="border-2 border-gray-600 bg-gray-200 dark:bg-gray-700 text-black dark:text-white p-2 w-full" name="competition_id" id="competition_id">
                    @foreach ($competitions as $competition)
                        <option value="{{ $competition->id }}">{{ $competition->name }}</option>
                    @endforeach
                </select>
    
            <button class="mt-8 px-4 py-2 text-white font-light bg-green-500  tracking-wider  rounded" type="submit">Inscrire cette équipe à cette compétition</button>
        </div>
    </form>
</x-app-layout>