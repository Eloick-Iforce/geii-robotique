<x-app-layout>


    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Vérifié</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="border px-4 py-2">{{ $user->id }}</td>
                                    <td class="border px-4 py-2">{{ $user->name }}</td>
                                    <td class="border px-4 py-2">{{ $user->email }}</td>
                                    <td class="border px-4 py-2 text-center">
                                        @if ($user->is_verified == 1)
                                            <span class="inline-block bg-green-500 text-white text-sm font-bold py-2 px-4 rounded-full">Vérifié</span>
                                        @else
                                            <span class="inline-block bg-red-500 text-white text-sm font-bold py-2 px-4 rounded-full">Non vérifié</span>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2 flex justify-center gap-4">

                                            @if ($user->is_verified == 0)
                                                <form action="{{ route('users.verify', $user->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('GET')
                                                    <button
                                                        type="submit"
                                                        class="btn btn-info text-white"
                                                    >
                                                        Vérifier
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('users.unverify', $user->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('GET')
                                                    <button
                                                        type="submit"
                                                        class="btn btn-warning text-white"
                                                    >
                                                        Déverifier
                                                    </button>
                                                </form>
                                            @endif
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    type="submit"
                                                    class="btn btn-error text-white"
                                                    onclick="return confirm('Are you sure?')"
                                                >
                                                    Supprimer
                                                </button>
                                            </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
