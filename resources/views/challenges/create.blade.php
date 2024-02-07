<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Challenge') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('challenges.store') }}">
                        @csrf

                        <div class="mt-4">
                            <x-label for="title" :value="__('Title')" />

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />

                            <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="start_date" :value="__('Start Date')" />

                            <x-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="end_date" :value="__('End Date')" />

                            <x-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date')" required />
                        </div>

                        <div class="flex items
                        -center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>