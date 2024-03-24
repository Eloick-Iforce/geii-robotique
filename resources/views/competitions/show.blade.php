<x-app-layout>


    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8 dark:text-gray-100">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between">
                    <a href="{{ route('competitions.index') }}" class="btn btn-primary">
                        Retour
                    </a>
                    <div class="flex flex-col items-end justify-end gap-4">
                    <div class="text-right">
                    <h2 class="text-2xl font-bold">{{ $competition->name }}</h2>
                    <p class="text-xl">{{ \Carbon\Carbon::parse($competition->date)->isoFormat('dddd D MMMM YYYY') }}</p>
                    <p class="text-xl">{{ $competition->description }}</p>
                    </div>
                    @if (Auth::user()->role == 'admin')
                        <div class="flex justify-end">
                            <a href="{{ route('challenges.create', $competition) }}" class="btn btn-primary">
                                Créer un challenge
                            </a>
                        </div>
                @endif
                    </div>



                    </div>
                </div>

                @if ($competition->challenges && count($competition->challenges) > 0)
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-2xl">
                        Challenges
                    </div>

                        @foreach ($competition->challenges as $challenge)
                            <div class="flex justify-between">
                                <div>
                                    <div class="text-xl font-bold">{{ $challenge->name }}</div>
                                    <div class="text-lg">{{ $challenge->description }}</div>
                                    <div class="text-sm text-gray-400">Résultats par {{ $challenge->points }}</div>
                                </div>
                            <div class="flex gap-4 items-center">
                                @if (Auth::user()->role == 'admin')
                                    <a href="{{ route('challenges.edit', $challenge) }}" class="btn btn-warning text-white">
                                        Modifier
                                    </a>
                                    <form action="{{ route('challenges.destroy', $challenge) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-error text-white">
                                            Supprimer
                                        </button>
                                    </form>
                                @endif
                            </div>
                                
                            </div>
                        @endforeach
                </div>

                    @endif
<div class="bg-white border-b border-gray-200 flex flex-col gap-4 pt-4">
                    <h2 class="text-2xl ml-4 font-bold">Statistiques :</h2>
                    <div class="stats stats-vertical lg:stats-horizontal rounded-none w-full shadow">
  
                        <div class="stat">
                          <div class="stat-title">Nombre d'équipe</div>
                          <div class="stat-value">{{ $teams->count() }}</div>
                          <div class="stat-desc">Inscrite à cette compétition</div>
                        </div>
                        
                        <div class="stat">
                          <div class="stat-title">Nombre de Robot en BUT1</div>
                          <div class="stat-value">{{ $teams->sum('number_of_robots_but1') }}</div>
                        </div>
                        
                        <div class="stat">
                          <div class="stat-title">Nombre de Robot en BUT2</div>
                          <div class="stat-value">{{ $teams->sum('number_of_robots_but2') }}</div>
                        </div>
                        <div class="stat">
                            <div class="stat-title">Nombre de Robot en BUT3</div>
                            <div class="stat-value">{{ $teams->sum('number_of_robots_but3') }}</div>
                          </div>
                          <div class="stat">
                            <div class="stat-title">Nombre d'étudiants</div>
                            <div class="stat-value">{{ $teams->sum('number_of_members') }}</div>
                          </div>
                          <div class="stat">
                            <div class="stat-title">Nombre de professeurs</div>
                            <div class="stat-value">{{ $teams->sum('number_of_teachers') }}</div>
                          </div>
                        
                      </div>
</div>

                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-2xl">
                            Equipes inscrites ({{ $teams->count() }})
                        </div>
                        <table class="table-auto w-full mt-6">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Nom</th>
                                    <th class="px-4 py-2">Nombre de membres</th>
                                    <th class="px-4 py-2">Nombre d'enseignant</th>
                                    <th class="px-4 py-2">Nombre de robot BUT1</th>
                                    <th class="px-4 py-2">Nombre de robot BUT2</th>
                                    <th class="px-4 py-2">Nombre de robot BUT3</th>
                                    <th class="px-4 py-2">Nombre total de robot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($teams)
                                    @foreach ($teams as $team)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $team->name }}</td>
                                            <td class="border px-4 py-2">{{ $team->number_of_members }}</td>
                                            <td class="border px-4 py-2">{{ $team->number_of_teachers }}</td>
                                            <td class="border px-4 py-2">{{ $team->number_of_robots_but1 }}</td>
                                            <td class="border px-4 py-2">{{ $team->number_of_robots_but2 }}</td>
                                            <td class="border px-4 py-2">{{ $team->number_of_robots_but3 }}</td>
                                            <td class="border px-4 py-2">{{ $team->number_of_robots_but1 + $team->number_of_robots_but2 + $team->number_of_robots_but3 }}</td>
                                </tr>
                                    @endforeach
                                    <tr>
                                        <td class="border px-4 py-2 text-center" colspan="1">Total</td>
                                        <td class="border px-4 py-2">{{ $teams->sum('number_of_members') }}</td>
                                        <td class="border px-4 py-2">{{ $teams->sum('number_of_teachers') }}</td>
                                        <td class="border px-4 py-2">{{ $teams->sum('number_of_robots_but1') }}</td>
                                        <td class="border px-4 py-2">{{ $teams->sum('number_of_robots_but2') }}</td>
                                        <td class="border px-4 py-2">{{ $teams->sum('number_of_robots_but3') }}</td>
                                        <td class="border px-4 py-2">{{ $teams->sum('number_of_robots_but1') + $teams->sum('number_of_robots_but2') + $teams->sum('number_of_robots_but3') }}</td>
                                    </tr>                                    
                                    @else
                                    <tr>
                                        <td class="border px-4 py-2 text-center" colspan="1">Aucune équipe inscrite</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                
            </div>
        </div>
    </div>


</x-app-layout>
