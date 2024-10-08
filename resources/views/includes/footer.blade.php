<footer class="bg-black shadow dark:bg-gray-900">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="{{ route('home') }}" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('logoOne.png') }}" class="h-8" alt="logoWhite" />

            </a>
            <div>
                <div class="text-white mb-3">
                    Контакти
                </div>
                <ul
                    class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">support@petworld.pet</a>
                    </li>

                </ul>
            </div>
        </div>
        <span class="block text-sm mt-10 text-gray-500 text-center dark:text-gray-400">Copyright 2024 | <a
                href="{{route('confidentiality.index')}}" class="hover:underline">Політика конфіденційності</a></span>
    </div>
</footer>