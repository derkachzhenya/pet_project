<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6 text-gray-900">
                    <div class="font-medium text-2xl">{{ Auth::user()->name }} {{ Auth::user()->surname }}</div>
                    <a href="{{ route('profile.edit') }}" class="" style="text-decoration: underline;">Редагувати
                        профіль</a>

                </div>
                <hr class="mx-5 mb-6 shadow-lg">

                <div class="w-1/2">
                    <div class="flex justify-between ml-6 mt-12">
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
                            <p>Камянець подільський</p>
                        </div>
                    </div>
                    <div class="flex justify-between ml-6 mt-3">
                        <div class="flex">
                            <p class="mb-3 text-gray-700 dark:text-gray-400 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                    height="16" fill="none" stroke="blue" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="mr-2">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                            <p class="font-semibold mb-3">Телефон</p>
                            </p>
                        </div>
                        <div>
                            <p>+38 (000) 000-00-00</p>
                        </div>
                    </div>
                    <div class="flex justify-between ml-6 mt-3">
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
                            <p class="font-semibold mb-3">Електронна пошта</p>
                            </p>
                        </div>
                        <div>
                            <p>derkachyevhen@gmail.com</p>
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
                <div class="5/6 mx-auto mb-14">
                    @if ($pets->isEmpty())
                        <div class="flex justify-center items-center">
                            <img class="mx-auto h-32 w-32" src="noneImages.jpg" alt="noneImage">
                        </div>
                        <p class="text-center">У Вас ще не має активних оголошень</p>
                    @else
                        @foreach ($pets as $pet)
                            @if (Auth::check() && Auth::id() === $pet->user_id)
                                <div class="mb-4 p-4 border rounded">
                                    <p class="text-lg text-gray-900">Ціна: {{ $pet->price }}</p>
                                    {{-- <p>Власник: {{ $pet->user->name }}</p> --}}
                                    <!-- Додайте інші деталі оголошення, які ви хочете показати -->
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
</x-app-layout>
