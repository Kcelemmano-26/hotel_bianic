
<div class="container mx-auto py-10">
    <div class="columns-2 sm:columns-3 md:columns-4 gap-1 space-y-1">
        @foreach ($images as $image)
            <div class="relative overflow-hidden rounded-lg shadow-md">
                <img src="{{ $image }}" class="w-full h-auto object-cover" alt="Gallery Image">
            </div>
        @endforeach
    </div>
</div>

<div class="container mx-auto py-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1">
            @foreach ($images as $image)
                <div class="relative group overflow-hidden shadow-md">
                    <img src="{{ $image }}" class="w-full h-64 object-cover transition-transform duration-300 ease-in-out group-hover:scale-110" alt="Gallery Image">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <a href="{{ $image }}" class="text-white text-xl font-bold">Voir</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>  
