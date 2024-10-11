@include('layouts.navigationLog')
<x-guest-layout>
  
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="text-center">
            <p class="text-xl">Привіт!</p>
            <p class="mb-4">Будь ласка введіть свої дані, щоб зареєструватися</p>
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="surname">
                {{ __('Ім\'я') }}<span class="text-red-500">*</span>
            </x-input-label>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Введіть ім'я"
                :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Surname -->
        <div class="mt-4">
            <x-input-label for="surname">
                {{ __('Прізвище') }}<span class="text-red-500">*</span>
            </x-input-label>
            <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname"
                placeholder="Введіть прізвище" :value="old('surname')" required autofocus autocomplete="surname" />
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4 relative">
            <x-input-label for="email">
                {{ __('Електронна пошта') }}<span class="text-red-500">*</span>
            </x-input-label>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                placeholder="Введіть вашу пошту" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

         <!-- phone -->
         <div class="mt-4">
            <x-input-label for="phone">
                {{ __('Телефон') }}<span class="text-red-500">*</span>
            </x-input-label>
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                placeholder="Введіть номер телефону" :value="old('phone')" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Location -->
        <div class="mt-4">
            <x-input-label for="location">
                {{ __('Локація') }}<span class="text-red-500">*</span>
            </x-input-label>
            <select id="location" class="block mt-1 w-full rounded-md border-gray-300" type="text" name="location"
                placeholder="Введіть ім'я" :value="old('location')" required autofocus autocomplete="location">
                <option selected>Виберіть локацію</option>
                <option value="US">United States</option>
                <option value="CA">Canada</option>
            </select>
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password">
                {{ __('Пароль') }}<span class="text-red-500">*</span>
            </x-input-label>

            <x-text-input id="password" class="block mt-1 w-full" type="password" placeholder="Введіть введіть"
                name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation">
                {{ __('Повторіть пароль') }}<span class="text-red-500">*</span>
            </x-input-label>

            <x-text-input id="password_confirmation" class="block mt-1 w-full" placeholder="Повторіть пароль"
                type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center mt-4">
            <input id="default-checkbox" type="checkbox" value="" required
                class="w-4 h-4 text-violet-600 bg-gray-100 border-gray-300 rounded focus:ring-violet-500 dark:focus:ring-violet-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Я погоджуюсь
                з <a href="{{ route('confidentiality.index') }}"
                    class="font-semibold text-violet-600 underline decoration-violet-600">Політикою
                    конфіденційності та Правилами користування</a></label>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">

            <x-primary-button class="ms-4">
                {{ __('Зареєструватися') }}
            </x-primary-button>
        </div>
        <div class="text-center mt-3">
            <p class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Вже маєте акаунт? <a
                    href="{{ route('login') }}"
                    class="font-semibold text-violet-600 underline
                decoration-violet-600">Вхід</a></p>
        </div>
    </form>
</x-guest-layout>
@include('includes.footer')
