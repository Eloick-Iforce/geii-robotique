<x-app-layout>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div x-data="{ search: '', users: JSON.parse('{{ json_encode($users) }}'), sortField: '', sortDirection: 'asc' }">
                        <div class="space-y-4">
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 items-center border-b border-gray-200 py-2">
                                <input x-model="search" type="text" placeholder="Rechercher par nom" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                                <div>
                                    <button class="btn btn-neutral" @click="sortField = 'is_verified'; sortDirection = sortDirection === 'asc' ? 'desc' : 'asc'">Trier par statut vérifié</button>
                                </div>
                            </div>
                            <template x-for="(user, index) in users.sort((a, b) => {
                                if (sortField === '') return 0;
                                if (sortDirection === 'asc') {
                                    return a[sortField] > b[sortField] ? 1 : -1;
                                } else {
                                    return a[sortField] < b[sortField] ? 1 : -1;
                                }
                            })" :key="index">
                                <div x-show="!search || user.name.toLowerCase().includes(search.toLowerCase())" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 items-center border-b border-gray-200 py-2">
                                    <div x-text="user.name"></div>
                                    <div x-text="user.email"></div>
                                    <div class="text-center">
                                        <span x-show="user.is_verified == 1" class="inline-block bg-green-500 text-white text-sm font-bold py-2 px-4 rounded-full">Vérifié</span>
                                        <span x-show="user.is_verified == 0" class="inline-block bg-red-500 text-white text-sm font-bold py-2 px-4 rounded-full">Non vérifié</span>
                                    </div>
                                    <div class="flex justify-center gap-4">
                                        <form x-show="user.is_verified == 0" :action="'/users/' + user.id + '/verify'" method="POST" class="inline">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-info text-white">Vérifier</button>
                                        </form>
                                        <form x-show="user.is_verified == 1" :action="'/users/'+ user.id + '/unverify'" method="POST" class="inline">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-warning text-white">Déverifier</button>
                                        </form>
                                        <form :action="'/users/' + user.id + 'destroy/'" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-error text-white" onclick="return confirm('Are you sure?')">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>