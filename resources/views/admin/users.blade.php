<x-app-layout>
    <div class="py-12 mx-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white lg:overflow-hidden overflow-y-scroll shadow-sm sm:rounded-lg ">
                <table class="table-auto min-w-full">
                    <thead>
                        <tr class="bg-indigo-500 text-white font-bold">
                            <td class="px-4 py-2">
                                #
                            </td>
                            <td class="px-4 py-2">Nome</td>
                            <td class="px-4 py-2">Email</td>
                            <td class="px-4 py-2">Criado em</td>
                            <td class="px-4 py-2 text-center">Produtos</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) === 0)
                            <tr class="text-center">
                                <td colspan="7" class="px-4 py-2 text-gray-400">
                                    Nenhum usuário encontrado!
                                </td>
                            </tr>
                        @else
                            @foreach ($users as $user)
                                <tr class="hover:bg-indigo-50">
                                    <td class="px-4 py-2">
                                        @if ($user->is_admin)
                                            <span class="text-xs bg-indigo-500 px-2 py-1 rounded-lg text-white">
                                                Administrador
                                            </span>
                                        @else
                                            <span class="text-xs bg-gray-500 px-2 py-1 rounded-lg text-white">
                                                Comum
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">{{$user->name}}</td>
                                    <td class="px-4 py-2">{{$user->email}}</td>
                                    <td class="px-4 py-2">{{date_format($user->created_at,"d/m/Y")}}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{route('product.usersProduct',$user->id)}}" class="text-indigo-500 font-bold flex flex-row items-center justify-center">
                                            Ver
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill ml-1" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
