<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" class="text-indigo-500 shadow-sm focus:ring-indigo-500"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-indigo-500 shadow-sm focus:ring-indigo-500"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" class="text-indigo-500 shadow-sm focus:ring-indigo-500"/>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar senha')" class="text-indigo-500 shadow-sm focus:ring-indigo-500"/>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end flex-col mt-4">
            
            <x-primary-button class="w-full flex justify-center bg-indigo-500 hover:bg-indigo-200 hover:text-black active:bg-white active:text-black">
                {{ __('Registrar-se') }}
            </x-primary-button>

            <a class="underline text-sm mt-3 text-gray-600 hover:text-indigo-500" href="{{ route('login') }}">
                {{ __('Já tem uma conta?') }}
            </a>
        </div>
    </form>
</x-guest-layout>
