<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" class="text-indigo-500" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full focus:border-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" class="text-indigo-500" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full focus:border-indigo-500"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-500 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Manter me conectado') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end flex-col mt-4">
            <x-primary-button class="w-full flex justify-center bg-indigo-500 hover:bg-indigo-200 hover:text-black">
                {{ __('Entrar') }}
            </x-primary-button>
            <a href="{{route('register')}}" class="underline text-sm mt-3 text-gray-600 hover:text-indigo-500">Não tem uma conta?</a>
        </div>
    </form>
</x-guest-layout>
