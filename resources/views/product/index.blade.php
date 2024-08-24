<x-app-layout>
    <div class="py-12 mx-2">
        <h1 class="text-center my-3 text-2xl">
            Meus produtos
        </h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-800 text-white px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white lg:overflow-hidden overflow-y-scroll shadow-sm sm:rounded-lg ">
                <table class="table-auto min-w-full">
                    <thead>
                        <tr class="bg-indigo-500 text-white font-bold">
                            <td class="px-4 py-2">
                                #
                            </td>
                            <td class="px-4 py-2">Produto</td>
                            <td class="px-4 py-2">Preço</td>
                            <td class="px-4 py-2">Categoria</td>
                            <td class="px-4 py-2 text-center">Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($products) === 0)
                            <tr class="text-center">
                                <td colspan="5" class="px-4 py-2 text-gray-400">
                                    Nenhum produto encontrado!
                                </td>
                            </tr>
                        @else
                            @foreach ($products as $product)
                                <tr class="hover:bg-indigo-50">
                                    <td class="px-4 py-2">
                                        -
                                    </td>
                                    <td class="px-4 py-2">{{$product->name}}</td>
                                    <td class="px-4 py-2">R$ {{$product->price}}</td>
                                    <td class="px-4 py-2">{{$product->category->name}}</td>
                                    <td class="px-4 py-2">
                                        <div class="flex flex-row justify-center">
                                            <a href="{{route('product.edit', $product->id)}}" class="text-blue-500 m-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                                </svg>
                                            </a>
                                            <x-danger-button
                                                x-data=""
                                                x-on:click.prevent="$dispatch('open-modal', 'modal-product-{{$product->id}}')"
                                                class="text-red-900 m-1 p-0"
                                                style="background: none !important; padding: 0 !important"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash text-red-900" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                </svg>
                                            </x-danger-button>

                                            <x-modal name="modal-product-{{$product->id}}" class="bg-black" focusable>
                                                <form method="post" action="{{ route('product.destroy', $product->id) }}" class="p-6 flex flex-col justify-center">
                                                    @csrf
                                                    @method('delete')

                                                    <h2 class="text-lg lg:font-medium font-normal text-gray-900 text-center">
                                                        Tem certeza que seja excluir este produto?
                                                    </h2>
                                                    <table class="w-1/3 text-sm m-auto">
                                                        <tr>
                                                            <td class="text-center">{{$product->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">R${{$product->price}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">{{$product->category->name}}</td>
                                                        </tr>
                                                    </table>
                                                    <div class="mt-6 flex justify-center">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Cancelar') }}
                                                        </x-secondary-button>

                                                        <x-danger-button class="ms-3 bg-red-900">
                                                            {{ __('Excluir produto') }}
                                                        </x-danger-button>
                                                    </div>
                                                </form>
                                            </x-modal>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
