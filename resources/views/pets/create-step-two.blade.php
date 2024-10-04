@extends('main.index')
@section('main')
    <div class="min-h-screen flex flex-col mx-4 sm:justify-center items-center pt-6 mb-12">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 border-2 bg-white overflow-hidden rounded-xl">
            <p class="text-center">Крок 2</p>
            <p class="text-center mt-3 text-2xl">Інформація про тварин</p>
            <div class="mt-12">
                <form action="{{ route('pet.create.step.two.post') }}" method="POST">
                    @csrf

                    <div class="relative w-full mt-8">
                        <label for="countries "
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Різновид<span class="text-red-500">*</span></label>
                        <select id="countries"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                         focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Оберіть породу</option>
                            <option value="US">Йоркширський терєр</option>
                            <option value="CA">Коти</option>
                            <option value="FR">Гризуни</option>
                            <option value="DE">Рептилії</option>
                            <option value="DE">Інші</option>
                        </select>
                    </div>

                    <div class="flex gap-3">
                        <div class="relative w-3/5 mt-8">
                            <label for="countries "
                                class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Вік<span class="text-red-500">*</span></label>
                            <input id="countries"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                             focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                              dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>

                        <div class="w-2/5 mt-8">
                            <select id="countries"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                               focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                               dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Період</option>
                                <option value="KYI">Днів</option>
                                <option value="KHR">Тижнів</option>
                                <option value="ODS">Місяців</option>
                                <option value="DNI">Років</option>
                            </select>
                        </div>
                    </div>

                    <p class="mt-5">Стать<span class="text-red-500">*</span></p>
                    <div class="flex items-center mb-4 mt-3">
                        <input id="default-radio-1" type="radio" value="" name="default-radio"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Дівчинка</label>
                    </div>
                    <div class="flex items-center mb-4 mt-3">
                        <input id="default-radio-2" type="radio" value="" name="default-radio"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-2"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Хлопчік</label>
                    </div>
                    <div class="flex items-center">
                        <input checked id="default-radio-3" type="radio" value="" name="default-radio"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-3"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Невідомо</label>
                    </div>

                    <p class="mt-5">Здоров'я</p>
                    <ul class="grid w-full gap-2 mt-3 md:grid-cols-3">
                        <li>
                            <input type="checkbox" id="chip" value="" class="hidden peer" required="">
                            <label for="chip"
                                class="flex items-center justify-center w-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">Чіп</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="sterilization" value="" class="hidden peer">
                            <label for="sterilization"
                                class="flex items-center justify-center w-full h-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">Стерилізація</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="vacination" value="" class="hidden peer">
                            <label for="vacination"
                                class="flex items-center justify-center w-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">Вакцинація</div>
                                </div>
                            </label>
                        </li>
                        <li class="w-full">
                            <input type="checkbox" id="option" value="" class="hidden peer">
                            <label for="option"
                                class="flex items-center justify-center w-full min-w-max p-1 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center break-words">
                                    Обробка від паразитів
                                </div>
                            </label>
                        </li>
                    </ul>

                    <p class="mt-5">Документи</p>
                    <ul class="grid w-full gap-2 mt-3 md:grid-cols-3">
                        <li>
                            <input type="checkbox" id="pasport" value="" class="hidden peer" required="">
                            <label for="pasport"
                                class="flex items-center justify-center w-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">Вет паспорт</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="pedigree" value="" class="hidden peer">
                            <label for="pedigree"
                                class="flex items-center justify-center w-full h-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">Родовід</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="checkbox" id="FCI/KCY" value="" class="hidden peer">
                            <label for="FCI/KCY"
                                class="flex items-center justify-center w-full bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="text-center">
                                    <div class="w-full">FCI/KCY</div>
                                </div>
                            </label>
                        </li>
                        <li class="w-full">
                            <input type="checkbox" id="metrics" value="" class="hidden peer">
                            <label for="metrics"
                                class="flex items-center justify-center w-full min-w-max p-1 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-violet-700 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
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
