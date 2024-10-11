@extends('main.index')
@section('main')
    <div class="min-h-screen flex flex-col mx-4 sm:justify-center items-center pt-6 mb-12">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 border-2 bg-white overflow-hidden rounded-xl">
            <p class="text-center">Крок 2</p>
            <p class="text-center mt-3 text-2xl">Інформація про тварин</p>
            <div class="w-4/5 mx-auto mt-4">
                <div class="flex mx-auto items-center gap-2">
                    <hr class="border-violet-200 border-2 w-1/3" />
                    <hr class="border-violet-700 border-2 w-1/3" />
                    <hr class="border-violet-200 border-2 w-1/3" />
                </div>
            </div>
            <div class="mt-12">
                <form action="{{ route('pet.create.step.two.post') }}" method="POST">
                    @csrf

                    <div class="relative w-full mt-8">
                        <label for="categoryvariety" 
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Різновид<span class="text-red-500">*</span></label>
                        <select id="categoryvariety" name="categoryvariety_id"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                            focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" disabled {{ old('categoryvariety_id') == '' ? 'selected' : '' }}>Оберіть породу</option>
                            @foreach ($categoryvarieties as $categoryvariety)
                                <option value="{{ $categoryvariety->id }}" {{ old('categoryvariety_id') == $categoryvariety->id ? 'selected' : '' }}>
                                    {{ $categoryvariety->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoryvariety_id')
                            <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    

                    <div class="flex gap-3">
                        <div class="relative w-3/5 mt-8">
                            <label for="age"
                                class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">
                                Вік<span class="text-red-500">*</span>
                            </label>
                            <input type="number" id="age" name="age" 
                                value="{{ old('age') }}"
                                min="0" max="100"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                                dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                required />
                            @error('age')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-2/5 mt-8">
                            <label for="categoryage" class="sr-only">Період</label>
                            <select id="categoryage" name="categoryage_id"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                                dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" disabled {{ old('categoryage_id') ? '' : 'selected' }}>Період</option>
                                @foreach ($categoryages as $categoryage)
                                    <option value="{{ $categoryage->id }}" {{ old('categoryage_id') == $categoryage->id ? 'selected' : '' }}>
                                        {{ $categoryage->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categoryage_id')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <p class="mt-5">Стать<span class="text-red-500">*</span></p>

                    <div class="flex items-center mb-4 mt-3">
                        <input id="default-radio-1" type="radio" value="Дівчинка" name="gender"
                            {{ old('gender') == 'Дівчинка' ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Дівчинка</label>
                    </div>
                    
                    <div class="flex items-center mb-4 mt-3">
                        <input id="default-radio-2" type="radio" value="Хлопчік" name="gender"
                            {{ old('gender') == 'Хлопчік' ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Хлопчік</label>
                    </div>
                    
                    <div class="flex items-center">
                        <input id="default-radio-3" type="radio" value="Невідомо" name="gender"
                            {{ old('gender') == 'Невідомо' ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Невідомо</label>
                    </div>
                    
                    @error('gender')
                        <div class="alert alert-danger text-red-600">{{ $message }}</div>
                    @enderror
                    

                    <p class="mt-5">Здоров'я</p>
                    <ul class="grid w-full gap-2 mt-3 md:grid-cols-3">
                        <li>
                            <input type="checkbox" id="chip" name="chip" value="1" class="hidden peer" >
                            <label for="chip"
                                class="flex items-center justify-center w-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">Чіп</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="sterilization" name="sterilization" value="1" class="hidden peer">
                            <label for="sterilization"
                                class="flex items-center justify-center w-full h-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">Стерилізація</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="vacination" name="vaccination" value="1" class="hidden peer">
                            <label for="vacination"
                                class="flex items-center justify-center w-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">Вакцинація</div>
                                </div>
                            </label>
                        </li>
                        <li class="w-full">
                            <input type="checkbox" id="option" name="processing" value="1" class="hidden peer">
                            <label for="option"
                                class="flex items-center justify-center w-full min-w-max px-2 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center break-words">
                                    Обробка від паразитів
                                </div>
                            </label>
                        </li>
                    </ul>

                    <p class="mt-5">Документи</p>
                    <ul class="grid w-full gap-2 mt-3 md:grid-cols-3">
                        <li>
                            <input type="checkbox" id="pasport" name="vet_pasport" value="1" class="hidden peer">
                            <label for="pasport"
                                   class="flex items-center justify-center w-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">Вет паспорт</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="pedigree" name="pedigree" value="1" class="hidden peer">
                            <label for="pedigree"
                                class="flex items-center justify-center w-full h-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">Родовід</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="FCI/KCY" name="fci" value="1" class="hidden peer">
                            <label for="FCI/KCY"
                                class="flex items-center justify-center w-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">FCI/KCY</div>
                                </div>
                            </label>
                        </li>
                        <li class="w-full">
                            <input type="checkbox" id="metrics" name="metrics" value="1" class="hidden peer">
                            <label for="metrics"
                                class="flex items-center justify-center w-full min-w-max px-2 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center break-words">
                                    Метрика цуценяти
                                </div>
                            </label>
                        </li>
                    </ul>



                    <div class="flex justify-between">
                        <a href="{{ route('pet.create.step.one') }}"
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

    </div>
@endsection
