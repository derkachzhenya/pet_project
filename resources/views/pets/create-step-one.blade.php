@extends('main.index')
@section('main')
    <div class="min-h-screen flex flex-col mx-4 sm:justify-center items-center pt-6 mb-12">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 border-2 bg-white overflow-hidden rounded-xl">
            <p class="text-center">Крок 1</p>
            <p class="text-center mt-3 text-2xl">Загальна інформація</p>
            <div class="w-4/5 mx-auto mt-4">
                <div class="flex mx-auto items-center gap-2">
                    <hr class="border-violet-700 border-2 w-1/3" />
                    <hr class="border-violet-200 border-2 w-1/3" />
                    <hr class="border-violet-200 border-2 w-1/3" />
                </div>
            </div>
            <div class="mt-12">
                <form action="{{ route('pet.create.step.one.post') }}" method="POST">
                    @csrf

                    <div class="relative w-full">
                        <label for="textarea"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3 px-1 z-10">
                            Назва оголошення<span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <textarea id="textarea" maxlength="50" name="title"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-16 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                oninput="updateCounter()">{{ old('title', $pet->title ?? '') }}</textarea>
                            <div id="charCounter"
                                class="absolute bottom-2 right-2 text-xs text-gray-500 dark:text-gray-400 pointer-events-none">
                                {{ strlen(old('title', $pet->title ?? '')) }}/50
                            </div>
                        </div>
                        @error('title')
                            <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative w-full mt-8">
                        <label for="category"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Вид
                            тварин<span class="text-red-500">*</span></label>
                        <select id="category" name="category_id"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                         focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Оберіть тварину</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="relative w-full mt-8">
                        <label for="price"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Ціна<span
                                class="text-red-500">*</span></label>
                        <input id="price" name="price" value="{{ old('price') }}"
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

                    <div class="relative w-full mt-8">
                        <label for="categorylocal"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Локація<span
                                class="text-red-500">*</span></label>
                        <select id="categorylocal" name="categorylocal_id"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                   focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                   dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Оберіть локацію</option>
                            @foreach ($categorylocals as $categoryloc)
                                <option value="{{ $categoryloc->id }}"
                                    {{ old('categorylocal_id') == $categoryloc->id ? 'selected' : '' }}>
                                    {{ $categoryloc->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('categorylocal_id')
                            <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <p class="mt-5">Походження тварини<span class="text-red-500">*</span></p>

                    <div class="flex items-center mb-4 mt-3">
                        <input id="default-radio-1" type="radio" value="Представник притулку" name="hiking"
                            {{ old('hiking') == 'Представник притулку' ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Я
                            представник притулку</label>
                    </div>

                    <div class="flex items-center mb-4 mt-3">
                        <input id="default-radio-2" type="radio" value="Власник розплідника" name="hiking"
                            {{ old('hiking') == 'Власник розплідника' ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Я
                            власник розплідника</label>
                    </div>

                    <div class="flex items-center">
                        <input id="default-radio-3" type="radio" value="Приватний власник" name="hiking"
                            {{ old('hiking') == 'Приватний власник' ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Я
                            приватна особа</label>
                    </div>

                    @error('hiking')
                        <div class="alert alert-danger text-red-600">{{ $message }}</div>
                    @enderror


                    <div class="flex justify-end">
                        <button type="submit"
                            class="text-white mt-6 bg-gray-500 hover:bg-gray-600 focus:outline-none focus:ring-4
                                       focus:ring-gray-300 font-medium rounded-full text-sm px-14 py-2.5 me-2 mb-2 dark:bg-gray-500 dark:hover:bg-gray-600
                                        dark:focus:ring-gray-600 dark:border-gray-600">Вперед</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateCounter() {
            const textarea = document.getElementById('textarea');
            const counter = document.getElementById('charCounter');
            counter.textContent = `${textarea.value.length}/50`;
        }

        // Инициализируем счётчик при загрузке страницы
        document.addEventListener('DOMContentLoaded', function() {
            updateCounter();
        });
    </script>


    {{-- Скрипт для checkbox "Безкоштовно" --}}
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
