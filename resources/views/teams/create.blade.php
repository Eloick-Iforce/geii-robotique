<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black dark:text-white leading-tight">
            {{ __('Équipes') }}
        </h2>
    </x-slot>
    <form action="{{ route('teams.store') }}" method="POST" class="max-w-xl p-6 mx-auto  rounded-xl shadow-md flex items-center space-x-4">
        @csrf
        @method('POST')
    
        <div class="flex-1">

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="title">Nom de l'équipe:</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="name" id="title" required>
            </div>

            <p class="text-md text-gray-700 dark:text-white mb-4">Prix des robots 150 € pour le 1er robot, 50 € par robot supplémentaire</p>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="title">Nombre de robot BUT1:</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="number" name="number_of_robots_but1" id="title" required min="0">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="title">Nombre de robot BUT2:</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="number" name="number_of_robots_but2" id="title" required min="0">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="title">Nombre de robot BUT3:</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="number" name="number_of_robots_but3" id="title" required min="0">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="title">Nombre de membre de l'équipe (80€ par étudiant en dessous de 6, 40 € par étudiant
                    supplémentaire):</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="number" name="number_of_members" id="title" required min="1">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="title">Nombre d'enseignant (45€ par enseignant):</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="number" name="number_of_teachers" id="title" required min="1">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="title">Compétition:</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="competition_id" id="competition_id">
                    @foreach ($competitions as $competition)
                        <option value="{{ $competition->id }}">{{ $competition->name }}</option>
                    @endforeach
                </select>
    
            <button class="btn-add mt-4" type="submit">Inscrire cette équipe à cette compétition</button>
        </div>
    </form>
</x-app-layout>