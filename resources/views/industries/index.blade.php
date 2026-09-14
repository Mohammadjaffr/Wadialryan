<x-layouts.app>
    <x-slot name="title">{{ __('القطاعات') }}</x-slot>
    <div class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">
            <h1 class="text-4xl font-bold mb-12 text-center">{{ __('القطاعات التي نخدمها') }}</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($industries as $industry)
                <a href="{{ route('industries.show', $industry->slug) }}" class="block bg-white rounded-xl shadow-sm hover:shadow-lg transition overflow-hidden">
                    @if($industry->image)
                    <img src="{{ $industry->imageUrl('image') }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2">{{ $industry->getTranslation('name', app()->getLocale()) }}</h2>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>