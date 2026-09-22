<x-layouts.app>
    <x-slot:title>{{ __('المعدات - وادي الريان للمقاولات') }}</x-slot>
    
    <!-- Header -->
    <section class="flex overflow-hidden relative justify-center items-center pt-40 pb-24 bg-gray-50">
        <div class="absolute inset-0 z-0 bg-gradient-to-br from-gray-50 to-white"></div>
        <div class="absolute inset-0 opacity-20 z-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-secondary/20 via-transparent to-transparent"></div>
        
        <div class="container relative z-10 px-4 mx-auto text-center">
            <div class="mb-4 opacity-0 transform translate-y-4 animate-fade-in-up">
                <span class="inline-flex items-center gap-2 px-4 py-2 mb-2 rounded-full bg-brand-primary/10 text-brand-primary text-sm font-bold tracking-wide">
                    <x-heroicon-s-truck class="w-4 h-4" />
                    {{ __('الآليات والمعدات الثقيلة') }}
                </span>
            </div>
            <h1 class="mb-6 text-4xl font-extrabold text-brand-primary opacity-0 transform translate-y-4 md:text-6xl animate-fade-in-up" style="animation-delay: 100ms;">{{ __('أسطول معدات متكامل') }}</h1>
            <p class="mx-auto max-w-2xl text-lg font-medium leading-relaxed opacity-0 transform translate-y-4 text-gray-600 animate-fade-in-up" style="animation-delay: 200ms;">{{ __('نمتلك أسطولاً حديثاً وشاملاً من المعدات الثقيلة والآليات المتطورة التي تضمن تنفيذ أكبر المشاريع بكفاءة وسرعة فائقة.') }}</p>
        </div>  
    </section>

    <!-- Equipment Section with Alpine.js filtering and Structured Grid Layout -->
    <section class="overflow-hidden relative py-24 min-h-screen bg-white border-t border-gray-100" x-data="{ category: 'all', init() { setTimeout(() => window.dispatchEvent(new Event('resize')), 500) } }">
        <div class="absolute left-0 top-20 -ml-48 w-96 h-96 rounded-full blur-3xl pointer-events-none bg-brand-secondary/5"></div>
        <div class="absolute right-0 bottom-20 -mr-48 w-96 h-96 rounded-full blur-3xl pointer-events-none bg-brand-primary/5"></div>

        <div class="container relative z-10 px-4 mx-auto md:px-6">
            @php 
                $categories = \App\Models\EquipmentCategory::orderBy('id')->get();
                $equipmentList = $equipment; // From controller
            @endphp
            
            <!-- Filters -->
            @if($categories->count() > 0)
            <div class="flex flex-wrap gap-3 justify-center mb-16 md:gap-4">
                <button @click="category = 'all'" :class="category === 'all' ? 'bg-brand-secondary text-white shadow-lg' : 'bg-white text-brand-primary border-gray-200 hover:bg-gray-50'" class="px-8 py-3 font-bold rounded-full border transition-all duration-300">{{ __('الكل') }}</button>
                @foreach($categories as $cat)
                <button @click="category = '{{ $cat->id }}'" :class="category === '{{ $cat->id }}' ? 'bg-brand-secondary text-white shadow-lg' : 'bg-white text-brand-primary border-gray-200 hover:bg-gray-50'" class="px-8 py-3 font-bold rounded-full border transition-all duration-300">{{ $cat->name }}</button>
                @endforeach
            </div>
            @endif

            <!-- Structured CSS Grid -->
            <div class="grid grid-cols-1 gap-8 pb-10 md:grid-cols-2 lg:grid-cols-3">
                @forelse($equipmentList as $item)
                    <div x-show="category === 'all' || category === '{{ $item->category_id }}'" 
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-10"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="project-card flex flex-col h-full rounded-[2rem] bg-white border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-500 group overflow-hidden hover:-translate-y-2 cursor-pointer">
                        <a href="{{ route('equipment.show', $item->slug) }}" class="flex flex-col w-full h-full">
                            <div class="relative overflow-hidden aspect-[4/3] w-full bg-gray-100">
                                @if($item->main_image)
                                    <img src="{{ $item->imageUrl('main_image') }}" alt="{{ $item->name }}" class="object-cover relative z-10 w-full h-full transition-transform duration-700 group-hover:scale-105">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-300 bg-gray-100">
                                        <x-heroicon-o-truck class="w-20 h-20"/>
                                    </div>
                                @endif
                                
                                <div class="absolute inset-0 z-20 transition-colors duration-500 bg-brand-primary/10 group-hover:bg-transparent"></div>
                                
                                <!-- Status Badge -->
                                @php
                                    $statusColors = [
                                        'available' => 'bg-emerald-500 text-white',
                                        'rented' => 'bg-amber-500 text-white',
                                        'maintenance' => 'bg-red-500 text-white',
                                    ];
                                    $statusLabels = [
                                        'available' => __('متاح'),
                                        'rented' => __('مؤجر'),
                                        'maintenance' => __('صيانة'),
                                    ];
                                    $statusColor = $statusColors[$item->availability_status] ?? 'bg-gray-500 text-white border-gray-100';
                                    $statusLabel = $statusLabels[$item->availability_status] ?? __('غير معروف');
                                @endphp
                                <div class="absolute top-4 right-4 z-30 px-4 py-1.5 text-xs font-bold rounded-full shadow-md backdrop-blur-md transition-all duration-300 transform border border-transparent group-hover:-translate-y-1 {{ $statusColor }}">
                                    {{ $statusLabel }}
                                </div>
                            </div>
                            
                            <div class="flex relative z-10 flex-col flex-grow p-8 bg-white">
                                <h3 class="mb-3 text-2xl font-bold text-brand-primary transition-colors duration-300 group-hover:text-brand-secondary line-clamp-2">{{ $item->name }}</h3>
                                
                                <div class="flex-grow mb-6 grid grid-cols-2 gap-y-3 gap-x-2 text-sm font-medium text-gray-600">
                                    @if($item->manufacturer)
                                    <div class="flex items-center gap-2">
                                        <x-heroicon-o-building-office-2 class="w-4 h-4 text-brand-secondary flex-shrink-0" />
                                        <span class="truncate">{{ $item->manufacturer }}</span>
                                    </div>
                                    @endif
                                    
                                    @if($item->year)
                                    <div class="flex items-center gap-2">
                                        <x-heroicon-o-calendar class="w-4 h-4 text-brand-secondary flex-shrink-0" />
                                        <span>{{ $item->year }}</span>
                                    </div>
                                    @endif
                                    
                                    @if($item->capacity)
                                    <div class="flex items-center gap-2 col-span-2">
                                        <x-heroicon-o-arrows-pointing-out class="w-4 h-4 text-brand-secondary flex-shrink-0" />
                                        <span class="truncate">{{ $item->capacity }}</span>
                                    </div>
                                    @endif
                                </div>
                                
                                <div class="flex justify-between items-center pt-6 mt-auto border-t border-gray-100">
                                    <span class="flex gap-2 items-center text-sm font-bold text-brand-secondary bg-brand-secondary/10 px-3 py-1 rounded-full">
                                        {{ $item->category ? $item->category->name : __('معدة') }}
                                    </span>
                                    <div class="flex items-center text-sm font-bold text-brand-primary transition-colors group-hover:text-brand-secondary">
                                        {{ __('عرض التفاصيل') }}
                                        <x-heroicon-o-arrow-right class="mx-2 w-4 h-4 transition-transform transform rtl:rotate-180 group-hover:{{ app()->getLocale() == 'ar' ? '-translate-x-1' : 'translate-x-1' }}"/>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20 bg-white rounded-2xl border border-gray-100 mt-8 shadow-sm">
                        <h3 class="mb-3 text-2xl font-bold text-brand-primary">{{ __('جاري تحديث قائمة المعدات') }}</h3>
                        <p class="text-lg font-medium text-gray-500">{{ __('لم نتمكن من العثور على معدات حالياً. يرجى زيارة الصفحة لاحقاً.') }}</p>
                    </div>
                @endforelse
            </div>
            
            <!-- Empty State / Fallback (if filtered by Alpine) -->
            <div x-show="!$el.previousElementSibling.querySelector('.project-card[style*=\'display: block\'], .project-card:not([style*=\'display: none\'])')" style="display: none;" class="text-center py-20 bg-white rounded-[2rem] border border-gray-100 mt-8 shadow-sm">
                <div class="inline-flex justify-center items-center mb-6 w-24 h-24 rounded-full bg-brand-primary/5 text-brand-primary">
                    <x-heroicon-o-exclamation-circle class="w-12 h-12"/>
                </div>
                <h3 class="mb-3 text-3xl font-bold text-brand-primary">{{ __('لا توجد معدات') }}</h3>
                <p class="text-lg font-medium text-gray-500">{{ __('لم نتمكن من العثور على معدات في هذا التصنيف.') }}</p>
            </div>
            
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
