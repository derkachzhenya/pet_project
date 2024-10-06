@extends('main.index')
@section('main')
    <main>
        <div class ="flex mx-auto w-full">
            <div class ="w-full text-center sm:text-right pt-10 sm:pt-56">
                <span class="text-4xl sm:text-7xl font-semibold items-center">Звідси почінається найкраща дружба</span>

                <div class="flex pt-12 mx-3 sm:ml-52">
                    <form class="mr-6 mt-7 relative w-44">
                        <label for="countries"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Вид
                            тварин</label>
                        <select id="countries"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                         focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Коти</option>
                            <option value="US">Собаки</option>
                        </select>
                    </form>
                    <form class="mr-6 mt-7 relative w-44">
                        <label for="countries "
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Локації</label>
                        <select id="countries"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                         focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Дніпро</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </form>
                    <div class="pt-7">
                        <button type="button"
                            class="text-white bg-violet-700 hover:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium 
                    rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700
                     dark:focus:ring-blue-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Шукати
                        </button>
                    </div>
                </div>
                <div class="mt-5">
                    <img src="vector.png" class="text-right" alt="vectorLogo" />
                </div>
                <div class="mt-12 sm:ml-40">
                    <img src="animals.png" class="text-right" alt="animalsLogo" />
                </div>
            </div>

            <div class="w-full text-right hidden sm:block">
                <img src="girl.png" class="text-right" alt="girlLogo" />
            </div>
        </div>
        <div class="relative h-58 w-3/4 bg-violet-700 rounded-r-lg p-6 shadow-lg">
            <div class="flex justify-center">
                <div class="flex flex-col items-center justify-center p-4">
                    <span class="text-4xl font-medium mb-3 text-white">150</span>
                    <span class="text-lg text-white">Собак</span>
                </div>
                <div class="flex flex-col items-center justify-center ml-4 p-4">
                    <span class="text-4xl font-medium mb-3 text-white">135</span>
                    <span class="text-lg text-white">Птахів</span>
                </div>
                <div class="flex flex-col items-center justify-center ml-4 p-4">
                    <span class="text-4xl font-medium mb-3 text-white">110</span>
                    <span class="text-lg text-white">Котів</span>
                </div>
                <div class="flex flex-col items-center justify-center ml-4 p-4">
                    <span class="text-4xl font-medium mb-3 text-white">50</span>
                    <span class="text-lg text-white">Гризунів</span>
                </div>
                <div class="flex flex-col items-center justify-center ml-2 p-4">
                    <span class="text-4xl font-medium mb-3 text-white">10</span>
                    <span class="text-lg text-white">Рептилій</span>
                </div>
            </div>
            {{-- <div class="absolute h-32 w-32 -right-4 -top-4 rounded-md bg-purple-200"></div> --}}
        </div>

        <div class="mt-12 text-center">
            <span class="text-3xl font-medium">Найновіші оголошення</span>
        </div>
        <div class="w-5/6 mx-auto mt-6 mb-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($pets->take(4) as $pet)
                    <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ route('pets.show', $pet->id) }}">
                            <img class="rounded-t-lg h-48 w-full object-cover" src="main/dog.png" alt="" />

                            <div class="p-5">
                                <h5 class="mb-2 text-xl font-medium tracking-tight text-gray-900 dark:text-white">
                                    {{ $pet->title }}
                                </h5>
                        </a>
                        <p class="mb-3 text-gray-700 dark:text-gray-400 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="purple" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="mr-2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Кам'янець подільский
                        </p>
                        <p class="mb-3 text-gray-700 dark:text-gray-400 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="purple" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="mr-2">
                                <circle cx="12" cy="5" r="3"></circle>
                                <line x1="12" y1="8" x2="12" y2="21"></line>
                                <line x1="8" y1="16" x2="16" y2="16"></line>
                            </svg>
                            Хлопчик
                        </p>
                        <p class="mb-3 text-gray-700 dark:text-gray-400 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"
                                fill="none" stroke="purple" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="mr-2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                <line x1="16" y1="2" x2="16" y2="6" />
                                <line x1="8" y1="2" x2="8" y2="6" />
                                <line x1="3" y1="10" x2="21" y2="10" />
                            </svg>
                            3,5 роки
                        </p>
                        <p class="font-bold text-right text-xl">
                            ₴ {{ $pet->price }}
                        </p>
                    </div>
            </div>
            @endforeach
        </div>
        </div>

    </main>
@endsection
