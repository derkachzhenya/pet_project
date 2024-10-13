<section>


    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mx-5">
            <div class="bg-white">
                <div class="flex justify-between pl-6 pt-6 pb-1 text-gray-900">
                    <div class="font-medium text-2xl">{{ Auth::user()->name }} {{ Auth::user()->surname }}</div>
                    <button class="underline text-violet-700" type="submit">Зберегти редагування</button>
                </div>
            </div>

            <hr class="border">

            <div class="md:w-2/3 md:grid md:grid-cols-2 md:gap-x-6">
                <div>
                    <x-input-label for="name">
                        {{ __('Ім\'я') }}<span class="text-red-500">*</span>
                    </x-input-label>
                    
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                        required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="surname">
                        {{ __('Прізвище') }}<span class="text-red-500">*</span>
                    </x-input-label>
                    <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full"
                        :value="old('surname', $user->surname)" required autofocus autocomplete="surname" />
                    <x-input-error class="mt-2" :messages="$errors->get('surname')" />
                </div>

                <div>
                    <x-input-label for="location" class="relative" style="top: 10px;">
                        {{ __('Локація') }}<span class="text-red-500">*</span>
                    </x-input-label>
                    <select id="location" :value="old('location', $user->location)"
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                           focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                           dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Оберіть локацію</option>
                    <option value="KYI">Київ</option>
                    <option value="KHR">Харків</option>
                    <option value="ODS">Одеса</option>
                    <option value="DNI">Дніпро</option>
                    <option value="LVI">Львів</option>
                    <option value="ZAP">Запоріжжя</option>
                    <option value="VIN">Вінниця</option>
                    <option value="MYK">Миколаїв</option>
                    <option value="KHM">Хмельницький</option>
                    <option value="ZHY">Житомир</option>
                </select>
                    <x-input-error class="mt-2" :messages="$errors->get('location')" />
                </div>

                <div>

                    <x-input-label for="email">
                        {{ __('Імейл') }}<span class="text-red-500">*</span>
                    </x-input-label>
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                        :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">
                                {{ __('Ваша електронна адреса не підтверджена.') }}

                                <button form="send-verification"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Натисніть тут, щоб повторно надіслати лист для підтвердження.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('Нове посилання для підтвердження було надіслано на вашу електронну адресу.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>


                <div>
                    <x-input-label for="phone">
                        {{ __('Номер телефону') }}<span class="text-red-500">*</span>
                    </x-input-label>
                    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                        :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>

                <div class="my-auto mt-6">
                 <p class="font-medium">Як з вами краще зв'язуватися?</p>
                 <div class="flex">
                    <div class="flex items-center mt-1">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-violet-600 bg-gray-100 border-gray-300 rounded focus:ring-viole-600
                         dark:focus:ring-violet-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ms-2 text-sm text-gray-900 dark:text-gray-300">Telegram</label>
                    </div>
                    <div class="flex items-center mt-1 ml-7">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-violet-600 bg-gray-100 border-gray-300 rounded focus:ring-viole-600
                         dark:focus:ring-violet-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ms-2 text-sm text-gray-900 dark:text-gray-300">Дзвінок</label>
                    </div>
                 </div>
                </div>

            </div>
        </div>

        <div class="flex items-center gap-4">

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Збережено.') }}</p>
            @endif

        </div>
    </form>

    <div x-data="{ open: false }"
    @if (session('status') === 'profile-updated') 
        x-init="open = true; setTimeout(() => open = false, 3000)" 
    @endif
    x-show="open" 
    class="fixed inset-0 flex items-center justify-center z-50 bg-gray-800 bg-opacity-50"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90">
   <div class="bg-white p-6 rounded-lg shadow-lg">
       <h2 class="text-lg font-semibold">Збережено успішно!</h2>
       <p class="mt-2 text-gray-600">Ваші зміни були успішно збережені.</p>
       <button @click="open = false" class="mt-4 bg-violet-600 text-white px-4 py-2 rounded hover:bg-violet-700">Закрити</button>
   </div>
</div>


    <div class="mt-12">
        <p class="ml-6 text-xl font-semibold">Оголошення</p>
        <div class="flex ml-8 mt-3">
            <a class="mr-5" href="">Активні({{ $activePetsCount }})</a>
            <a href="">Неактивні({{ $inactivePetsCount }})</a>
        </div>
    </div>
    <hr class="mx-5 mb-6 shadow-lg">

    <div x-data="{ showAll: false }" class="w-full mx-auto mb-14">
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
                class="md:grid md:grid-cols-2 lg:grid-cols-4 gap-x-5 gap-y-4 md:ml-4 flex flex-col items-center md:items-stretch">
                @foreach ($userPets as $index => $pet)
                    <div x-show="showAll || {{ $index }} < 4"
                        class="flex-shrink-0 w-64 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4 md:mb-0">
                        <a href="{{ route('dashboard.show', $pet->id) }}">
                            <img class="rounded-t-lg h-48 w-full object-cover" src="{{ asset('storage/' . $pet->main_image)}}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
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
                                {{ $pet->categorylocal->title }}
                            </p>
                            </p>
                            <p class="mb-3 text-gray-700 dark:text-gray-400 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="purple" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                    <circle cx="12" cy="5" r="3"></circle>
                                    <line x1="12" y1="8" x2="12" y2="21"></line>
                                    <line x1="8" y1="16" x2="16" y2="16"></line>
                                </svg>
                                {{ $pet->gender }}
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
                    <button @click="showAll = !showAll" x-text="showAll ? 'Показати менше' : 'Показати ще'"
                        class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-full">
                    </button>
                </div>
            @endif
        @endif
    </div>

</section>
