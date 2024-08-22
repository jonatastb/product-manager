<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <h1 class="text-2xl font-extrabold text-indigo-500 text-center border-b p-6 w-1/3 m-auto mb-6">
                    Novo produto
                </h1>
                <form method="POST" action="{{ route('register') }}" class="w-1/2 m-auto mb-6 ">
                    @csrf
            
                    <!-- Name -->
                    <div class="p-3 mb-3">
                        <x-input-label for="name" :value="__('Nome')" class=" focus:ring-indigo-500"/>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="p-3 mb-3 flex flex-row items-center justify-between">
                        <div class="relative w-1/2 mr-4">
                            <x-input-label for="price" :value="__('Preço')" class=" focus:ring-indigo-500"/>
                            <div class="flex items-center">
                                <span class="shadow-none absolute mt-1 text-gray-500"  style="left: -24px">R$</span>
                                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" placeholder='150' :value="old('price')" required autofocus autocomplete="price" />
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>
                        </div>
                        <div  class="w-1/2 ml-4">
                            <x-input-label for="price" :value="__('Categorias')" class=" focus:ring-indigo-500"/>
                            <select id="countries" class="mt-1 border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option selected hidden>Escolha uma categoria</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                    </div>
            
                    <div class="flex items-center justify-end flex-col mt-4">
                        
                        <x-primary-button class="w-full flex justify-center bg-indigo-500 hover:bg-indigo-200 hover:text-black active:bg-white active:text-black">
                            {{ __('Criar') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
