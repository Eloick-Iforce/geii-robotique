<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teams') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <h2 class="text-2xl font-bold">Bienvenue {{ Auth::user()->name }}</h2>

                     <div class="mt-6">
                          @if (Auth::user())
                          <a href="{{ route('teams.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Ajouter une équipe
                          </a>
                          @endif

                              @if (session('message'))
                                     <div class="bg-green-300 border-t-4 border-green-600 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                                          <div class="flex">
                                               <div>
                                               <p class="text-sm">{{ session('message') }}</p>
                                               </div>
                                          </div>
                                     </div>
                              @endif
    
                          <table class="table-auto w-full mt-6">
                            <thead>
                                 <tr>
                                      <th class="px-4 py-2">Nom</th>
                                      <th class="px-4 py-2">Nombre de membres</th>
                                      <th class="px-4 py-2">Nombre d'enseignant</th>
                                          <th class="px-4 py-2">Compétition</th>
                                      <th class="px-4 py-2">Actions</th>
                                 </tr>
                            </thead>
                            <tbody>
                                 @if($teams->isEmpty())
                                 <tr>
                                      <td class="border px-4 py-2 text-center" colspan="5">Aucune équipe</td>
                                 </tr>
                                 @else
                                 @foreach ($teams as $team)
                                 <tr>
                                      <td class="border px-4 py-2">{{ $team->name }}</td>
                                          <td class="border px-4 py-2">{{ $team->number_of_members }}</td>
                                             <td class="border px-4 py-2">{{ $team->number_of_teachers }}</td>
                                             <td class="border px-4 py-2">{{ $team->competition->name }}</td>
                                      <td class="border px-4 py-2 flex justify-center">

                                        <a href="{{ route('invoices.show', $team->id) }}" target="_blank" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-4 rounded">
                                             Facture
                                        </a>

                                        <a href="{{ route('invoices.mail', $team->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-4 rounded">
                                             Recevoir la facture par mail
                                        </a>

                                             <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="inline-block">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                      Supprimer
                                                  </button>
                                              </form>
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
