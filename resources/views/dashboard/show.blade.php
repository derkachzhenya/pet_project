@extends('main.index')
@section('main')
    <div class="w-5/6 mx-auto min-h-screen">
        <div class="container md:flex px-4 py-8">
            <div class="">
                <div class="grid gap-4">
                    <div class="w-2/3 md:w-full mx-auto">
                        <img class="h-auto max-w-full rounded-lg cursor-pointer"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt=""
                            onclick="openModal(this.src)">
                    </div>
                    <div class="grid grid-cols-5 gap-4 w-2/3 md:w-full mx-auto">
                        @foreach (['image-1.jpg', 'image-2.jpg', 'image-3.jpg', 'image-4.jpg', 'image-5.jpg'] as $image)
                            <div>
                                <img class="h-auto max-w-full rounded-lg cursor-pointer"
                                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/{{ $image }}"
                                    alt="" onclick="openModal(this.src)">
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-12 mt-8 mx-auto md:mx-0">
                        <p class="font-semibold">Додаткова інформація</p>
                        <p class="mt-2">{{ $pet->description }}</p>
                    </div>
                </div>
            </div>
            <div class="w-3/4 mx-auto md:mx-0">
                <p class="ml-5 text-3xl font-semibold">{{ $pet->title }}</p>
                <p class="ml-5 mt-3 text-2xl font-semibold">
                    @if ($pet->price == 0)
                        <span>Безкоштовно</span>
                    @else
                        <span>₴ {{ $pet->price }} </span>
                    @endif
                </p>
                <p class="ml-5 mt-10 font-semibold">Контакти</p>
                <div class="flex ml-5 mt-2 justify-between">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-violet-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <p class="pl-1">Контактна особа</p>
                    </div>
                    <p>{{ $pet->user->name }}</p>
                </div>
                <hr class="ml-5 mt-3 mb-3">
                <div class="md:flex ml-5 mt-2 justify-between">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-violet-600" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                            </path>
                        </svg>
                        <p class="pl-1">Номер телефону</p>
                    </div>
                    <div class="flex mt-2 md:mt-0">
                        <p class="pr-1">{{ $pet->user->phone }}</p>
                        <img src="{{ asset('telegram.png') }}" class="h-5 w-5 my-auto" alt="">
                    </div>
                </div>
                <hr class="ml-5 mt-3 mb-3">

                <p class="ml-5 mt-10 font-semibold">Характеристики</p>
                <div class="flex ml-5 mt-2 justify-between">
                    <div class="flex">
                        <img class="h-4 w-4 my-auto" src="{{ asset('vectors/paw.png') }}" alt="paw">
                        <p class="pl-1">Вид</p>
                    </div>
                    <p>Собака</p>
                </div>
                <hr class="ml-5 mt-3 mb-3">
                <div class="flex ml-5 mt-2 justify-between">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-violet-600 my-auto" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z" />
                            <line x1="7" y1="7" x2="7.01" y2="7" />
                        </svg>
                        <p class="pl-1">Різновид</p>
                    </div>
                    <p class="pr-1">{{ $pet->categoryvariety->title }}</p>
                </div>
                <hr class="ml-5 mt-3 mb-3">
                <div class="flex ml-5 mt-2 justify-between">
                    <div class="flex">
                        <img class="h-4 w-3 my-auto" src="{{ asset('vectors/vector.png') }}" alt="vector">
                        <p class="pl-1">Стать</p>
                    </div>
                    <p class="pr-1">{{ $pet->gender }}</p>
                </div>
                <hr class="ml-5 mt-3 mb-3">
                <div class="flex ml-5 mt-2 justify-between">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-violet-600 my-auto" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="mr-2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                        <p class="pl-1">Вік</p>
                    </div>
                    <p class="pr-1">{{ $pet->age }} {{ $pet->categoryage->title }}</p>
                </div>
                <hr class="ml-5 mt-3 mb-3">
                <div class="flex ml-5 mt-2 justify-between">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-violet-600" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z" />
                        </svg>
                        <p class="pl-1">Забарвлення</p>
                    </div>
                    <p class="pr-1">{{ $pet->categorycolor->title }}</p>
                </div>
                <hr class="ml-5 mt-3 mb-3">
                <div class="flex ml-5 mt-2 justify-between">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-violet-600" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="mr-2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <p class="pl-1">Локація</p>
                    </div>
                    <p class="pr-1">{{ $pet->categorylocal->title }}</p>
                </div>
                <hr class="ml-5 mt-3 mb-3">
                <div class="md:flex ml-5 mt-2 justify-between">
                    <div class="flex">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-violet-600" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                <polyline points="9 22 9 12 15 12 15 22" />
                            </svg>
                            <p class="pl-1">Походження</p>
                        </div>
                    </div>
                    <p class="pr-1 mt-2 md:mt-0">{{ $pet->hiking }}</p>
                </div>
                <hr class="ml-5 mt-3 mb-3">

                <div class="ml-5 md:w-96 mt-2 justify-between">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-violet-600" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        </svg>
                        <p class="pl-1">Здоров'я</p>
                    </div>
                    <div class="md:flex mt-3">
                        @if ($pet->sterilization == 1)
                            <div class="mr-2  md:mt-0">
                                <label for="sterilization"
                                    class="flex items-center justify-center w-full px-3 h-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="text-center">
                                        <div class="w-full">Стерилізація</div>
                                    </div>
                                </label>
                            </div>
                        @else
                        @endif

                        @if ($pet->vaccination == 1)
                            <div class="mr-2 mt-2 md:mt-0">
                                <label for="vacination"
                                    class="flex items-center justify-center w-full px-3 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="text-center">
                                        <div class="w-full">Вакцинація</div>
                                    </div>
                                </label>
                            </div>
                        @else
                        @endif

                        @if ($pet->chip == 1)
                            <div class="mr-2 mt-2 md:mt-0">
                                <label for="chip"
                                    class="flex items-center justify-center w-full px-3 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="text-center">
                                        <div class="w-full">Чіп</div>
                                    </div>
                                </label>
                            </div>
                        @else
                        @endif

                        @if ($pet->processing == 1)
                            <div class="mr-2 mt-2 md:mt-0">
                                <label for="option"
                                    class="flex items-center justify-center w-full px-3 min-w-max bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="text-center break-words">
                                        Обробка від паразитів
                                    </div>
                                </label>
                            </div>
                        @else
                        @endif
                    </div>
                </div>
                <hr class="ml-5 mt-3 mb-3">

                <div class=" ml-5 mt-2 justify-between">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-violet-600" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                            <polyline points="14 2 14 8 20 8" />
                            <line x1="16" y1="13" x2="8" y2="13" />
                            <line x1="16" y1="17" x2="8" y2="17" />
                            <polyline points="10 9 9 9 8 9" />
                        </svg>
                        <p class="pl-1">Документи</p>
                    </div>
                    <div class="md:flex mt-3">
                        @if ($pet->vet_pasport == 1)
                            <div class="mr-2 mt-2 md:mt-0">
                                <label for="pasport"
                                    class="flex items-center justify-center w-full px-3 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="text-center">
                                        <div class="w-full">Вет паспорт</div>
                                    </div>
                                </label>
                            </div>
                        @else
                        @endif

                        @if ($pet->pedigree == 1)
                            <div class="mr-2 mt-2 md:mt-0">
                                <label for="pedigree"
                                    class="flex items-center justify-center w-full px-3 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="text-center">
                                        <div class="w-full">Родовід</div>
                                    </div>
                                </label>
                            </div>
                        @else
                        @endif

                        @if ($pet->fci == 1)
                            <div class="mr-2 mt-2 md:mt-0">
                                <label for="FCI/KCY"
                                    class="flex items-center justify-center w-full px-3 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="text-center">
                                        <div class="w-full">FCI/KCY</div>
                                    </div>
                                </label>
                            </div>
                        @else
                        @endif

                        @if ($pet->metrics == 1)
                            <div class="mr-2 mt-2 md:mt-0">
                                <label for="metrics"
                                    class="flex items-center justify-center w-full min-w-max px-3 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="text-center break-words">
                                        Метрика цуценяти
                                    </div>
                                </label>
                            </div>
                        @else
                        @endif
                    </div>
                </div>
                <hr class="ml-5 mt-3 mb-3">
                <div class="flex pl-24">
                    <a href="{{ route('pet.create.step.three') }}"
                        class="text-violet-800 mt-6 bg-white focus:outline-none focus:ring-4
                               focus:ring-gray-300 font-medium rounded-full text-sm px-14 py-2.5 me-2 mb-2 border-2
                               border-violet-800 w-full text-center">Деактивувати</a>
                    <a href="{{ route('dashboard.edit', $pet->id) }}"
                        class="text-white mt-6 bg-violet-800 hover:bg-violet-900 focus:outline-none focus:ring-4
                               focus:ring-gray-300 font-medium rounded-full text-sm px-14 py-2.5 mb-2
                               w-full text-center">Редагувати</a>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="relative">
                <img id="modalImage" src="" alt="" class="max-h-screen max-w-screen-lg">
                <button onclick="closeModal()"
                    class="absolute top-4 right-4 text-white bg-black bg-opacity-50 rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

    </div>

    <script>
        function openModal(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }
    </script>
@endsection
