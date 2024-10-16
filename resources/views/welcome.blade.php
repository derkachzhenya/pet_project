@extends('main.index')
@section('main')
    <main>
        <div class="flex mx-auto w-full">
            <div class="w-full text-center sm:text-right pt-10 sm:pt-56">
                <span class="text-4xl sm:text-7xl font-semibold items-center">Звідси почінається найкраща дружба</span>

                <div class="flex pt-12 mx-3 sm:ml-52">
                    <form action="{{ route('catalog.index') }}" method="GET" class="flex">
                        <div class="mr-6 mt-7 relative w-44">
                            <label for="animal-types"
                                class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Вид
                                тварини</label>
                            <select id="animal-types" name="category_id"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                         focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" {{ request('category_id') ? '' : 'selected' }}>Оберіть вид тварини
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mr-6 mt-7 relative w-44">
                            <label for="location"
                                class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Локація</label>
                            <select id="location" name="categorylocal_id"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                         focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" {{ request('categorylocal_id') ? '' : 'selected' }}>Оберіть локацію
                                </option>
                                @foreach ($categorylocals as $categoryloc)
                                    <option value="{{ $categoryloc->id }}"
                                        {{ request('categorylocal_id') == $categoryloc->id ? 'selected' : '' }}>
                                        {{ $categoryloc->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="pt-7">
                            <button type="submit"
                                class="text-white bg-violet-600 hover:bg-violet-900 focus:outline-none focus:ring-4 focus:ring-violet-300 font-medium 
                    rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-violet-600 dark:hover:bg-violet-700
                     dark:focus:ring-blue-800 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Шукати
                            </button>
                        </div>
                    </form>
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
                    <span class="text-4xl font-medium mb-3 text-white">{{ $dogsCount }}</span>
                    <span class="text-lg text-white">Собак</span>
                </div>
                <div class="flex flex-col items-center justify-center ml-4 p-4">
                    <span class="text-4xl font-medium mb-3 text-white">{{ $birdsCount }}</span>
                    <span class="text-lg text-white">Птахів</span>
                </div>
                <div class="flex flex-col items-center justify-center ml-4 p-4">
                    <span class="text-4xl font-medium mb-3 text-white">{{ $catsCount }}</span>
                    <span class="text-lg text-white">Котів</span>
                </div>
                <div class="flex flex-col items-center justify-center ml-4 p-4">
                    <span class="text-4xl font-medium mb-3 text-white">{{ $rodentsCount }}</span>
                    <span class="text-lg text-white">Гризунів</span>
                </div>
                <div class="flex flex-col items-center justify-center ml-2 p-4">
                    <span class="text-4xl font-medium mb-3 text-white">{{ $reptilesCount }}</span>
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
                            <img class="rounded-t-lg h-48 w-full object-cover"
                                src="{{ asset('storage/' . $pet->main_image) }}" alt="" />

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
                            {{ $pet->categorylocal->title }}
                        </p>
                        <p class="mb-3 text-gray-700 dark:text-gray-400 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="purple" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="mr-2">
                                <circle cx="12" cy="5" r="3"></circle>
                                <line x1="12" y1="8" x2="12" y2="21"></line>
                                <line x1="8" y1="16" x2="16" y2="16"></line>
                            </svg>
                            {{ $pet->gender }}
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
                            {{ $pet->age }} {{ $pet->categoryage?->title ?? 'Не указано' }}
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

    </main>
@endsection
