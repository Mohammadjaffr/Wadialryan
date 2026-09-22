<x-layouts.app :title="($equipment->meta_title ?? $equipment->name) . ' | وادي الريان للمقاولات'" :meta-description="$equipment->meta_description ?? strip_tags($equipment->description)">

    <!-- Equipment Hero Section -->
    <section class="relative h-[60vh] min-h-[500px] flex items-end pb-20 overflow-hidden bg-gray-50 mt-20">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0 bg-brand-primary">
            @if ($equipment->main_image)
                <img src="{{ $equipment->imageUrl('main_image') }}" onerror="this.style.opacity='0'" alt="{{ $equipment->name }}" class="w-full h-full object-cover">
            @else
                <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=2070&auto=format&fit=crop')] bg-cover bg-center mix-blend-overlay opacity-30"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-brand-primary via-brand-primary/80 to-brand-primary/20"></div>
        </div>

        <div class="relative z-10 container mx-auto px-4 md:px-6">
            <div class="w-full">
                <!-- Breadcrumbs -->
                <nav class="flex text-sm text-white/60 mb-8 backdrop-blur-sm bg-black/20 px-4 py-2 rounded-full w-max border border-white/10" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse font-medium">
                        <li class="inline-flex items-center">
                            <a href="/" class="inline-flex items-center hover:text-brand-secondary transition-colors">{{ __('الرئيسية') }}</a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <x-heroicon-o-chevron-left class="w-4 h-4 mx-1 rtl:rotate-180"/>
                                <a href="{{ route('equipment.index') }}" class="hover:text-brand-secondary transition-colors">{{ __('المعدات') }}</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <x-heroicon-o-chevron-left class="w-4 h-4 mx-1 rtl:rotate-180"/>
                                <span class="text-white">{{ $equipment->name }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <h1 class="text-4xl md:text-6xl font-black text-white mb-10 leading-tight">{{ $equipment->name }}</h1>

                <!-- Meta Equipment Info Grid -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 text-brand-primary font-medium bg-white/95 backdrop-blur-xl p-8 rounded-3xl border border-white/50 shadow-2xl">
                    @if ($equipment->category)
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-gray-500 uppercase tracking-wider">{{ __('التصنيف') }}</span>
                            <div class="flex items-center gap-2 text-brand-primary">
                                <x-heroicon-o-tag class="w-5 h-5 text-brand-secondary"/>
                                <span class="text-sm md:text-base font-bold">{{ $equipment->category->name }}</span>
                            </div>
                        </div>
                    @endif
                    @if ($equipment->manufacturer)
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-gray-500 uppercase tracking-wider">{{ __('الشركة المصنعة') }}</span>
                            <div class="flex items-center gap-2 text-brand-primary">
                                <x-heroicon-o-building-office-2 class="w-5 h-5 text-brand-secondary"/>
                                <span class="text-sm md:text-base font-bold">{{ $equipment->manufacturer }}</span>
                            </div>
                        </div>
                    @endif
                    @if ($equipment->model)
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-gray-500 uppercase tracking-wider">{{ __('الموديل') }}</span>
                            <div class="flex items-center gap-2 text-brand-primary">
                                <x-heroicon-o-tag class="w-5 h-5 text-brand-secondary"/>
                                <span class="text-sm md:text-base font-bold">{{ $equipment->model }}</span>
                            </div>
                        </div>
                    @endif
                    @if ($equipment->year)
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-gray-500 uppercase tracking-wider">{{ __('سنة الصنع') }}</span>
                            <div class="flex items-center gap-2 text-brand-primary">
                                <x-heroicon-o-calendar class="w-5 h-5 text-brand-secondary"/>
                                <span class="text-sm md:text-base font-bold">{{ $equipment->year }}</span>
                            </div>
                        </div>
                    @endif
                    @if ($equipment->capacity)
                        <div class="flex flex-col gap-1">
                            <span class="text-xs text-gray-500 uppercase tracking-wider">{{ __('السعة / القدرة') }}</span>
                            <div class="flex items-center gap-2 text-brand-primary">
                                <x-heroicon-o-arrows-pointing-out class="w-5 h-5 text-brand-secondary"/>
                                <span class="text-sm md:text-base font-bold">{{ $equipment->capacity }}</span>
                            </div>
                        </div>
                    @endif
                    @if ($equipment->availability_status)
                        <div class="flex flex-col gap-1 lg:col-span-5 md:col-span-3 col-span-2 pt-4 mt-2 border-t border-gray-100">
                            @php
                                $statusColors = [
                                    'available' => 'text-emerald-500 bg-emerald-50 border-emerald-100',
                                    'rented' => 'text-amber-500 bg-amber-50 border-amber-100',
                                    'maintenance' => 'text-red-500 bg-red-50 border-red-100',
                                ];
                                $statusLabels = [
                                    'available' => __('متاح للعمل'),
                                    'rented' => __('مؤجر حالياً'),
                                    'maintenance' => __('في الصيانة'),
                                ];
                                $statusColor = $statusColors[$equipment->availability_status] ?? 'text-gray-500 bg-gray-50 border-gray-100';
                                $statusLabel = $statusLabels[$equipment->availability_status] ?? __('غير معروف');
                            @endphp
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-bold text-gray-500">{{ __('حالة التوفر') }}</span>
                                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border {{ $statusColor }}">
                                    <div class="w-2 h-2 rounded-full bg-current animate-pulse"></div>
                                    <span class="text-sm font-bold">{{ $statusLabel }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Equipment Content -->
    <section class="py-24 bg-gray-50 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-brand-secondary/5 rounded-full blur-3xl -mr-48 -mt-48 pointer-events-none"></div>

        <div class="container mx-auto px-4 md:px-6 relative z-10">
            <div class="flex flex-col gap-12 lg:gap-16 w-full">
                <!-- Main Description -->
                <div class="w-full min-w-0">
                    <div class="bg-white p-8 md:p-14 rounded-[2.5rem] border border-gray-100 shadow-xl">
                        @if($equipment->description)
                            <h2 class="text-3xl font-bold text-brand-primary mb-8 border-r-4 border-brand-secondary pr-6" style="border-right-color: #C69A72;">
                                {{ __('نظرة عامة') }}
                            </h2>
                            <div class="prose prose-brand max-w-none prose-p:text-gray-600 prose-p:leading-relaxed prose-p:text-lg prose-headings:text-brand-primary prose-a:text-brand-secondary">
                                {!! $equipment->description !!}
                            </div>
                        @endif
                        
                        @if($equipment->specifications)
                            <h3 class="text-2xl font-bold text-brand-primary mt-12 mb-6 flex items-center gap-3">
                                <x-heroicon-o-clipboard-document-list class="w-8 h-8 text-brand-secondary"/>
                                {{ __('المواصفات الفنية') }}
                            </h3>
                            <div class="prose prose-brand max-w-none prose-p:text-gray-600 prose-p:leading-relaxed prose-p:text-lg bg-gray-50 p-8 rounded-3xl border border-gray-100">
                                {!! $equipment->specifications !!}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Gallery -->
                <div class="w-full min-w-0 space-y-8">
                    @php
                        $hasGallery = !empty($equipment->gallery) && is_array($equipment->gallery) && count($equipment->gallery) > 0;
                    @endphp

                    @if($hasGallery)
                        <div class="bg-white p-8 md:p-14 rounded-[2.5rem] border border-gray-100 shadow-xl overflow-hidden max-w-full">
                            <div>
                                <h3 class="text-xl font-bold text-brand-primary mb-6 border-b border-gray-100 pb-4 flex items-center gap-2">
                                    <x-heroicon-o-photo class="w-6 h-6 text-brand-secondary"/>
                                    {{ __('معرض الصور') }}
                                </h3>
                                
                                <div class="space-y-6 w-full max-w-full" x-data="{ 
                                    mainImage: '{{ app(\App\Services\ImageService::class)->url($equipment->gallery[0]) }}',
                                    images: [
                                        @foreach($equipment->gallery as $image)
                                            '{{ app(\App\Services\ImageService::class)->url($image) }}',
                                        @endforeach
                                    ]
                                }">
                                    <!-- Main Image Viewer -->
                                    <div class="rounded-2xl overflow-hidden border border-gray-100 shadow-sm w-full relative group bg-gray-50 flex items-center justify-center min-h-[400px]">
                                        <template x-if="mainImage">
                                            <a :href="mainImage" data-fslightbox="main_gallery" class="block w-full h-full flex items-center justify-center">
                                                <img :src="mainImage" alt="{{ $equipment->name }}" class="w-full h-auto max-h-[600px] object-contain transition-all duration-300" x-transition>
                                            </a>
                                        </template>
                                    </div>

                                    <!-- Thumbnails Row -->
                                    <template x-if="images.length > 1">
                                        <div class="flex gap-4 overflow-x-auto pb-2 custom-scrollbar w-full max-w-full">
                                            <template x-for="(img, index) in images" :key="index">
                                                <button @click="mainImage = img" 
                                                        class="shrink-0 w-32 h-24 rounded-xl overflow-hidden border-2 shadow-sm bg-white transition-all duration-300 flex items-center justify-center"
                                                        :class="mainImage === img ? 'border-brand-primary ring-2 ring-brand-primary/20 opacity-100' : 'border-gray-100 hover:border-brand-secondary opacity-70 hover:opacity-100'">
                                                    <img :src="img" alt="Thumbnail" class="w-full h-full object-cover">
                                                </button>
                                            </template>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Call to action -->
    <section class="py-24 bg-brand-primary relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-secondary/20 via-transparent to-transparent opacity-50"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6 drop-shadow-sm">{{ __('هل تود استئجار هذه الآلية؟') }}
            </h2>
            <p class="text-white/90 text-xl max-w-2xl mx-auto mb-10 font-medium leading-relaxed">
                {{ __('تواصل معنا الآن وسنقوم بتوفير هذه المعدة أو بدائل ممتازة لتلبية احتياجات مشروعك بكفاءة عالية.') }}
            </p>
            <a href="{{ route('contact') }}"
                class="inline-flex items-center justify-center px-12 py-5 bg-brand-secondary text-white rounded-full font-bold text-lg hover:bg-white hover:text-brand-primary transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                {{ __('اتصل بنا الآن') }}
            </a>
        </div>
    </section>

    <!-- Include Fslightbox for image gallery -->
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.4.1/index.min.js"></script>
    @endpush
</x-layouts.app>