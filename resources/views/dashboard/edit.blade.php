@extends('main.index')
@section('main')
    <form action="{{ route('dashboard.update', $pet) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="w-5/6 mx-auto min-h-screen">
            <div class="container md:flex px-4 py-8">
                <div class="">
                    <div class="grid gap-4">
                        <div class="w-2/3 md:w-full mx-auto">
                            <img class="h-auto max-w-full rounded-lg cursor-pointer"
                                src="{{ asset('storage/' . $pet->main_image)}}" alt="Main pet image"
                                onclick="openModal(this.src)">
                        </div>
                        <div class="grid grid-cols-4 gap-4 w-2/3 md:w-full mx-auto mt-4">
                            @php
                            // Массив с ключами полей, где хранятся изображения
                            $images = ['image_one', 'image_two', 'image_three', 'image_four'];
                        @endphp

                        @foreach ($images as $imageField)
                            @if (!empty($pet->$imageField))
                                <div>
                                    <img class="h-28 max-w-full rounded-lg cursor-pointer"
                                        src="{{ asset('storage/' . $pet->$imageField) }}"
                                        alt="Pet image {{ $loop->iteration }}" onclick="openModal(this.src)">
                                </div>
                            @endif
                        @endforeach
                        </div>
                        <div class="relative w-full mt-8">
                            <label for="description"
                                class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3 z-10 px-1">
                                Додаткова інформація<span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <textarea id="description" name="description" maxlength="300" style="height: 140px;"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    oninput="updateCounter('descriptionCounter')">{{ old('description', $pet->description ?? '') }}</textarea>
                                <div id="descriptionCounter"
                                    class="absolute bottom-2 right-2 text-xs text-gray-500 dark:text-gray-400 pointer-events-none">
                                    {{ strlen(old('description', $pet->description ?? '')) }}/300
                                </div>
                                @error('description')
                                    <div class="alert alert-danger text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full mdw-3/4 mx-auto mt-8 md:mt-0 md:mx-0">
                    <div class="relative w-full md:ml-5 mt-1">
                        <label for="title"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3 px-1 z-10">
                            Назва оголошення<span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <textarea id="title" maxlength="50" name="title"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-16 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                oninput="updateCounter('titleCounter')">{{ old('title', $pet->title ?? '') }}</textarea>
                            <div id="titleCounter"
                                class="absolute bottom-2 right-2 text-xs text-gray-500 dark:text-gray-400 pointer-events-none">
                                {{ strlen(old('title', $pet->title ?? '')) }}/50
                            </div>
                        </div>
                        @error('title')
                            <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative w-full md:mt-8 mt-4 md:ml-5">
                        <label for="price"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Ціна<span
                                class="text-red-500">*</span></label>
                        <input id="price" name="price" value="{{ old('price', $pet->price) }}"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                     focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                      dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('price')
                            <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror

                        <div class="flex items-center mb-4 mt-3">
                            <input id="default-checkbox" type="checkbox" name="checkbox" value="1"
                                {{ old('checkbox') ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Безкоштовно</label>
                        </div>
                    </div>

                    <p class="md:ml-5 mt-10 font-semibold">Характеристики</p>

                    <div class="relative w-full mt-5 md:ml-5">
                        <label for="category"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">
                            Вид тварин<span class="text-red-500">*</span>
                        </label>
                        <select id="category" name="category_id"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
         focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" {{ old('category_id', $pet->category_id) ? '' : 'selected' }} disabled>
                                Оберіть тварину</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $pet->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative w-full mt-6 md:ml-5">
                        <label for="categoryvariety"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Різновид<span
                                class="text-red-500">*</span></label>
                        <select id="categoryvariety" name="categoryvariety_id"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                            focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value=""
                                {{ old('categoryvariety_id', $pet->categoryvariety_id) ? '' : 'selected' }} disabled>
                                Оберіть
                                породу</option>
                            @foreach ($categoryvarieties as $categoryvariety)
                                <option value="{{ $categoryvariety->id }}"
                                    {{ old('categoryvariety_id', $pet->categoryvariety_id) == $categoryvariety->id ? 'selected' : '' }}>
                                    {{ $categoryvariety->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoryvariety_id')
                            <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <p class="mt-5 md:ml-5">Стать<span class="text-red-500">*</span></p>
                    <div class="md:flex md:justify-between md:ml-5 md:w-2/3">
                        <div class="flex items-center mb-4 mt-3">
                            <input id="default-radio-1" type="radio" value="Дівчинка" name="gender"
                                {{ old('gender', $pet->gender) == 'Дівчинка' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-1"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Дівчинка</label>
                        </div>

                        <div class="flex items-center mb-4 mt-3">
                            <input id="default-radio-2" type="radio" value="Хлопчик" name="gender"
                                {{ old('gender', $pet->gender) == 'Хлопчик' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-2"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Хлопчик</label>
                        </div>

                        <div class="flex items-center mb-1">
                            <input id="default-radio-3" type="radio" value="Невідомо" name="gender"
                                {{ old('gender', $pet->gender) == 'Невідомо' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-3"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Невідомо</label>
                        </div>
                    </div>


                    <div class="flex w-full gap-3 md:ml-5">
                        <div class="relative w-full mt-4">
                            <label for="age"
                                class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">
                                Вік<span class="text-red-500">*</span>
                            </label>
                            <input type="number" id="age" name="age" value="{{ old('age', $pet->age) }}"
                                min="0" max="100"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                                dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                            @error('age')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-2/5 mt-4">
                            <label for="categoryage" class="sr-only">Період</label>
                            <select id="categoryage" name="categoryage_id"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                                dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" {{ old('categoryage_id', $pet->categoryage_id) ? '' : 'selected' }}
                                    disabled>Період</option>
                                @foreach ($categoryages as $categoryage)
                                    <option value="{{ $categoryage->id }}"
                                        {{ old('categoryage_id', $pet->categoryage_id) == $categoryage->id ? 'selected' : '' }}>
                                        {{ $categoryage->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categoryage_id')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="relative w-full mt-8 md:ml-5">
                        <label for="categorycolor"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">
                            Забарвлення<span class="text-red-500">*</span>
                        </label>
                        <select id="categorycolor" name="categorycolor_id"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                            focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" {{ old('categorycolor_id', $pet->categorycolor_id) ? '' : 'selected' }}
                                disabled>Оберіть
                                забарвлення</option>
                            @foreach ($categorycolors as $categorycolor)
                                <option value="{{ $categorycolor->id }}"
                                    {{ old('categorycolor_id', $pet->categorycolor_id) == $categorycolor->id ? 'selected' : '' }}>
                                    {{ $categorycolor->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('categorycolor_id')
                            <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <p class="mt-5 md:ml-5">Походження тварини<span class="text-red-500">*</span></p>

                    <div class="flex items-center mb-4 mt-3 md:ml-5">
                        <input id="default-radio-1" type="radio" value="Представник притулку" name="hiking"
                            {{ old('hiking', $pet->hiking) == 'Представник притулку' ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Я
                            представник притулку</label>
                    </div>

                    <div class="flex items-center mb-4 mt-3 md:ml-5">
                        <input id="default-radio-2" type="radio" value="Власник розплідника" name="hiking"
                            {{ old('hiking', $pet->hiking) == 'Власник розплідника' ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Я
                            власник розплідника</label>
                    </div>

                    <div class="flex items-center md:ml-5">
                        <input id="default-radio-3" type="radio" value="Приватний власник" name="hiking"
                            {{ old('hiking', $pet->hiking) == 'Приватний власник' ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Я
                            приватна особа</label>
                    </div>

                    @error('hiking')
                        <div class="alert alert-danger text-red-600">{{ $message }}</div>
                    @enderror

                    <div class="relative w-full mt-8 md:ml-5">
                        <label for="categorylocal"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">
                            Локація<span class="text-red-500">*</span>
                        </label>
                        <select id="categorylocal" name="categorylocal_id"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                            focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" {{ old('categorylocal_id', $pet->categorylocal_id) ? '' : 'selected' }}
                                disabled>Оберіть локацію</option>
                            @foreach ($categorylocals as $categoryloc)
                                <option value="{{ $categoryloc->id }}"
                                    {{ old('categorylocal_id', $pet->categorylocal_id) == $categoryloc->id ? 'selected' : '' }}>
                                    {{ $categoryloc->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('categorylocal_id')
                            <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>


                    <p class="mt-5 md:ml-5">Здоров'я</p>
                    <ul class="grid w-full gap-2 mt-3 md:grid-cols-3 md:ml-5">
                        <li>
                            <input type="checkbox" id="chip" name="chip" value="1" class="hidden peer" {{ old('chip', $pet->chip) == 1 ? 'checked' : '' }}>
                            <label for="chip"
                                class="flex items-center justify-center w-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 {{ old('chip', $pet->chip) == 1 ? 'border-violet-700 text-gray-600 dark:text-gray-500' : '' }} peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">Чіп</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="sterilization" name="sterilization" value="1" class="hidden peer" {{ old('sterilization', $pet->sterilization) == 1 ? 'checked' : '' }}>
                            <label for="sterilization"
                                class="flex items-center justify-center w-full h-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 {{ old('sterilization', $pet->sterilization) == 1 ? 'border-violet-700 text-gray-600 dark:text-gray-500' : '' }} peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">Стерилізація</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="vacination" name="vaccination" value="1" class="hidden peer" {{ old('vaccination', $pet->vaccination) == 1 ? 'checked' : '' }}>
                            <label for="vacination"
                                class="flex items-center justify-center w-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 {{ old('vaccination', $pet->vaccination) == 1 ? 'border-violet-700 text-gray-600 dark:text-gray-500' : '' }} peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">Вакцинація</div>
                                </div>
                            </label>
                        </li>
                        <li class="w-full">
                            <input type="checkbox" id="option" name="processing" value="1" class="hidden peer" {{ old('processing', $pet->processing) == 1 ? 'checked' : '' }}>
                            <label for="option"
                                class="flex items-center justify-center w-full min-w-max px-2 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 {{ old('processing', $pet->processing) == 1 ? 'border-violet-700 text-gray-600 dark:text-gray-500' : '' }} peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center break-words">
                                    Обробка від паразитів
                                </div>
                            </label>
                        </li>
                    </ul>
                    
                    <p class="mt-5 md:ml-5">Документи</p>
                    <ul class="grid w-full gap-2 mt-3 md:grid-cols-3 md:ml-5">
                        <li>
                            <input type="checkbox" id="pasport" name="vet_pasport" value="1" class="hidden peer" {{ old('vet_pasport', $pet->vet_pasport) == 1 ? 'checked' : '' }}>
                            <label for="pasport"
                                class="flex items-center justify-center w-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 {{ old('vet_pasport', $pet->vet_pasport) == 1 ? 'border-violet-700 text-gray-600 dark:text-gray-500' : '' }} peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">Вет паспорт</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="pedigree" name="pedigree" value="1" class="hidden peer" {{ old('pedigree', $pet->pedigree) == 1 ? 'checked' : '' }}>
                            <label for="pedigree"
                                class="flex items-center justify-center w-full h-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 {{ old('pedigree', $pet->pedigree) == 1 ? 'border-violet-700 text-gray-600 dark:text-gray-500' : '' }} peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">Родовід</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="FCI/KCY" name="fci" value="1" class="hidden peer" {{ old('fci', $pet->fci) == 1 ? 'checked' : '' }}>
                            <label for="FCI/KCY"
                                class="flex items-center justify-center w-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 {{ old('fci', $pet->fci) == 1 ? 'border-violet-700 text-gray-600 dark:text-gray-500' : '' }} peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">FCI/KCY</div>
                                </div>
                            </label>
                        </li>
                        <li class="w-full">
                            <input type="checkbox" id="metrics" name="metrics" value="1" class="hidden peer" {{ old('metrics', $pet->metrics) == 1 ? 'checked' : '' }}>
                            <label for="metrics"
                                class="flex items-center justify-center w-full min-w-max px-2 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 {{ old('metrics', $pet->metrics) == 1 ? 'border-violet-700 text-gray-600 dark:text-gray-500' : '' }} peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center break-words">
                                    Метрика цуценяти
                                </div>
                            </label>
                        </li>
                    </ul>
                    

                    <div class="md:flex md:pl-24 mt-12 md:mt-0">
                        <a href="#"
                            class="text-violet-800 mt-6 ml-16 md:ml-0 bg-white focus:outline-none focus:ring-4
                               focus:ring-gray-300 font-medium rounded-full text-sm px-14 py-2.5 me-2 mb-2 border-2
                               border-violet-800 w-full text-center">Деактивувати</a>
                        <button type="submit"
                            class="text-white mt-6 ml-3 md:ml-0 bg-violet-800 hover:bg-violet-900 focus:outline-none focus:ring-4
                               focus:ring-gray-300 font-medium rounded-full text-sm px-16 py-2.5 mb-2
                               w-full text-center">Зберегти
                            </buttom>
                    </div>

                </div>
            </div>
    </form>
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
    <script>
        function updateCounter(counterId) {
            const textarea = document.querySelector(`#${counterId}`).previousElementSibling;
            const maxLength = textarea.getAttribute('maxlength');
            const currentLength = textarea.value.length;
            document.getElementById(counterId).innerText = `${currentLength}/${maxLength}`;
        }
    </script>

    <script>
        document.getElementById('default-checkbox').addEventListener('change', function() {
            const priceInput = document.getElementById('price');

            if (this.checked) {
                priceInput.value = 0; // Устанавливаем значение "0"
                priceInput.setAttribute('readonly', true); // Блокируем редактирование
            } else {
                priceInput.value = ''; // Очищаем поле
                priceInput.removeAttribute('readonly'); // Разблокируем редактирование
            }
        });
    </script>
@endsection
