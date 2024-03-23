<x-app-layout>

    <form action="{{ route('challenges.store') }}" method="POST" class="max-w-xl p-6 mx-auto  rounded-xl shadow-md flex items-center space-x-4">
        @csrf
        @method('POST')
        <input type="hidden" name="competition_id" value="{{ $competition_id }}">

        <div class="flex-1">
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="title">Titre du challenge:</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="name" id="title" required>
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="description">Description du challenge:</label>
                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="description" id="description" cols="30" rows="10" required></textarea>
            </div>

            <div class="mb-4">

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="points">Type de points:</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="points" id="points">
                    <option value="points" >Points</option>
                    <option value="temps">Temps</option>
                    <option value="mètres">Mètres</option>
                    <option value="autre">Autre</option>
                </select>
            </div>

            <button class="btn btn-success text-white mt-4" type="submit">Créer le challenge</button>
        </div>
    </form>
</x-app-layout>