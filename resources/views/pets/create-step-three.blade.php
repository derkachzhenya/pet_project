@extends('main.index')
@section('main')
    <div class="min-h-screen flex flex-col mx-4 sm:justify-center items-center pt-6 mb-12">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 border-2 bg-white overflow-hidden rounded-xl">
            <p class="text-center">Крок 3</p>
            <p class="text-center mt-3 text-2xl">Інформація про тварину</p>
            <div class="mt-12">
                <form action="">

                    <div class="relative w-full mt-8">
                        <label for="countries "
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3">Забарвлення</label>
                        <select id="countries"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                         focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                          dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Оберіть забарвлення</option>
                            <option value="US">Біле</option>
                            <option value="CA">Чорне</option>
                            <option value="FR">Сіре</option>
                            <option value="DE">Коричневе</option>
                            <option value="DE">Кремове</option>
                            <option value="CA">Палеве</option>
                            <option value="FR">Рудовато-коричневе</option>
                            <option value="DE">Золотисте</option>
                            <option value="DE">Срібне</option>
                        </select>
                    </div>

                    <div class="relative w-full mt-8">
                        <label for="textarea"
                            class="block mb-2 text-sm font-medium bg-white text-gray-900 dark:text-white absolute left-2 -top-3 z-10 px-1">
                            Додаткова інформація
                        </label>
                        <div class="relative">
                            <textarea id="textarea" maxlength="300" style="height: 200px;"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                oninput="updateCounter()"></textarea>
                            <div id="charCounter"
                                class="absolute bottom-2 right-2 text-xs text-gray-500 dark:text-gray-400 pointer-events-none">
                                0/300
                            </div>
                        </div>
                    </div>
                    
                    <script>
                        function updateCounter() {
                            const textarea = document.getElementById('textarea');
                            const counter = document.getElementById('charCounter');
                            counter.textContent = `${textarea.value.length}/300`;
                        }
                    </script>
                    
                    


                    <p class="mt-4">Фото</p>
                    <p class="text-sm">Перше фото буде на обкладинці оголошення, перетягніть, щоб змінити порядок фото.</p>

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

    </div>
@endsection
