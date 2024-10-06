@extends('main.index')
@section('main')
    <div class="sm:flex w-full h-screen">
        <div class="hidden md:block w-full">
            <p class="pl-64 mt-56 font-semibold text-3xl">Упс!</p>
            <p class="pl-64 font-semibold text-3xl">Схоже, ми не можемо знайти цю сторінку.</p>
            <p class="pl-64 mt-12">Ця сторінка вирішила піти гуляти без повідка і загубилась. Але не хвилюйтесь, ми завжди тут,
                щоб допомогти вам знайти свого нового улюбленця.</p>
            <div class="pl-64 mt-10">
                <a href="{{ route('home') }}"
                    class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 
                    font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                    Перейти на головну</a>
            </div>
        </div>

        <div class="w-3/4 ml-auto">
            <img src="{{ asset('error404.png') }}" alt="error404">
        </div>

        <div class="block md:hidden">
            <p class="px-5 mt-4 text-center font-semibold text-lg">Упс!</p>
            <p class="px-5 mt-4 text-center font-semibold text-lg">Схоже, ми не зможемо знайти цю сторінку.</p>
            <p class="px-5 mt-4 text-center">Ця сторінка вирішила піти гуляти без повідка і загубилась. Але не хвилюйтесь, ми завжди тут,
                щоб допомогти вам знайти свого нового улюбленця.</p>
                <div class="flex justify-center mt-7">
                    <a href="{{ route('home') }}"
                        class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 
                        font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                        Перейти на головну</a>
                </div>               
        </div>
    </div>
@endsection
