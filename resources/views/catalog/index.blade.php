@extends('main.index')
@section('main')
    <div class="w-full md:w-5/6 px-4 mx-auto">
        <div class="flex justify-between mt-12">
            <p class="font-semibold text-xl">Фільтри</p>


            <div class="flex">
                <select id="sortSelect"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg mb-5 w-48 focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>Сортувати за</option>
                    <option value="newest">Найновіші</option>
                    <option value="priceLowToHigh">Від дешевих до дорогих</option>
                    <option value="priceHighToLow">Від дорогих до дешевих</option>
                </select>
                <div class="pl-4 pt-3">
                    <button id="gridView" class="focus:outline-none">
                        <img src="{{ asset('search/colblue.png') }}" alt="Grid View">
                    </button>
                </div>
                <div class="pl-3 pt-3">
                    <button id="listView" class="focus:outline-none">
                        <img class="h-5" src="{{ asset('search/rowgray.png') }}" alt="List View">
                    </button>
                </div>
            </div>

        </div>
        <div class="flex justify-between">
            <div class="w-1/4">
                <form action="{{ route('catalog.index') }}" method="GET">
                    <div class="relative w-40 md:w-full">
                        <label for="countries "
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Вид
                            тварин</label>
                        <select id="countries" name="category_id"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                         focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" {{ old('category_id') ? '' : 'selected' }}>Оберіть вид тварини
                            </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-5 relative w-40 md:w-full">
                        <label for="countries"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Різновид</label>
                        <select id="countries" name="categoryvariety_id"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                         focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" {{ old('categoryvariety_id') == '' ? 'selected' : '' }}>Оберіть
                                різновид</option>
                            @foreach ($categoryvarieties as $categoryvariety)
                                <option value="{{ $categoryvariety->id }}"
                                    {{ old('categoryvariety_id') == $categoryvariety->id ? 'selected' : '' }}>
                                    {{ $categoryvariety->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-5 relative w-40 md:w-full">
                        <label for="countries"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Локації</label>
                        <select id="countries" name="categorylocal_id"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                         focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" {{ old('categorylocal_id') ? '' : 'selected' }}>Оберіть локацію
                            </option>
                            @foreach ($categorylocals as $categoryloc)
                                <option value="{{ $categoryloc->id }}"
                                    {{ old('categorylocal_id') == $categoryloc->id ? 'selected' : '' }}>
                                    {{ $categoryloc->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-5 relative w-40 md:w-full">
                        <label for="countries"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Походження</label>
                        <select id="countries"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                         focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Оберіть походження</option>
                            <option value="US">Приватний власник</option>
                            <option value="CA">Розплідник</option>
                        </select>
                    </div>
                    <div class="mt-6">
                        <p class="text-lg">Вік</p>
                        <div class="flex mt-3 relative gap-3">
                            <label for="min_age"
                                class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Мін</label>
                            <input type="text" id="min_age" name="min_age"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                 focus:border-blue-500 block w-16 md:w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Мінімальний вік" />
                            <select id="min_age_period" name="min_age_period"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                 focus:border-blue-500 block w-24 md:w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                  dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Період</option>
                                <option value="days">Днів</option>
                                <option value="weeks">Тижнів</option>
                                <option value="months">Місяців</option>
                                <option value="years">Років</option>
                            </select>
                        </div>
                        <div>
                            <div class="flex mt-5 relative gap-3">
                                <label for="max_age"
                                    class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Макс</label>
                                <input type="text" id="max_age" name="max_age"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                     focus:border-blue-500 block w-16 md:w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                      dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Максимальний вік" />
                                <select id="max_age_period" name="max_age_period"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                     focus:border-blue-500 block w-24 md:w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                      dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Період</option>
                                    <option value="days">Днів</option>
                                    <option value="weeks">Тижнів</option>
                                    <option value="months">Місяців</option>
                                    <option value="years">Років</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <p class="text-lg">Ціна</p>
                        <div class="flex mt-3 gap-3">
                            <input type="number" id="min_price" name="min_price"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                 focus:border-blue-500 block w-20 md:w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="₴ 0" min="0" value="{{ request('min_price') }}" />

                            <input type="number" id="max_price" name="max_price"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                 focus:border-blue-500 block w-20 md:w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-900
                                   dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="₴ 10000" min="0" value="{{ request('max_price') }}" />
                        </div>
                        <div>
                            <div class="flex mt-1 relative gap-3">
                                <div class="flex items-center mb-4">
                                    <input id="free" name="free" type="checkbox" value="1"
                                        {{ request('free') ? 'checked' : '' }}
                                        class="w-4 h-4 text-violet-600 bg-gray-100 border-gray-300 rounded focus:ring-violet-500 dark:focus:ring-violet-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="free"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Безкоштовно</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-lg">Стать</p>
                        <div class="mt-3">
                            <div class="flex items-center mb-4">
                                <input id="gender-female" type="radio" value="female" name="gender"
                                    class="w-4 h-4 text-violet-600 bg-gray-100 border-gray-300 focus:ring-violet-500 dark:focus:ring-violet-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    {{ request('gender') == 'female' ? 'checked' : '' }}>
                                <label for="gender-female"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Дівчинка</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="gender-male" type="radio" value="male" name="gender"
                                    class="w-4 h-4 text-violet-600 bg-gray-100 border-gray-300 focus:ring-violet-500 dark:focus:ring-violet-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    {{ request('gender') == 'male' ? 'checked' : '' }}>
                                <label for="gender-male"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Хлопчик</label>
                            </div>
                            <div class="flex items-center">
                                <input id="gender-unknown" type="radio" value="unknown" name="gender"
                                    class="w-4 h-4 text-violet-600 bg-gray-100 border-gray-300 focus:ring-violet-500 dark:focus:ring-violet-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    {{ request('gender') == 'unknown' || request('gender') == null ? 'checked' : '' }}>
                                <label for="gender-unknown"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Невідомо</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8">
                        <p class="text-lg">Здоров'я</p>
                        <div class="mt-3">
                            <ul class="grid w-full gap-2 mt-3 md:grid-cols-3">
                                <li>
                                    <input type="checkbox" id="sterilization" name="sterilization" value="1"
                                        class="hidden peer" {{ request('sterilization') ? 'checked' : '' }}>
                                    <label for="sterilization"
                                        class="flex items-center justify-center w-full h-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="text-center">
                                            <div class="w-full">Стерилізація</div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="vaccination" name="vaccination" value="1"
                                        class="hidden peer" {{ request('vaccination') ? 'checked' : '' }}>
                                    <label for="vaccination"
                                        class="flex items-center justify-center w-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="text-center">
                                            <div class="w-full">Вакцинація</div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="chip" name="chip" value="1"
                                        class="hidden peer" {{ request('chip') ? 'checked' : '' }}>
                                    <label for="chip"
                                        class="flex items-center justify-center w-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="text-center">
                                            <div class="w-full">Чіп</div>
                                        </div>
                                    </label>
                                </li>
                                <li class="w-full">
                                    <input type="checkbox" id="parasite_treatment" name="parasite_treatment"
                                        value="1" class="hidden peer"
                                        {{ request('parasite_treatment') ? 'checked' : '' }}>
                                    <label for="parasite_treatment"
                                        class="flex items-center justify-center w-full min-w-max px-1 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="text-center break-words">
                                            Обробка від паразитів
                                        </div>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-8">
                        <p class="text-lg">Документи</p>
                        <div class="mt-3">
                            <ul class="grid w-full gap-2 mt-3 md:grid-cols-3">
                                <li>
                                    <input type="checkbox" id="fci" name="fci" value="1"
                                        class="hidden peer" {{ request('fci') ? 'checked' : '' }}>
                                    <label for="fci"
                                        class="flex items-center justify-center w-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="text-center">
                                            <div class="w-full">FCI/KCY</div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="vet_pasport" name="vet_pasport" value="1"
                                        class="hidden peer" {{ request('vet_pasport') ? 'checked' : '' }}>
                                    <label for="vet_pasport"
                                        class="flex items-center justify-center w-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="text-center">
                                            <div class="w-full">Вет паспорт</div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input type="checkbox" id="pedigree" name="pedigree" value="1"
                                        class="hidden peer" {{ request('pedigree') ? 'checked' : '' }}>
                                    <label for="pedigree"
                                        class="flex items-center justify-center w-full h-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="text-center">
                                            <div class="w-full">Родовід</div>
                                        </div>
                                    </label>
                                </li>
                                <li class="w-full">
                                    <input type="checkbox" id="metrics" name="metrics" value="1"
                                        class="hidden peer" {{ request('metrics') ? 'checked' : '' }}>
                                    <label for="metrics"
                                        class="flex items-center justify-center w-full min-w-max px-1 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="text-center break-words">
                                            Метрика цуценяти
                                        </div>
                                    </label>
                                </li>
                            </ul>
                            <div class="flex flex-col items-center">
                                <button type="submit"
                                    class="flex items-center justify-center ml-16 md:ml-0 w-48 md:w-64 text-white mt-6 bg-violet-800 hover:bg-violet-900 focus:outline-none focus:ring-4
                                           focus:ring-gray-300 font-medium rounded-full text-sm px-4 py-2.5 mb-2">
                                    <img class="mr-2" src="{{ asset('search/button.png') }}" alt="buttonImg">
                                    <span>Застосувати фільтри</span>
                                </button>

                                <a href="{{ route('catalog.index') }}"
                                    class="flex items-center justify-center ml-16 md:ml-0 w-48 md:w-64 mt-2 bg-white focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-4 py-2.5 mb-2 border-2 border-gray-600 text-center">
                                    <img class="mr-2 h-3" src="{{ asset('search/close.png') }}" alt="buttonImg">
                                    <span>Очистити фільтри</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>


            <div id="petsContainer" class="w-60 md:w-3/4">
                <div class="md:grid md:grid-cols-3 md:gap-4 ml-5">
                    @foreach ($pets as $pet)
                        <div class="pet-card bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4 transition-all duration-300"
                            data-date-added="{{ $pet->created_at->toISOString() }}">
                            <a href="{{ route('pets.show', $pet->id) }}">
                                <img class="rounded-t-lg h-48 w-full object-cover"
                                    src="{{ asset('storage/' . $pet->main_image) }}" alt="" />
                            </a>
                            <div class="">
                                <a href="{{ route('pets.show', $pet->id) }}">
                                    <h5
                                        class="mb-2 pl-5 pr-5 pt-3 text-xl font-medium tracking-tight text-gray-900 dark:text-white">
                                        {{ $pet->title }}
                                    </h5>
                                </a>
                                <p class="mb-3 pl-5 text-gray-700 dark:text-gray-400 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="purple" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    {{ $pet->categorylocal->title }}
                                </p>
                                <p class="mb-3 pl-5 text-gray-700 dark:text-gray-400 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="purple" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                        <circle cx="12" cy="5" r="3"></circle>
                                        <line x1="12" y1="8" x2="12" y2="21"></line>
                                        <line x1="8" y1="16" x2="16" y2="16"></line>
                                    </svg>
                                    {{ $pet->gender }}
                                </p>
                                <p class="mb-3 pl-5 text-gray-700 dark:text-gray-400 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                        height="16" fill="none" stroke="purple" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                        <line x1="16" y1="2" x2="16" y2="6" />
                                        <line x1="8" y1="2" x2="8" y2="6" />
                                        <line x1="3" y1="10" x2="21" y2="10" />
                                    </svg>
                                    {{ $pet->age }} {{ $pet->categoryage->title ?? 'Не указано' }}
                                </p>

                                <p class="font-bold text-right text-xl">
                                    @if ($pet->price == 0)
                                        <span>Безкоштовно</span>
                                    @else
                                        <span>₴ {{ $pet->price }} </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        <!-- Pagination -->
        <div class="flex justify-center ml-28 my-10">
            <div class="w-96">
                {{ $pets->links() }}
            </div>
        </div>
        <!-- EndPagination -->
    </div>
    </div>

    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const gridViewBtn = document.getElementById('gridView');
            const listViewBtn = document.getElementById('listView');
            const petsContainer = document.getElementById('petsContainer');
            const petCards = document.querySelectorAll('.pet-card');
            let currentView = 'grid';

            gridViewBtn.addEventListener('click', function(e) {
                e.preventDefault();
                setGridView();
                currentView = 'grid';
            });

            listViewBtn.addEventListener('click', function(e) {
                e.preventDefault();
                setListView();
                currentView = 'list';
            });

            function setGridView() {
                petsContainer.firstElementChild.classList.remove('flex', 'flex-col');
                petsContainer.firstElementChild.classList.add('md:grid', 'md:grid-cols-3', 'md:gap-4');
                petCards.forEach(card => {
                    card.classList.remove('flex', 'flex-row');
                    card.firstElementChild.classList.remove('flex-row');
                    card.firstElementChild.classList.add('flex-col');
                    card.querySelector('img').classList.remove('md:rounded-l-lg', 'md:rounded-t-none');
                    card.querySelector('img').classList.add('rounded-t-lg');
                    card.querySelector('img').style.width = '';
                });
            }

            function setListView() {
                petsContainer.firstElementChild.classList.remove('md:grid', 'md:grid-cols-3', 'md:gap-4');
                petsContainer.firstElementChild.classList.add('flex', 'flex-col');
                petCards.forEach(card => {
                    card.classList.add('flex', 'flex-row');
                    card.firstElementChild.classList.remove('flex-col');
                    card.firstElementChild.classList.add('flex-row');
                    let img = card.querySelector('img');
                    img.classList.remove('rounded-t-lg');
                    img.classList.add('md:rounded-l-lg');
                    img.style.width = '300px';
                });
            }

            function getPetData() {
                const petCards = document.querySelectorAll('.pet-card');
                return Array.from(petCards).map(card => {
                    const title = card.querySelector('h5').textContent.trim();
                    const priceEl = card.querySelector('.font-bold');
                    const price = priceEl.textContent.includes('Безкоштовно') ? 0 : parseFloat(priceEl
                        .textContent.replace('₴', '').trim());
                    const dateAdded = new Date(card.dataset.dateAdded);

                    return {
                        element: card,
                        title,
                        price,
                        dateAdded
                    };
                });
            }

            function sortPets(sortBy) {
                const container = petsContainer.firstElementChild;
                const pets = getPetData();

                switch (sortBy) {
                    case 'newest':
                        pets.sort((a, b) => b.dateAdded - a.dateAdded);
                        break;
                    case 'priceLowToHigh':
                        pets.sort((a, b) => a.price - b.price);
                        break;
                    case 'priceHighToLow':
                        pets.sort((a, b) => b.price - a.price);
                        break;
                    default:
                        return;
                }

                container.innerHTML = '';
                pets.forEach(pet => container.appendChild(pet.element));

                if (currentView === 'grid') {
                    setGridView();
                } else {
                    setListView();
                }
            }

            document.getElementById('sortSelect').addEventListener('change', function() {
                sortPets(this.value);
            });
        });
    </script>
@endsection
