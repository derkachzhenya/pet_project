@extends('main.index')
@section('main')
    <div class="min-h-screen flex flex-col mx-4 sm:justify-center items-center pt-6 mb-12">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 border-2 bg-white overflow-hidden rounded-xl">
            <p class="text-center">Крок 3</p>
            <p class="text-center mt-3 text-2xl">Інформація про тварину</p>
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
                            <option value="" disabled {{ old('categorycolor_id') == '' ? 'selected' : '' }}>Оберіть забарвлення</option>
                            @foreach ($categorycolors as $categorycolor)
                                <option value="{{ $categorycolor->id }}" {{ old('categorycolor_id') == $categorycolor->id ? 'selected' : '' }}>
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
                    <p class="text-sm">Перше фото буде на обкладинці оголошення, перетягніть, щоб змінити порядок фото.</p>
                    <input type="file" name="photos[]" multiple>

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
