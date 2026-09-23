<x-layouts.app>
    <x-slot name="title">{{ __($service->title) }}</x-slot>
    <div class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">
            <h1 class="text-4xl font-bold mb-8">{{ __($service->title) }}</h1>
            @if($service->main_image)
                <img src="{{ $service->imageUrl('main_image') }}" alt="" class="w-full h-96 object-cover rounded-xl mb-8">
            @endif
            <div class="prose max-w-none">
                {!! __($service->full_description ?? $service->description) !!}
            </div>
            
            @if($service->capabilities)
            <h2 class="text-2xl font-bold mt-12 mb-4">{{ __('القدرات') }}</h2>
            <div class="prose max-w-none">{!! __($service->capabilities) !!}</div>
            @endif
        </div>
    </div>
</x-layouts.app>