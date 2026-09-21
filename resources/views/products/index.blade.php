<x-layouts.app>
    <x-slot:title>{{ __('المنتجات - وادي الريان للمقاولات') }}</x-slot>

    <!-- Header -->
    <section class="flex overflow-hidden relative justify-center items-center pt-40 pb-24 bg-gray-50">
        <div class="absolute inset-0 opacity-20 z-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-secondary/20 via-transparent to-transparent"></div>

        <div class="container relative z-10 px-4 mx-auto text-center">
            <div class="mb-4 opacity-0 transform translate-y-4 animate-fade-in-up">
                <span class="inline-flex gap-2 items-center px-4 py-2 mb-2 text-sm font-bold tracking-wide rounded-full bg-brand-primary/10 text-brand-primary">{{ __('المنتجات الخاصة بنا') }}</span>
            </div>
            <h1 class="mb-6 text-4xl font-extrabold opacity-0 transform translate-y-4 md:text-6xl text-brand-primary animate-fade-in-up"
                style="animation-delay: 100ms;">{{ __('أحدث المنتجات والحلول') }}</h1>
            <p class="mx-auto max-w-2xl text-lg font-medium leading-relaxed opacity-0 transform translate-y-4 text-gray-600 animate-fade-in-up"
                style="animation-delay: 200ms;">
                {{ __('نقدم مجموعة واسعة من المنتجات ذات الجودة العالية والمطابقة لأعلى المواصفات والمعايير العالمية لتلبية احتياجات مشاريعكم.') }}</p>
        </div>
    </section>

    <!-- Products List -->
    <section class="py-24 bg-white border-t border-gray-100">
        <div class="container px-4 mx-auto max-w-7xl md:px-6">
            @if($products->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($products as $item)
                    <a href="{{ route('products.show', $item->slug) }}" class="bg-gray-50 rounded-2xl border border-gray-100 p-6 flex flex-col items-center text-center shadow-sm hover:shadow-lg transition-all duration-300 group">
                        @if($item->main_image)
                            <div class="w-full h-48 overflow-hidden rounded-xl mb-6 relative bg-gray-50 flex items-center justify-center p-2">
                                <img src="{{ $item->imageUrl('main_image') }}" alt="{{ $item->name }}" class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105">
                            </div>
                        @else
                            <div class="w-full h-48 bg-gray-200 rounded-xl mb-6 flex items-center justify-center text-gray-400">
                                <x-heroicon-o-cube class="w-16 h-16"/>
                            </div>
                        @endif
                        <h3 class="text-xl font-bold text-brand-primary mb-3 transition-colors group-hover:text-brand-secondary">{{ $item->name }}</h3>
                        @if($item->description)
                            <p class="text-sm text-gray-500 line-clamp-3">{{ Str::limit(strip_tags($item->description), 100) }}</p>
                        @endif
                    </a>
                    @endforeach
                </div>
                
                <div class="mt-12 flex justify-center">
                    {{ $products->links() }}
                </div>
            @else
                <div class="text-center py-20 bg-gray-50 rounded-2xl border border-gray-100">
                    <x-heroicon-o-cube class="w-16 h-16 mx-auto text-gray-400 mb-4"/>
                    <h3 class="text-2xl font-bold text-brand-primary mb-2">{{ __('جاري تحديث المنتجات') }}</h3>
                    <p class="text-gray-500">{{ __('لم يتم إضافة منتجات بعد. يرجى زيارة الصفحة لاحقاً.') }}</p>
                </div>
            @endif
        </div>
    </section>
    
    @push('scripts')
        <style>
            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fade-in-up {
                animation: fadeInUp 0.8s ease-out forwards;
            }
        </style>
    @endpush
</x-layouts.app>
