@include('layouts.navigationLog')
<x-guest-layout>
    <div class="mb-4 text-sm">
        <p class="text-center text-2xl">{{ __('Забули пароль? ') }}</p>
        <p class="text-center mt-3">Не хвилюйтеся, ми відправимо посилання на відновлення паролю на пошту</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Електронна пошта')" class="absolute left-2 top-2" />

            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-8">
            <button type="submit"
                class="text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-4
                   focus:ring-gray-300 font-medium rounded-full text-sm px-32 py-3">
                Надіслати посилання
            </button>
        </div>

    </form>
</x-guest-layout>
@include('includes.footer')
