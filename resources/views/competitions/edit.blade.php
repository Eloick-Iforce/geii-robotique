<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Competitions') }}
        </h2>
    </x-slot>
    <form action="{{ route('competitions.update', $competition) }}" method="POST" class="p-6 max-w-sm mx-auto  rounded-xl shadow-md flex items-center space-x-4">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $competition->id }}">

    
        <div class="flex-1">
            <div class="mb-4">
                <label class="text-xl text-white" for="title">Titre de la compétition:</label>
                <input class="border-2 border-gray-600 bg-gray-700 text-white p-2 w-full" type="text" name="name" id="title" value="{{ $competition->name }}" required>
            </div>

            <div class="mb-4">
                <label class="text-xl text-white" for="description">Description de la compétition:</label>
                <textarea class="border-2 border-gray-600 bg-gray-700 text-white p-2 w-full" name="description" id="description" cols="30" rows="10" required>{{ $competition->description }}</textarea>
            </div>

            <div class="mb-4">
                <label class="text-xl text-white" for="date">Date de fin:</label>
                <input class="border-2 border-gray-600 bg-gray-700 text-white p-2 w-full" type="date" name="date" id="date" value="{{ $competition->date }}" required>
            </div>

            <button class="px-4 py-2 text-white font-light bg-green-800  tracking-wider  rounded" type="submit">Modifier la compétition</button>
            </div>
    </form>
</x-app-layout>