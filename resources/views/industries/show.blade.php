<x-layouts.app>
    <x-slot name="title">{{ $industry->getTranslation('name', app()->getLocale()) }}</x-slot>
    <div class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">
            <h1 class="text-4xl font-bold mb-8">{{ $industry->getTranslation('name', app()->getLocale()) }}</h1>
            @if($industry->image)
                <img src="{{ $industry->imageUrl('image') }}" alt="" class="w-full h-96 object-cover rounded-xl mb-8">
            @endif
            <div class="prose max-w-none">
                {!! $industry->getTranslation('description', app()->getLocale()) !!}
            </div>
        </div>
    </div>
</x-layouts.app>