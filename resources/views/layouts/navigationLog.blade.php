<nav x-data="" class="bg-white border-b border-gray-100 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <a href="{{ route('pet.create.step.one') }}"
                   class="text-white bg-purple-700 mr-5 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium 
                   rounded-full text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                   + Додати оголошення
                </a>
                
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md
                         text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 100 100">                                            
                                    <circle cx="50" cy="50" r="50" fill="#e9d5ff"/>
                                    <circle cx="50" cy="38" r="18" fill="#a855f7"/>
                                    <path d="M50 60 
                                             Q30 60 20 80
                                             Q20 100 50 100
                                             Q80 100 80 80
                                             Q70 60 50 60" 
                                          fill="#a855f7"/>
                                </svg>
                            </div>
                           <div>Аккаунт</div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="flex justify-center items-center h-full">
                            {{ $slot ?? 'Ви повинні ввійти' }}
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
