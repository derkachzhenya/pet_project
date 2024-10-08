@include('layouts.navigationLog')
<x-guest-layout>
    
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="text-center">
            <p class="text-xl">Привіт знову!</p>
            <p class="mb-4">Будь ласка, введіть свої дані, щоб увійти</p>
        </div>
        <!-- Email Address -->
        <div>
            <x-input-label for="surname">
                {{ __('Електронна пошта') }}<span class="text-red-500">*</span>
            </x-input-label>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Введіть ім'я"
                :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="surname">
                {{ __('Пароль') }}<span class="text-red-500">*</span>
            </x-input-label>

            <x-text-input id="password" placeholder="Введіть пароль" class="block mt-1 w-full" type="password"
                name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex justify-between">
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Запам\'ятати мене') }}</span>
                </label>
            </div>
            @if (Route::has('password.request'))
                <a class="underline text-sm mt-4 text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Забули пароль?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-center mt-4">


            <x-primary-button class="ms-3">
                {{ __('Увійти') }}
            </x-primary-button>
        </div>
        <div class="text-center mt-3">
            <p class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ще не маєте аккаунту? <a href="{{route('register')}}" class="font-semibold text-violet-600 underline
                decoration-violet-600">Зареєструватися</a></p> 
        </div>
    </form>
</x-guest-layout>
@include('includes.footer')