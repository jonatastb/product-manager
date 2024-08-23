@if (!Auth::check() || !Auth::user()->is_admin)
    <script>window.location = "/";</script>
@else
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
                        Nova categoria
                    </h1>
                    <form method="POST" action="{{ route('category.store') }}" class="w-full m-auto mb-6 lg:w-1/3">
                        @csrf
                
                        <!-- Name -->
                        <div class="p-3 mb-3">
                            <x-input-label for="name" :value="__('Nome da categoria')" class=" focus:ring-indigo-500"/>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
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
@endif