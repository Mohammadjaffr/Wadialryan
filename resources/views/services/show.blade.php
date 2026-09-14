<x-layouts.app>
    <x-slot name="title">{{ $service->getTranslation('title', app()->getLocale()) }}</x-slot>
    <div class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">
            <h1 class="text-4xl font-bold mb-8">{{ $service->getTranslation('title', app()->getLocale()) }}</h1>
            @if($service->main_image)
                <img src="{{ $service->imageUrl('main_image') }}" alt="" class="w-full h-96 object-cover rounded-xl mb-8">
            @endif
            <div class="prose max-w-none">
                {!! $service->getTranslation('full_description', app()->getLocale()) ?? $service->getTranslation('description', app()->getLocale()) !!}
            </div>
            
            @if($service->capabilities)
            <h2 class="text-2xl font-bold mt-12 mb-4">{{ __('القدرات') }}</h2>
            <div class="prose max-w-none">{!! $service->getTranslation('capabilities', app()->getLocale()) !!}</div>
            @endif
        </div>
    </div>
</x-layouts.app>