<x-app-layout>


    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                   <h2 class="text-2xl font-bold">Vos équipes</h2>
                   <a href="{{ route('teams.create') }}" class="btn btn-primary">
                    Ajouter une équipe
                  </a>
               </div>

                     <div class="my-8">

                              @if (session('message'))
                                     <div class="bg-green-300 border-t-4 border-green-600 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                                          <div class="flex">
                                               <div>
                                               <p class="text-sm">{{ session('message') }}</p>
                                               </div>
                                          </div>
                                     </div>
                              @endif
    
                              <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 mt-6">
                                   @if($teams->isEmpty())
                                       <div class="border p-4 text-center">
                                           Aucune équipe
                                       </div>
                                   @else
                                       @foreach ($teams as $team)
                                       @if ($team->is_open_pdf == 0)
                                       <div class="border bg-red-400/20 border-error rounded">
                                           @else
                                           <div class="border rounded">
                                              @endif
                                               <div class="p-4">
                                                  <div class="flex justify-between items-center">
                                                   <h3 class="font-semibold">{{ $team->name }}</h3>
                                                   <div>
                                                       @if ($team->is_open_pdf == 1)
                                                           <span class="badge badge-success text-white">
                                                               Inscription validée
                                                           </span>
                                                       @else
                                                           <span class="badge badge-error text-white">
                                                               Pas inscrit
                                                           </span>
                                                       @endif
                                                       </div>
                                                  </div>
                                                   <p>Nombre de membres: {{ $team->number_of_members }}</p>
                                                   <p>Nombre d'enseignants: {{ $team->number_of_teachers }}</p>
                                                   <p>Compétition: {{ $team->competition->name }}</p>

                                               </div>
                                               <div class="p-4 flex gap-4">
                                                   <a href="{{ route('invoices.recap', $team->id) }}" class="btn btn-success text-white px-4 py-2 rounded">
                                                       Récapitulatif
                                                   </a>
                                                   <a href="{{ route('invoices.mail', $team->id) }}" class="btn btn-neutral text-white px-4 py-2 rounded">
                                                       Recevoir le devis par mail
                                                   </a>
                                                   <form action="{{ route('teams.destroy', $team->id) }}" method="POST">
                                                       @csrf
                                                       @method('DELETE')
                                                       <button type="submit" class="btn btn-error text-white">
                                                           Supprimer
                                                       </button>
                                                   </form>
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
