@extends('main.index')
@section('main')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Список питомцев</h1>

        <form action="{{ route('pets.index') }}" method="GET" class="mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label for="category_id" class="block mb-2">Вид животного</label>
                    <select name="category_id" id="category_id" class="w-full border rounded px-3 py-2">
                        <option value="">Все виды</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="categorylocal_id" class="block mb-2">Местоположение</label>
                    <select name="categorylocal_id" id="categorylocal_id" class="w-full border rounded px-3 py-2">
                        <option value="">Все местоположения</option>
                        @foreach ($categorylocals as $local)
                            <option value="{{ $local->id }}"
                                {{ request('categorylocal_id') == $local->id ? 'selected' : '' }}>
                                {{ $local->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="categoryage_id" class="block mb-2">Возраст</label>
                    <select name="categoryage_id" id="categoryage_id" class="w-full border rounded px-3 py-2">
                        <option value="">Любой возраст</option>
                        @foreach ($categoryages as $age)
                            <option value="{{ $age->id }}"
                                {{ request('categoryage_id') == $age->id ? 'selected' : '' }}>
                                {{ $age->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="gender" class="block mb-2">Пол</label>
                    <select name="gender" id="gender" class="w-full border rounded px-3 py-2">
                        <option value="">Любой пол</option>
                        <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Мужской</option>
                        <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Женский</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Применить
                фильтры</button>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($pets as $pet)
                <a href="{{ route('pets.show', $pet->id) }}">
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $pet->main_image) }}" alt="{{ $pet->title }}"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2">{{ $pet->title }}</h2>
                            <p class="text-gray-600 mb-2">{{ $pet->category->title }}</p>
                            <p class="text-gray-600 mb-2">{{ $pet->categorylocal->title }}</p>
                            <p class="text-gray-600 mb-2">Возраст: {{ $pet->age }} {{ $pet->categoryage->title }}</p>
                            <p class="text-gray-600 mb-2">Пол: {{ $pet->gender == 'male' ? 'Мужской' : 'Женский' }}</p>
                            <a href="{{ route('pets.show', $pet->id) }}"
                                class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Подробнее</a>
                        </div>
                    </div>
                </a>
            @empty
                <p class="col-span-full text-center text-gray-500">Питомцы не найдены.</p>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $pets->links() }}
        </div>
    </div>
@endsection
