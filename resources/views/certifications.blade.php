<x-layouts.app>
    <x-slot name="title">{{ __('الشهادات والاعتمادات') }}</x-slot>
    <div class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">
            <h1 class="text-4xl font-bold mb-12 text-center">{{ __('الشهادات والاعتمادات') }}</h1>
            
            @if($certifications->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($certifications as $cert)
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden p-6 text-center">
                        @if($cert->image)
                        <img src="{{ $cert->imageUrl('image') }}" class="h-32 object-contain mx-auto mb-6">
                        @endif
                        <h2 class="text-xl font-bold mb-2">{{ $cert->getTranslation('name', app()->getLocale()) }}</h2>
                        <p class="text-gray-600">{{ $cert->issuer }}</p>
                        @if($cert->pdf)
                        <a href="{{ app(\App\Services\ImageService::class)->url($cert->pdf) }}" target="_blank" class="inline-block mt-4 text-brand-secondary font-bold hover:underline">{{ __('عرض الشهادة') }}</a>
                        @endif
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 bg-white rounded-xl shadow-sm">
                    <p class="text-xl text-gray-500">{{ __('لا توجد شهادات متاحة حالياً.') }}</p>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>