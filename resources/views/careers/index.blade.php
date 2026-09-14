<x-layouts.app>
    <x-slot name="title">{{ __('الوظائف') }}</x-slot>
    <div class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">
            <h1 class="text-4xl font-bold mb-12 text-center">{{ __('الوظائف المتاحة') }}</h1>
            
            @if($careers->count() > 0)
                <div class="space-y-6">
                    @foreach($careers as $career)
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold">{{ $career->getTranslation('title', app()->getLocale()) }}</h2>
                            <p class="text-gray-600 mt-2">{{ $career->getTranslation('location', app()->getLocale()) }} | {{ $career->employment_type }}</p>
                        </div>
                        <a href="{{ route('careers.show', $career->slug) }}" class="px-6 py-2 bg-brand-primary text-white rounded hover:bg-brand-secondary transition">{{ __('التفاصيل والتقديم') }}</a>
                    </div>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $careers->links() }}
                </div>
            @else
                <div class="text-center py-20 bg-white rounded-xl shadow-sm">
                    <p class="text-xl text-gray-500">{{ __('لا توجد وظائف متاحة حالياً.') }}</p>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>