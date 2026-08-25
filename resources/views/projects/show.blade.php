<x-layouts.app :title="$project->title . ' | وادي الريان للمقاولات'" :meta-description="$project->description">
    
    <!-- Project Hero Section -->
    <section class="relative h-[60vh] min-h-[500px] flex items-end pb-20 overflow-hidden bg-brand-dark mt-20">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ $project->images ? url($project->images[0]) : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop' }}" 
                 alt="{{ $project->title }}" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-brand-dark via-brand-dark/80 to-transparent"></div>
        </div>
        
        <div class="relative z-10 container mx-auto px-4 md:px-6">
            <div class="max-w-4xl">
                <!-- Breadcrumbs -->
                <nav class="flex text-sm text-gray-400 mb-6" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="/" class="inline-flex items-center hover:text-brand-orange transition-colors">
                                الرئيسية
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mx-1 rtl:rotate-180" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                <a href="/#projects" class="hover:text-brand-orange transition-colors">مشاريعنا</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mx-1 rtl:rotate-180" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                <span class="text-white">{{ $project->title }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight">{{ $project->title }}</h1>
                
                <div class="flex flex-wrap gap-6 text-gray-300 font-medium">
                    @if($project->location)
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>{{ $project->location }}</span>
                    </div>
                    @endif
                    @if($project->completion_date)
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>تاريخ الإنجاز: {{ \Carbon\Carbon::parse($project->completion_date)->format('Y/m') }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Project Content -->
    <section class="py-20 bg-brand-dark">
        <div class="container mx-auto px-4 md:px-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Main Description -->
                <div class="lg:col-span-2">
                    <div class="prose prose-invert prose-brand max-w-none">
                        <h2 class="text-3xl font-bold text-white mb-6 border-r-4 border-brand-orange pr-4">عن المشروع</h2>
                        <div class="text-gray-300 leading-relaxed text-lg">
                            {!! $project->description !!}
                        </div>
                    </div>
                </div>

                <!-- Sidebar / Gallery -->
                <div class="lg:col-span-1">
                    <div class="bg-brand-surface p-8 rounded-3xl border border-white/5 sticky top-32">
                        <h3 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4">معرض الصور</h3>
                        
                        @if($project->images && is_array($project->images) && count($project->images) > 0)
                            <div class="grid grid-cols-1 gap-4 gallery-grid">
                                @foreach($project->images as $index => $image)
                                    <a href="{{ url($image) }}" data-fslightbox="gallery" class="block relative group rounded-2xl overflow-hidden {{ $index === 0 ? 'aspect-video' : 'aspect-square' }}">
                                        <img src="{{ url($image) }}" alt="{{ $project->title }} - صوره {{ $index + 1 }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        <div class="absolute inset-0 bg-brand-dark/30 group-hover:bg-transparent transition-colors duration-300"></div>
                                        <!-- Enlarge Icon -->
                                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <div class="bg-brand-orange/90 text-brand-dark p-3 rounded-full backdrop-blur-sm transform scale-50 group-hover:scale-100 transition-transform duration-300">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-400 text-center py-8">لا توجد صور إضافية للمشروع.</p>
                        @endif

                        <div class="mt-8 pt-6 border-t border-white/10 text-center">
                            <a href="/contact" class="inline-block w-full px-6 py-3 bg-brand-orange text-brand-dark font-bold rounded-full hover:bg-brand-amber transition-colors text-center">
                                استفسر عن مشروع مماثل
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to action -->
    <section class="py-20 bg-brand-orange relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern opacity-10"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h2 class="text-3xl md:text-5xl font-black text-brand-dark mb-6">هل لديك مشروع قادم؟</h2>
            <p class="text-brand-dark/80 text-xl max-w-2xl mx-auto mb-10 font-medium">نحن مستعدون لتحويل أفكارك إلى واقع ملموس بمعايير الجودة التي تعودت عليها من وادي الريان.</p>
            <a href="/contact" class="inline-flex items-center justify-center px-10 py-4 bg-brand-dark text-white rounded-full font-bold text-lg hover:bg-black transition-colors shadow-xl">
                اتصل بنا الآن
            </a>
        </div>
    </section>

    <!-- Include Fslightbox for image gallery -->
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.4.1/index.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            gsap.from('.gallery-grid a', {
                scrollTrigger: {
                    trigger: '.gallery-grid',
                    start: 'top 80%',
                },
                y: 50,
                opacity: 0,
                duration: 0.8,
                stagger: 0.2,
                ease: 'power3.out'
            });
        });
    </script>
    @endpush

</x-layouts.app>
