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


                        <table class="table-auto w-full mt-6">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Nom</th>
                                    <th class="px-4 py-2">Date</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($competitions->isEmpty())
                                <tr>
                                    <td class="border px-4 py-2 text-center" colspan="4">Aucune compétition</td>
                                </tr>
                                @else
                                @foreach ($competitions as $competition)
                                <tr>
                                    <td class="border px-4 py-2">{{ $competition->name }}</td>
                                    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($competition->date)->isoFormat('dddd D MMMM YYYY') }}</td>
                                    <td class="border px-4 py-2 flex justify-center gap-4">
                                            <a href="{{ route('competitions.show', $competition->id) }}" class="btn btn-info text-white">
                                                Voir
                                            </a>
                                        @if (Auth::user()->role == 'admin')
                                            <a href="{{ route('competitions.edit', $competition->id) }}" class="btn btn-warning text-white">
                                                Modifier
                                            </a>
                                            <form action="{{ route('competitions.destroy', $competition->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-error text-white">
                                                    Supprimer
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                 </div>
             </div>
         </div>
     </div>
 </x-app-layout>
