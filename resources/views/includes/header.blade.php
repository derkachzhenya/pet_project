    <nav class="bg-white border-b drop-shadow dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="flex">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('logoOne.png') }}" class="h-8" alt="logoOne.png" />
                </a>
                <a href="{{ route('catalog.index') }}"> <span
                        class="pl-10 self-center text-lg font-semibold whitespace-nowrap dark:text-white">Оголошення</span></a>
            </div>

            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li class = "my-auto">
                        <a href="{{ route('pet.create.step.one') }}"
                            class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">+
                            Додати оголошення</a>
                    </li>
                    <li class = "my-auto">
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        {{ Auth::user()->name }}
                                    </a>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Логін
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                            Реєстрація
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
