<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-2">
        <div class="max-w-7x mx-auto w-5/6 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between pl-6 pt-6 pb-1 text-gray-900">
                    <div class="font-medium text-2xl">{{ Auth::user()->name }} {{ Auth::user()->surname }}</div>
                    <a href="{{ route('profile.edit') }}" class="pr-6 underline text-violet-700">Редагувати
                        профіль</a>

                </div>
                <hr class="mx-5 mb-6 shadow-lg">

                <div class="w-1/2">
                    <div class="md:flex md:justify-between ml-6 mt-8">
                        <div class="flex">
                            <p class="mb-3 text-gray-700 dark:text-gray-400 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="blue" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            <p class="font-semibold mb-3">Локація</p>
                            </p>
                        </div>
                        <div>
                           
                            <p>Київ</p>
                         
                        </div>
                    </div>
                    <div class="md:flex md:justify-between ml-6 mt-3">
                        <div class="flex">
                            <p class="mb-3 text-gray-700 dark:text-gray-400 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                    height="16" fill="none" stroke="blue" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="mr-2">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                            <p class="font-semibold mb-3">Номер телефону</p>
                            </p>
                        </div>
                        <div>
                            <p>{{ Auth::user()->phone }}</p>
                        </div>
                    </div>
                    <div class="md:flex md:justify-between ml-6 mt-3">
                        <div class="flex">
                            <p class="mb-3 text-gray-700 dark:text-gray-400 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                    height="16" fill="none" stroke="blue" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="mr-2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                    <line x1="16" y1="2" x2="16" y2="6" />
                                    <line x1="8" y1="2" x2="8" y2="6" />
                                    <line x1="3" y1="10" x2="21" y2="10" />
                                </svg>
                            <p class="font-semibold mb-3">Імейл</p>
                            </p>
                        </div>
                        <div>
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="mt-12">
                    <p class="ml-6 text-xl font-semibold">Оголошення</p>
                    <div class="flex ml-8 mt-3">
                        <a class="mr-5" href="">Активні(0)</a>
                        <a href="">Неактивні(0)</a>
                    </div>
                </div>
                <hr class="mx-5 mb-6 shadow-lg">


                <div x-data="{ showAll: false }" class="w-5/6 mx-auto mb-14">
                    @php
                        $userPets = $pets->filter(function ($pet) {
                            return Auth::check() && Auth::id() === $pet->user_id;
                        });
                    @endphp

                    @if ($userPets->isEmpty())
                        <div class="flex flex-col items-center justify-center">
                            <img class="h-32 w-32" src="noneImages.jpg" alt="No images">
                            <p class="text-center mt-4">У Вас ще не має активних оголошень</p>
                        </div>
                    @else
                        <div
                            class="md:grid md:grid-cols-2 lg:grid-cols-4 gap-x-16 gap-y-4 flex flex-col items-center md:items-stretch">
                            @foreach ($userPets as $index => $pet)
                                <div x-show="showAll || {{ $index }} < 4"
                                    class="flex-shrink-0 w-64 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4 md:mb-0">
                                    <a href="{{ route('dashboard.show', $pet->id) }}">
                                        <img class="rounded-t-lg h-48 w-full object-cover" src="{{ asset('storage/' . $pet->main_image)}}"
                                            alt="" />
                                    </a>
                                    <div class="p-5">
                                        <a href="#">
                                            <h5
                                                class="mb-2 text-xl font-medium tracking-tight text-gray-900 dark:text-white">
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
                                            {{ $pet->categorylocal->title }}
                                        </p>
                                        <p class="mb-3 text-gray-700 dark:text-gray-400 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="purple" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                                <circle cx="12" cy="5" r="3"></circle>
                                                <line x1="12" y1="8" x2="12" y2="21">
                                                </line>
                                                <line x1="8" y1="16" x2="16" y2="16">
                                                </line>
                                            </svg>
                                            {{ $pet->gender }}
                                        </p>
                                        <p class="mb-3 text-gray-700 dark:text-gray-400 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                width="16" height="16" fill="none" stroke="purple"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="mr-2">
                                                <rect x="3" y="4" width="18" height="18" rx="2"
                                                    ry="2" />
                                                <line x1="16" y1="2" x2="16" y2="6" />
                                                <line x1="8" y1="2" x2="8" y2="6" />
                                                <line x1="3" y1="10" x2="21" y2="10" />
                                            </svg>
                                            {{ $pet->age }} {{ $pet->categoryage->title }}
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


                        @if ($userPets->count() > 4)
                            <div class="flex justify-center mt-6">
                                <button @click="showAll = !showAll"
                                    x-text="showAll ? 'Показати менше' : 'Показати ще'"
                                    class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-full">
                                </button>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
</x-app-layout>
