@extends('main.index')
@section('main')
    <div class="min-h-screen flex flex-col mx-4 sm:justify-center items-center pt-6 mb-12">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 border-2 bg-white overflow-hidden rounded-xl">
            <p class="text-center">Крок 3</p>
            <p class="text-center mt-3 text-2xl">Інформація про тварину</p>
            <div class="w-4/5 mx-auto mt-4">
                <div class="flex mx-auto items-center gap-2">
                    <hr class="border-violet-200 border-2 w-1/3" />
                    <hr class="border-violet-200 border-2 w-1/3" />
                    <hr class="border-violet-700 border-2 w-1/3" />
                </div>
            </div>
            <div class="mt-12">
                <form action="{{ route('pet.create.step.three.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="relative w-full mt-8">
                        <label for="categorycolor"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">
                            Забарвлення<span class="text-red-500">*</span>
                        </label>
                        <select id="categorycolor" name="categorycolor_id"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                            focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" disabled {{ old('categorycolor_id') == '' ? 'selected' : '' }}>Оберіть
                                забарвлення</option>
                            @foreach ($categorycolors as $categorycolor)
                                <option value="{{ $categorycolor->id }}"
                                    {{ old('categorycolor_id') == $categorycolor->id ? 'selected' : '' }}>
                                    {{ $categorycolor->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('categorycolor_id')
                            <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="relative w-full mt-8">
                        <label for="description"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3 z-10 px-1">
                            Додаткова інформація<span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <textarea id="description" name="description" maxlength="300" style="height: 200px;"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                oninput="updateCounter()">{{ old('description', $pet->description ?? '') }}</textarea>
                            <div id="charCounter"
                                class="absolute bottom-2 right-2 text-xs text-gray-500 dark:text-gray-400 pointer-events-none">
                                {{ strlen(old('description', $pet->description ?? '')) }}/300
                            </div>
                            @error('description')
                                <div class="alert alert-danger text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <script>
                        function updateCounter() {
                            const textarea = document.getElementById('description');
                            const counter = document.getElementById('charCounter');
                            counter.textContent = `${textarea.value.length}/300`;
                        }
                    </script>



                    <p class="mt-4">Фото</p>
                    <p class="text-sm">Перше фото буде на обкладинці оголошення.</p>
                    <div class="flex gap-3 mt-2">
                        <div id="imageUploader1"
                            class="w-16 h-16 bg-gray-200 flex items-center rounded-md justify-center cursor-pointer overflow-hidden relative">
                            <input type="file" id="fileInput1" class="hidden" name="main_image" accept="image/*">
                            <div id="placeholder1" class="w-full h-full {{ old('main_image') ? 'hidden' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="w-full h-full">
                                    <rect width="200" height="200" fill="#f0f0f0" />
                                    <g transform="translate(50, 50)">
                                        <rect x="0" y="15" width="100" height="70" rx="10" ry="10"
                                            fill="#ffffff" />
                                        <circle cx="50" cy="50" r="25" fill="#ffffff" />
                                        <circle cx="50" cy="50" r="20" fill="#f0f0f0" />
                                        <rect x="15" y="0" width="70" height="20" rx="5" ry="5"
                                            fill="#ffffff" />
                                    </g>
                                </svg>
                            </div>
                            <img id="uploadedImage1"
                                class="absolute top-0 left-0 w-full h-full object-cover {{ old('main_image') ? '' : 'hidden' }}"
                                src="{{ old('main_image') ? asset('storage/' . old('main_image')) : '' }}"
                                alt="Загруженное изображение">
                        </div>

                        <div id="imageUploader2"
                            class="w-16 h-16 bg-gray-200 flex items-center rounded-md justify-center cursor-pointer overflow-hidden relative">
                            <input type="file" id="fileInput2" class="hidden" name="image_one" accept="image/*">
                            <div id="placeholder2" class="w-full h-full {{ old('image_one') ? 'hidden' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="w-full h-full">
                                    <rect width="200" height="200" fill="#f0f0f0" />
                                    <g transform="translate(50, 50)">
                                        <rect x="0" y="15" width="100" height="70" rx="10" ry="10"
                                            fill="#ffffff" />
                                        <circle cx="50" cy="50" r="25" fill="#ffffff" />
                                        <circle cx="50" cy="50" r="20" fill="#f0f0f0" />
                                        <rect x="15" y="0" width="70" height="20" rx="5" ry="5"
                                            fill="#ffffff" />
                                    </g>
                                </svg>
                            </div>
                            <img id="uploadedImage2" class="absolute top-0 left-0 w-full h-full object-cover hidden"
                                alt="Загруженное изображение">
                        </div>

                        <div id="imageUploader3"
                            class="w-16 h-16 bg-gray-200 flex items-center rounded-md justify-center cursor-pointer overflow-hidden relative">
                            <input type="file" id="fileInput3" class="hidden" name="image_two" accept="image/*">
                            <div id="placeholder3" class="w-full h-full {{ old('image_two') ? 'hidden' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="w-full h-full">
                                    <rect width="200" height="200" fill="#f0f0f0" />
                                    <g transform="translate(50, 50)">
                                        <rect x="0" y="15" width="100" height="70" rx="10" ry="10"
                                            fill="#ffffff" />
                                        <circle cx="50" cy="50" r="25" fill="#ffffff" />
                                        <circle cx="50" cy="50" r="20" fill="#f0f0f0" />
                                        <rect x="15" y="0" width="70" height="20" rx="5" ry="5"
                                            fill="#ffffff" />
                                    </g>
                                </svg>
                            </div>
                            <img id="uploadedImage3" class="absolute top-0 left-0 w-full h-full object-cover hidden"
                                alt="Загруженное изображение">
                        </div>

                        <div id="imageUploader4"
                            class="w-16 h-16 bg-gray-200 flex items-center rounded-md justify-center cursor-pointer overflow-hidden relative">
                            <input type="file" id="fileInput4" class="hidden" name="image_three" accept="image/*">
                            <div id="placeholder4" class="w-full h-full {{ old('image_three') ? 'hidden' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="w-full h-full">
                                    <rect width="200" height="200" fill="#f0f0f0" />
                                    <g transform="translate(50, 50)">
                                        <rect x="0" y="15" width="100" height="70" rx="10" ry="10"
                                            fill="#ffffff" />
                                        <circle cx="50" cy="50" r="25" fill="#ffffff" />
                                        <circle cx="50" cy="50" r="20" fill="#f0f0f0" />
                                        <rect x="15" y="0" width="70" height="20" rx="5" ry="5"
                                            fill="#ffffff" />
                                    </g>
                                </svg>
                            </div>
                            <img id="uploadedImage4" class="absolute top-0 left-0 w-full h-full object-cover hidden"
                                alt="Загруженное изображение">
                        </div>

                        <div id="imageUploader5"
                            class="w-16 h-16 bg-gray-200 flex items-center rounded-md justify-center cursor-pointer overflow-hidden relative">
                            <input type="file" id="fileInput5" class="hidden" name="image_four" accept="image/*">
                            <div id="placeholder5" class="w-full h-full {{ old('image_four') ? 'hidden' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="w-full h-full">
                                    <rect width="200" height="200" fill="#f0f0f0" />
                                    <g transform="translate(50, 50)">
                                        <rect x="0" y="15" width="100" height="70" rx="10" ry="10"
                                            fill="#ffffff" />
                                        <circle cx="50" cy="50" r="25" fill="#ffffff" />
                                        <circle cx="50" cy="50" r="20" fill="#f0f0f0" />
                                        <rect x="15" y="0" width="70" height="20" rx="5" ry="5"
                                            fill="#ffffff" />
                                    </g>
                                </svg>
                            </div>
                            <img id="uploadedImage5" class="absolute top-0 left-0 w-full h-full object-cover hidden"
                                alt="Загруженное изображение">
                        </div>


                    </div>

                    <script>
                        // Функция для обработки загрузки изображения
                        function handleImageUpload(uploaderId, fileInputId, placeholderId, uploadedImageId) {
                            const imageUploader = document.getElementById(uploaderId);
                            const fileInput = document.getElementById(fileInputId);
                            const placeholder = document.getElementById(placeholderId);
                            const uploadedImage = document.getElementById(uploadedImageId);

                            imageUploader.addEventListener('click', () => fileInput.click());

                            fileInput.addEventListener('change', (event) => {
                                const file = event.target.files[0];
                                if (file && file.type.startsWith('image/')) {
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        uploadedImage.src = e.target.result;
                                        placeholder.classList.add('hidden');
                                        uploadedImage.classList.remove('hidden');
                                    };
                                    reader.readAsDataURL(file);
                                }
                            });
                        }

                        // Применяем функцию для первого изображения
                        handleImageUpload('imageUploader1', 'fileInput1', 'placeholder1', 'uploadedImage1');
                        handleImageUpload('imageUploader2', 'fileInput2', 'placeholder2', 'uploadedImage2');
                        handleImageUpload('imageUploader3', 'fileInput3', 'placeholder3', 'uploadedImage3');
                        handleImageUpload('imageUploader4', 'fileInput4', 'placeholder4', 'uploadedImage4');
                        handleImageUpload('imageUploader5', 'fileInput5', 'placeholder5', 'uploadedImage5');
                    </script>




                    <div class="flex justify-between">
                        <a href="{{ route('pet.create.step.two') }}"
                            class="text-violet-800 mt-6 bg-white focus:outline-none focus:ring-4
                                       focus:ring-gray-300 font-medium rounded-full text-sm px-14 py-2.5 me-2 mb-2 border-2
                                         border-violet-800">Назад</a>
                        <button type="submit"
                            class="text-white mt-6 bg-violet-800 hover:bg-violet-900 focus:outline-none focus:ring-4
                                       focus:ring-gray-300 font-medium rounded-full text-sm px-14 py-2.5 me-2 mb-2
                                       ">Вперед</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
