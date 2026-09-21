<x-layouts.app>
    <x-slot:title>{{ __('العملاء - وادي الريان للمقاولات') }}</x-slot>

    <!-- Header -->
    <section class="flex overflow-hidden relative justify-center items-center pt-40 pb-24 bg-gray-50">
        <div class="absolute inset-0 opacity-20 z-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-secondary/20 via-transparent to-transparent"></div>

        <div class="container relative z-10 px-4 mx-auto text-center">
            <div class="mb-4 opacity-0 transform translate-y-4 animate-fade-in-up">
                <span class="inline-flex gap-2 items-center px-4 py-2 mb-2 text-sm font-bold tracking-wide rounded-full bg-brand-primary/10 text-brand-primary">{{ __('شركاء النجاح') }}</span>
            </div>
            <h1 class="mb-6 text-4xl font-extrabold opacity-0 transform translate-y-4 md:text-6xl text-brand-primary animate-fade-in-up"
                style="animation-delay: 100ms;">{{ __('عملائنا المميزون') }}</h1>
            <p class="mx-auto max-w-2xl text-lg font-medium leading-relaxed opacity-0 transform translate-y-4 text-gray-600 animate-fade-in-up"
                style="animation-delay: 200ms;">
                {{ __('نفتخر بثقة العديد من الشركات الرائدة والمؤسسات الكبرى التي اخترتنا كشريك موثوق لتنفيذ مشاريعهم.') }}</p>
        </div>
    </section>

    <!-- Clients Grid -->
    <section class="py-24 bg-white border-t border-gray-100">
        <div class="container px-4 mx-auto max-w-7xl md:px-6">
            @if($clients->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($clients as $client)
                    <div class="bg-gray-50 rounded-2xl border border-gray-100 p-8 flex flex-col items-center justify-center text-center shadow-sm hover:shadow-lg transition-all duration-300 group h-48">
                        @if($client->logo)
                            <img src="{{ app(\App\Services\ImageService::class)->url($client->logo) }}" alt="{{ $client->name }}" class="w-full h-full object-contain max-h-32 transition-transform duration-500 group-hover:scale-110">
                        @else
                            <h3 class="text-xl font-bold text-gray-400 group-hover:text-brand-primary transition-colors">{{ $client->name }}</h3>
                        @endif
                    </div>
                    @endforeach
                </div>
                
                <div class="mt-12 flex justify-center">
                    {{ $clients->links() }}
                </div>
            @else
                <div class="text-center py-20 bg-gray-50 rounded-2xl border border-gray-100">
                    <x-heroicon-o-users class="w-16 h-16 mx-auto text-gray-400 mb-4"/>
                    <h3 class="text-2xl font-bold text-brand-primary mb-2">{{ __('جاري تحديث قائمة العملاء') }}</h3>
                    <p class="text-gray-500">{{ __('سيتم إضافة قائمة عملائنا قريباً.') }}</p>
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
