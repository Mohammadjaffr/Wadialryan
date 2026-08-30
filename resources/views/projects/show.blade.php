<x-layouts.app :title="$project->title . ' | وادي الريان للمقاولات'" :meta-description="$project->description">

    <!-- Project Hero Section -->
    <section class="relative h-[60vh] min-h-[500px] flex items-end pb-20 overflow-hidden bg-brand-background mt-20">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0 bg-brand-primary">
            @if ($project->images)
                <img src="{{ url($project->images[0]) }}" onerror="this.style.opacity='0'" alt="{{ $project->title }}"
                    class="w-full h-full object-cover">
            @else
                <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop')] bg-cover bg-center mix-blend-overlay opacity-30">
                </div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-brand-primary via-brand-primary/80 to-transparent"></div>
        </div>

        <div class="relative z-10 container mx-auto px-4 md:px-6">
            <div class="max-w-4xl">
                <!-- Breadcrumbs -->
                <nav class="flex text-sm text-white/60 mb-8 backdrop-blur-sm bg-black/20 px-4 py-2 rounded-full w-max border border-white/10"
                    aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse font-medium">
                        <li class="inline-flex items-center">
                            <a href="/"
                                class="inline-flex items-center hover:text-brand-orange transition-colors">
                                الرئيسية
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mx-1 rtl:rotate-180" aria-hidden="true" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                                <a href="/projects" class="hover:text-brand-orange transition-colors">مشاريعنا</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mx-1 rtl:rotate-180" aria-hidden="true" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span class="text-white">{{ $project->title }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <h1 class="text-4xl md:text-6xl font-black text-white mb-8 leading-tight">{{ $project->title }}</h1>

                <div class="flex flex-wrap gap-8 text-brand-primary font-medium bg-white/90 backdrop-blur-md p-6 rounded-2xl border border-gray-100 shadow-soft">
                    @if ($project->location)
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-brand-secondary/10 flex items-center justify-center text-brand-secondary">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <span class="text-lg">{{ $project->location }}</span>
                        </div>
                    @endif
                    @if ($project->completion_date)
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-brand-secondary/10 flex items-center justify-center text-brand-secondary">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-lg">تاريخ الإنجاز:
                                {{ \Carbon\Carbon::parse($project->completion_date)->format('Y/m') }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Project Content -->
    <section class="py-24 bg-brand-background relative overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-brand-secondary/5 rounded-full blur-3xl -mr-48 -mt-48 pointer-events-none"></div>

        <div class="container mx-auto px-4 md:px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                <!-- Main Description -->
                <div class="lg:col-span-8">
                    <div class="bg-white p-10 md:p-14 rounded-[2.5rem] border border-gray-100 shadow-card">
                        <h2 class="text-3xl font-bold text-brand-primary mb-8 border-r-4 border-brand-secondary pr-6" style="border-right-color: #D4A373;">
                            {{ __('عن المشروع') }}</h2>
                        <div class="prose prose-brand max-w-none prose-p:text-brand-muted prose-p:leading-relaxed prose-p:text-lg prose-headings:text-brand-primary prose-a:text-brand-secondary">
                            {!! $project->description !!}
                        </div>
                    </div>
                </div>

                <!-- Sidebar / Gallery -->
                <div class="lg:col-span-4">
                    <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-card sticky top-32">
                        <h3 class="text-2xl font-bold text-brand-primary mb-6 border-b border-gray-100 pb-4">
                            {{ __('معرض الصور') }}</h3>

                        @if ($project->images && is_array($project->images) && count($project->images) > 0)
                            <div class="grid grid-cols-1 gap-5 gallery-grid">
                                @foreach ($project->images as $index => $image)
                                    <a href="{{ url($image) }}" data-fslightbox="gallery"
                                        class="block relative group rounded-2xl overflow-hidden {{ $index === 0 ? 'aspect-[4/3]' : 'aspect-video' }} bg-gray-100 border border-gray-100 shadow-sm">
                                        <img src="{{ url($image) }}" onerror="this.style.opacity='0'"
                                            alt="{{ $project->title }} - صوره {{ $index + 1 }}"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                        <div class="absolute inset-0 bg-brand-primary/10 group-hover:bg-transparent transition-colors duration-300">
                                        </div>
                                        <!-- Enlarge Icon -->
                                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <div class="bg-brand-secondary text-white p-3.5 rounded-full transform scale-50 group-hover:scale-100 transition-transform duration-300 shadow-lg">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2.5"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="py-12 flex flex-col items-center justify-center text-center">
                                <div class="w-16 h-16 rounded-full bg-brand-primary/5 flex items-center justify-center text-brand-primary/50 mb-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="text-brand-muted font-medium">{{ __('لا توجد صور إضافية للمشروع.') }}</p>
                            </div>
                        @endif

                        <div class="mt-8 pt-8 border-t border-gray-100 text-center">
                            <a href="/contact"
                                class="inline-flex w-full justify-center items-center gap-2 px-6 py-4 bg-brand-secondary text-white font-bold rounded-xl hover:bg-brand-primary transition-all duration-300 shadow-soft hover:shadow-card hover:-translate-y-1">
                                {{ __('استفسر عن مشروع مماثل') }}
                                <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to action -->
    <section class="py-24 bg-brand-secondary relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white/20 via-transparent to-transparent opacity-50"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6 drop-shadow-sm">{{ __('هل لديك مشروع قادم؟') }}
            </h2>
            <p class="text-white/90 text-xl max-w-2xl mx-auto mb-10 font-medium leading-relaxed">
                {{ __('نحن مستعدون لتحويل أفكارك إلى واقع ملموس بمعايير الجودة التي تعودت عليها من وادي الريان.') }}
            </p>
            <a href="/contact"
                class="inline-flex items-center justify-center px-12 py-5 bg-white text-brand-primary rounded-full font-bold text-lg hover:bg-brand-background transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                {{ __('اتصل بنا الآن') }}
            </a>
        </div>
    </section>

    <!-- Include Fslightbox for image gallery -->
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.4.1/index.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                if (typeof gsap !== 'undefined') {
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
                }
            });
        </script>
    @endpush

</x-layouts.app>
