@extends('main.index')
@section('main')

    <div class="container flex px-4 py-8">
        <div class="w-2/4">
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg cursor-pointer" 
                         src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" 
                         alt="" 
                         onclick="openModal(this.src)">
                </div>
                <div class="grid grid-cols-5 gap-4">
                    @foreach(['image-1.jpg', 'image-2.jpg', 'image-3.jpg', 'image-4.jpg', 'image-5.jpg'] as $image)
                        <div>
                            <img class="h-auto max-w-full rounded-lg cursor-pointer" 
                                 src="https://flowbite.s3.amazonaws.com/docs/gallery/square/{{ $image }}" 
                                 alt="" 
                                 onclick="openModal(this.src)">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div>
            <p class="ml-5 text-3xl font-semibold">Продам свого улюбленця</p>
        </div>
    </div>

    <!-- Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="relative">
            <img id="modalImage" src="" alt="" class="max-h-screen max-w-screen-lg">
            <button onclick="closeModal()" class="absolute top-4 right-4 text-white bg-black bg-opacity-50 rounded-full p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    <div class="pl-4 w-2/4 mb-12">
        <p class="text-lg font-semibold">Детальний опис</p>
        <p class="mt-2">dgbfgbb
        </p>
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
@endsection
