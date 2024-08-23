<x-app-layout>
    <div class="py-12 mx-2">
        <h1 class="text-center my-3 text-2xl">
            Produtos de <span class="font-bold text-indigo-500">{{$user->name}}</span>
        </h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                            <td class="px-4 py-2">Criado em</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($products) == 0)
                            <tr class="text-center">
                                <td colspan="7" class="px-4 py-2 text-gray-400">
                                    Nenhum produto deste usuário encontrado!
                                </td>
                            </tr>
                        @else
                            @foreach ($products as $product)
                                <tr class="hover:bg-indigo-50">
                                    <td class="px-4 py-2">-</td>
                                    <td class="px-4 py-2">{{$product->name}}</td>
                                    <td class="px-4 py-2">R$ {{$product->price}}</td>
                                    <td class="px-4 py-2">{{$product->category->name}}</td>
                                    <td class="px-4 py-2">{{date_format($product->created_at,"d/m/Y")}}</td>
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
