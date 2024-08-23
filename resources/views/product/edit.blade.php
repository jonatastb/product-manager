<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="bg-red-500 text-white px-4 py-2 rounded mb-4">
                    {{ $errors->first() }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <h1 class="text-2xl font-extrabold text-indigo-500 text-center border-b p-6 w-full lg:w-1/3 m-auto mb-6">
                    Editar produto
                </h1>
                
                <form method="POST" action="{{ route('product.update', $product->id) }}" class="w-full lg:w-1/3 m-auto mb-6 ">
                    @csrf
                    @method('PUT')
                    <!-- Name -->
                    <div class="p-3 mb-3">
                        <x-input-label for="name" :value="__('Nome')" class=" focus:ring-indigo-500"/>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$product->name}}" required autofocus autocomplete="name" />
                    </div>

                    <div class="p-3 mb-3 flex flex-row items-center justify-between">
                        <div class="relative w-1/2 mr-4">
                            <div class="flex flex-row items-center">
                                <x-input-label for="price" :value="__('Preço')" class=" focus:ring-indigo-500 mr-1"/>
                                <x-input-label for="price" :value="__('Ex: 000.00')" class=" focus:ring-indigo-500 text-xs text-gray-200"/>
                            </div>
                            <div class="flex items-center">
                                <span class="shadow-none absolute mt-1 text-gray-500"  style="left: -24px">R$</span>
                                <div class="flex flex-col">
                                    <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" placeholder='150' value="{{$product->price}}" required autofocus autocomplete="price" />
                                </div>
                                
                            </div>
                        </div>
                        <div  class="w-1/2 ml-4">
                            <x-input-label for="category_id" :value="__('Categorias')" class=" focus:ring-indigo-500"/>
                            <select name="category_id" id="category_id" class="mt-1 border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="{{$product->category->id}}" selected hidden>{{$product->category->name}}</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if (Auth::user()->is_admin)
                        <span class="text-gray-400 w-full flex justify-center">
                            Criado por {{$product->user->name}}
                        </span>
                    @endif
                    <div class="flex items-center justify-end flex-col mt-4">
                        
                        <x-primary-button class="w-full flex justify-center bg-indigo-500 hover:bg-indigo-200 hover:text-black active:bg-white active:text-black">
                            {{ __('Editar') }}
                        </x-primary-button>
                    </div>
                </form>

                
            </div>
        </div>
    </div>
</x-app-layout>
