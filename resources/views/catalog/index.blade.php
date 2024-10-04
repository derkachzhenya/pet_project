@extends('main.index')
@section('main')
    <div class="w-full md:w-5/6 mx-auto">
        <div class="flex justify-between mt-12">
            <p class="font-semibold text-xl">Фільтри</p>


            <div>
                <select id="countries"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg  mb-5 w-48 focus:ring-blue-500
                         focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Сортувати за</option>
                    <option value="US">Собаки</option>
                </select>
            </div>
        </div>
        <div class="flex">
            <div class="w-1/4">
                <form action="">
                    <div class="relative w-full">
                        <label for="countries "
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Вид
                            тварин</label>
                        <select id="countries"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                         focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Кіт</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                    <div class="mt-5 relative w-full">
                        <label for="countries "
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Різновид</label>
                        <select id="countries"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                         focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Оберіть різновид</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                    <div class="mt-5 relative w-full">
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
                    </div>
                    <div class="mt-5 relative w-full">
                        <label for="countries "
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Походження</label>
                        <select id="countries"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                         focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Приватний власник</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                    <div class="mt-6">
                        <p class="text-lg">Вік</p>
                        <div class="flex mt-3 relative gap-3">
                            <label for="countries"
                                class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Мін</label>
                            <input type="text" id="first_name"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="" required />
                            <select id="countries"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                     focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                      dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Місяців</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                        <div>
                            <div class="flex mt-5 relative gap-3">
                                <label for="countries "
                                    class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Макс</label>
                                <input type="text" id="first_name"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                     focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                      dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="" required />

                                <select id="countries"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                         focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Місяців</option>
                                    <option value="US">United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="FR">France</option>
                                    <option value="DE">Germany</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <p class="text-lg">Ціна</p>
                        <div class="flex mt-3 gap-3">
                            <input type="text" id="first_name"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="₴ 0" required />

                            <input type="text" id="first_name"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-900
                                   dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="₴ 10000" required />
                        </div>
                        <div>
                            <div class="flex mt-1 relative gap-3">
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Безкоштовно</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-lg">Стать</p>
                        <div class="mt-3">
                            <div class="flex items-center mb-4">
                                <input id="default-radio-1" type="radio" value="" name="default-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Дівчинка</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input checked id="default-radio-2" type="radio" value="" name="default-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-2"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Хлопчик</label>
                            </div>
                            <div class="flex items-center">
                                <input checked id="default-radio-3" type="radio" value="" name="default-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-3"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Невідомо</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-lg">Здоров'я</p>
                        <div class="mt-3">

                        </div>
                    </div>
                </form>
            </div>


            <div class="w-3/4">
                <div class="md:grid md:grid-cols-3 md:gap-4 ml-5">
                    @foreach ($pets->take(4) as $pet)
                        <div
                            class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="{{ route('pets.show', $pet->id) }}">
                                <img class="rounded-t-lg h-48 w-full object-cover" src="main/dog.png" alt="" />

                                <div class="p-5">
                                    <h5 class="mb-2 text-xl font-medium tracking-tight text-gray-900 dark:text-white">
                                        {{ $pet->title }}
                                    </h5>
                            </a>
                            <p class="mb-3 text-gray-700 dark:text-gray-400 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="purple" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                Кам'янець подільский
                            </p>
                            <p class="mb-3 text-gray-700 dark:text-gray-400 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="purple" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                    <circle cx="12" cy="5" r="3"></circle>
                                    <line x1="12" y1="8" x2="12" y2="21"></line>
                                    <line x1="8" y1="16" x2="16" y2="16"></line>
                                </svg>
                                Хлопчик
                            </p>
                            <p class="mb-3 text-gray-700 dark:text-gray-400 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                    height="16" fill="none" stroke="purple" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="mr-2">
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

    </div>
    <!-- Pagination -->
    <div class="flex justify-end my-10">
        <div class="w-96">
            {{ $pets->links() }}
        </div>
    </div>
    <!-- EndPagination -->
    </div>
    </div>

    </div>
@endsection
