 <x-app-layout>


     <div class="py-12">
         <div class="mx-auto sm:px-6 lg:px-8">
             <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold">Liste des compétitions disponible</h2>
                    @if (Auth::user()->role == 'admin')
                    <a href="{{ route('competitions.create') }}" class="btn btn-primary">
                        Ajouter une compétition
                    </a>
                    </div>

                    <div class="mt-6">

                        @endif


                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 mt-6">
                                @if($competitions->isEmpty())
                                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 mt-6">
                                        <div class="border w-full p-4 text-center">
                                            Aucune compétition
                                        </div>
                                    </div>
                                @else
                                    @foreach ($competitions as $competition)
                                        <div class="border rounded">
                                            <div class="p-4">
                                                <div class="flex justify-between items-center">
                                                    <h3 class="font-semibold text-xl">{{ $competition->name }}</h3>
                                                    @if (Auth::user()->role == 'admin')
                                                        <div x-data="{ open: false }" class="relative">
                                                            <button @click="open = !open" class="btn btn-neutral text-white">
                                                                Actions
                                                            </button>
                                                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg origin-top-right ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                                                <div class="py-1" role="none"> 
                                                                    <a href="{{ route('competitions.edit', $competition->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-1">Modifier</a>
                                                                    <form action="{{ route('competitions.destroy', $competition->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Supprimer</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <p class="text-sm text-gray-600">Début le {{ \Carbon\Carbon::parse($competition->date)->isoFormat('dddd D MMMM YYYY') }}</p>
                                                <p class="text-md">{{ Str::limit($competition->description, 100) }}...</p>
                                            </div>
                                            <div class="p-4"> 
                                                <a href="{{ route('competitions.show', $competition->id) }}" class="btn btn-success text-white">Voir</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                        </div>
                        
                    </div>
                 </div>
             </div>
         </div>
     </div>
 </x-app-layout>
