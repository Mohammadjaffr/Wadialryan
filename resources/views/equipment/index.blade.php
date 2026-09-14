<x-layouts.app>
    <x-slot:title>{{ __('المعدات - وادي الريان للمقاولات') }}</x-slot>

    <!-- Header -->
    <section class="flex overflow-hidden relative justify-center items-center pt-40 pb-24 bg-gray-50">
        <div class="absolute inset-0 opacity-20 z-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-secondary/20 via-transparent to-transparent"></div>

        <div class="container relative z-10 px-4 mx-auto text-center">
            <div class="mb-4 opacity-0 transform translate-y-4 animate-fade-in-up">
                <span class="inline-flex gap-2 items-center px-4 py-2 mb-2 text-sm font-bold tracking-wide rounded-full bg-brand-primary/10 text-brand-primary">{{ __('الآليات والمعدات الثقيلة') }}</span>
            </div>
            <h1 class="mb-6 text-4xl font-extrabold opacity-0 transform translate-y-4 md:text-6xl text-brand-primary animate-fade-in-up"
                style="animation-delay: 100ms;">{{ __('أسطول معدات متكامل') }}</h1>
            <p class="mx-auto max-w-2xl text-lg font-medium leading-relaxed opacity-0 transform translate-y-4 text-gray-600 animate-fade-in-up"
                style="animation-delay: 200ms;">
                {{ __('نمـتلك أسطولاً حديثاً وشاملاً من المعدات الثقيلة والآليات المتطورة التي تضمن تنفيذ أكبر المشاريع بكفاءة وسرعة فائقة.') }}</p>
        </div>
    </section>

    <!-- Equipment List -->
    <section class="py-24 bg-white border-t border-gray-100">
        <div class="container px-4 mx-auto max-w-7xl md:px-6">
            @php 
                $categories = \App\Models\EquipmentCategory::orderBy('id')->get();
            @endphp
            
            @forelse($categories as $category)
                @php $items = $equipment->where('category_id', $category->id); @endphp
                
                @if($items->count() > 0)
                <div class="mb-20 last:mb-0">
                    <h2 class="text-3xl font-bold text-brand-primary mb-8 border-r-4 border-brand-secondary pr-6" style="border-right-color: #C69A72;">
                        {{ $category->name }}
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($items as $item)
                        <div class="bg-gray-50 rounded-2xl border border-gray-100 p-6 flex flex-col items-center text-center shadow-sm hover:shadow-lg transition-shadow duration-300">
                            @if($item->main_image)
                                <img src="{{ $item->imageUrl('main_image') }}" alt="{{ $item->name }}" class="w-full h-40 object-cover rounded-xl mb-4">
                            @else
                                <div class="w-full h-40 bg-gray-200 rounded-xl mb-4 flex items-center justify-center text-gray-400">
                                    <x-heroicon-o-truck class="w-12 h-12"/>
                                </div>
                            @endif
                            <h3 class="font-bold text-brand-primary mb-2">{{ $item->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $item->manufacturer }} {{ $item->model_year ? '- ' . $item->model_year : '' }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            @empty
                <div class="text-center py-20 bg-gray-50 rounded-2xl border border-gray-100">
                    <x-heroicon-o-truck class="w-16 h-16 mx-auto text-gray-400 mb-4"/>
                    <h3 class="text-2xl font-bold text-brand-primary mb-2">{{ __('جاري تحديث قائمة المعدات') }}</h3>
                    <p class="text-gray-500">{{ __('لم يتم إضافة معدات بعد. يرجى زيارة الصفحة لاحقاً.') }}</p>
                </div>
            @endforelse
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
