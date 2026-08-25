<x-layouts.app>
    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden bg-brand-dark" id="hero-section">
        <!-- Parallax Background -->
        <div class="absolute inset-0 z-0 hero-bg scale-110">
            <img src="https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=1920&auto=format&fit=crop" onerror="this.style.display='none'" alt="Construction Hero" class="w-full h-full object-cover">
            <!-- Premium gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-brand-dark via-brand-dark/80 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-brand-dark/90 to-transparent"></div>
        </div>
        
        <div class="relative z-10 container mx-auto px-4 md:px-6 mt-20">
            <div class="max-w-4xl">
                <!-- Staggered Title -->
                <div class="overflow-hidden mb-2">
                    <span class="block text-brand-orange font-bold tracking-[0.2em] uppercase text-sm md:text-base hero-text-line">وادي الريان للمقاولات</span>
                </div>
                
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white mb-8 leading-[1.1] tracking-tight">
                    <div class="overflow-hidden"><span class="block hero-text-line">نبني رؤيتك،</span></div>
                    <div class="overflow-hidden"><span class="block hero-text-line text-brand-orange">بإتقان يفوق الخيال.</span></div>
                </h1>
                
                <div class="overflow-hidden mb-12">
                    <p class="text-xl md:text-2xl text-gray-300 max-w-2xl font-light hero-text-line leading-relaxed">
                        نصنع فارقاً في عالم المقاولات بتصاميم عصرية وتنفيذ احترافي يضمن أعلى معايير الجودة العالمية منذ أكثر من عقدين.
                    </p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-6 overflow-hidden">
                    <a href="/contact" class="hero-btn inline-flex justify-center items-center px-10 py-4 bg-brand-orange text-brand-dark rounded-full font-bold text-lg hover:bg-brand-amber transition-colors shadow-[0_0_20px_rgba(212,175,55,0.3)]">
                        ابدأ مشروعك
                        <svg class="w-5 h-5 mr-3 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                    <a href="#services" class="hero-btn inline-flex justify-center items-center px-10 py-4 bg-white/5 backdrop-blur-sm border border-white/10 text-white rounded-full font-bold text-lg hover:bg-white/10 transition-colors">
                        اكتشف خدماتنا
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-10 flex flex-col items-center gap-2 opacity-60 hover:opacity-100 transition-opacity cursor-pointer scroll-indicator">
            <span class="text-xs uppercase tracking-widest text-white rotate-90 mb-4 font-light">تمرير</span>
            <div class="w-[1px] h-16 bg-white/30 relative overflow-hidden">
                <div class="w-full h-full bg-brand-orange absolute top-0 left-0 scroll-line"></div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-32 bg-brand-surface relative z-20">
        <div class="container mx-auto px-4 md:px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-20 section-header">
                <div class="max-w-2xl">
                    <span class="text-brand-orange font-bold tracking-wider uppercase text-sm mb-4 block">مجالات التميز</span>
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">خدمات هندسية متكاملة</h2>
                </div>
                <p class="text-gray-400 max-w-md text-lg leading-relaxed md:text-left mt-6 md:mt-0">نقدم حلولاً شاملة تلبي احتياجات مشاريعك بدءاً من الفكرة وحتى التسليم، مع ضمان الجودة.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                @forelse($services as $index => $service)
                <div class="service-card {{ $index == 1 ? 'md:translate-y-12' : ($index == 2 ? 'md:translate-y-24' : '') }} group bg-brand-dark p-10 rounded-[2rem] border border-white/5 hover:border-brand-orange/50 transition-colors duration-500 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-brand-orange/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="w-20 h-20 bg-brand-surface rounded-2xl flex items-center justify-center mb-8 text-brand-orange relative z-10">
                        @if($service->icon)
                            {!! $service->icon !!}
                        @else
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        @endif
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4 relative z-10">{{ $service->title }}</h3>
                    <p class="text-gray-400 mb-8 leading-relaxed relative z-10 group-hover:text-gray-300 transition-colors">{{ Str::limit(strip_tags($service->description), 100) }}</p>
                </div>
                @empty
                <p class="text-gray-400 col-span-3 text-center">لا توجد خدمات مضافة حالياً.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Projects Gallery Grid -->
    <section class="py-32 bg-brand-dark">
        <div class="container mx-auto px-4 md:px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 projects-header">
                <div>
                    <span class="text-brand-orange font-bold tracking-wider uppercase text-sm mb-4 block">أعمالنا المميزة</span>
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4">أحدث المشاريع</h2>
                </div>
                <a href="/projects" class="hidden md:flex items-center gap-2 text-gray-300 font-bold hover:text-brand-orange transition-colors">
                    استعراض السجل الكامل
                    <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <!-- Premium Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 h-[800px] md:h-[600px] project-grid">
                @if($projects->count() > 0)
                    <!-- Large Project (Left) -->
                    <a href="{{ route('projects.show', $projects[0]) }}" class="project-item md:col-span-8 relative group rounded-3xl overflow-hidden block">
                        <img src="{{ !empty($projects[0]->images) ? url($projects[0]->images[0]) : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop' }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" alt="{{ $projects[0]->title }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-dark via-brand-dark/40 to-transparent opacity-90 group-hover:opacity-80 transition-opacity duration-500"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-10 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <div class="flex justify-between items-end">
                                <div>
                                    <span class="text-brand-orange font-bold tracking-widest text-sm mb-3 block">{{ $projects[0]->location ?? 'مشروع متميز' }}</span>
                                    <h3 class="text-white text-4xl font-black">{{ $projects[0]->title }}</h3>
                                </div>
                                <div class="w-12 h-12 rounded-full border border-white/30 flex items-center justify-center text-white backdrop-blur-sm group-hover:bg-brand-orange group-hover:border-brand-orange group-hover:text-brand-dark transition-all duration-300">
                                    <svg class="w-5 h-5 -rotate-45 rtl:rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                    @if($projects->count() > 1)
                    <div class="md:col-span-4 grid grid-rows-2 gap-6">
                        @foreach($projects->skip(1) as $project)
                        <!-- Small Project -->
                        <a href="{{ route('projects.show', $project) }}" class="project-item relative group rounded-3xl overflow-hidden block">
                            <img src="{{ !empty($project->images) ? url($project->images[0]) : 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=800&auto=format&fit=crop' }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" alt="{{ $project->title }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-brand-dark to-transparent opacity-90 group-hover:opacity-80 transition-opacity duration-500"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-8 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <span class="text-brand-orange font-bold tracking-widest text-xs mb-2 block">{{ $project->location ?? 'مشروع' }}</span>
                                <h3 class="text-white text-2xl font-bold">{{ $project->title }}</h3>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endif
                @else
                    <div class="md:col-span-12 text-center py-20 text-gray-400">
                        لا توجد مشاريع مضافة حالياً.
                    </div>
                @endif
            </div>
            
            <div class="mt-12 text-center md:hidden">
                <a href="/projects" class="inline-flex items-center gap-2 text-brand-orange font-bold hover:text-brand-amber transition">
                    عرض كل المشاريع
                    <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- About Us / Stats Section -->
    <section class="py-32 bg-brand-surface relative overflow-hidden">
        <!-- Abstract Background Element -->
        <div class="absolute -top-[30%] -right-[10%] w-[70%] h-[150%] bg-brand-dark rounded-full blur-[120px] opacity-50 z-0"></div>
        
        <div class="container mx-auto px-4 md:px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="relative about-image">
                    <div class="aspect-square rounded-[3rem] overflow-hidden border border-white/10 relative">
                        <img src="https://images.unsplash.com/photo-1581094722700-1c5c7d0a7cb5?q=80&w=1000&auto=format&fit=crop" alt="About Us" class="w-full h-full object-cover">
                    </div>
                    <!-- Floating Stat Badge -->
                    <div class="absolute -bottom-10 -right-10 bg-brand-dark/80 backdrop-blur-xl border border-white/10 p-8 rounded-[2rem] shadow-glass z-20 hidden md:flex flex-col items-center justify-center min-w-[200px] stat-badge">
                        <span class="text-5xl font-black text-brand-orange mb-2"><span class="counter" data-target="20">0</span>+</span>
                        <span class="text-gray-300 font-semibold tracking-wider text-sm uppercase">عاماً من الخبرة</span>
                    </div>
                </div>
                
                <div class="about-content">
                    <span class="text-brand-orange font-bold tracking-wider uppercase text-sm mb-4 block">هويتنا</span>
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-8 leading-tight">الريادة في صناعة المستقبل العمراني</h2>
                    <p class="text-xl text-gray-400 leading-relaxed mb-12 font-light">
                        نحن لسنا مجرد مقاولين، نحن شركاء في تجسيد رؤيتك. نجمع بين الخبرة العميقة والتقنيات المبتكرة لتقديم مشاريع تتجاوز التوقعات وتصمد أمام اختبار الزمن.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-10 mb-12 border-t border-white/10 pt-12">
                        <div>
                            <div class="text-5xl font-black text-white mb-3"><span class="counter" data-target="150">0</span>+</div>
                            <div class="text-gray-400 font-medium">مشروع منجز</div>
                        </div>
                        <div>
                            <div class="text-5xl font-black text-white mb-3"><span class="counter" data-target="100">0</span>%</div>
                            <div class="text-gray-400 font-medium">رضا العملاء</div>
                        </div>
                    </div>

                    <a href="/contact" class="inline-flex items-center justify-center px-10 py-5 bg-white text-brand-dark rounded-full font-bold text-lg hover:bg-gray-200 transition-colors">
                        تواصل مع خبرائنا
                    </a>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // GSAP Animations setup
            
            // Hero Animation
            const tl = gsap.timeline();
            
            tl.to('.hero-bg img', {
                scale: 1,
                duration: 2,
                ease: 'power3.out'
            })
            .fromTo('.hero-text-line', 
                { y: 100, opacity: 0 }, 
                { y: 0, opacity: 1, duration: 1, stagger: 0.15, ease: 'power4.out' },
                "-=1.5"
            )
            .fromTo('.hero-btn',
                { y: 30, opacity: 0 },
                { y: 0, opacity: 1, duration: 0.8, stagger: 0.1, ease: 'back.out(1.7)' },
                "-=0.8"
            )
            .fromTo('.scroll-indicator',
                { opacity: 0 },
                { opacity: 0.6, duration: 1 },
                "-=0.5"
            );

            // Scroll Line Animation
            gsap.to('.scroll-line', {
                yPercent: 100,
                ease: 'none',
                repeat: -1,
                duration: 1.5
            });

            // Services Animation
            gsap.from('.section-header', {
                scrollTrigger: {
                    trigger: '#services',
                    start: 'top 80%',
                },
                y: 50,
                opacity: 0,
                duration: 1,
                ease: 'power3.out'
            });

            gsap.from('.service-card', {
                scrollTrigger: {
                    trigger: '.service-card',
                    start: 'top 85%',
                },
                y: 100,
                opacity: 0,
                duration: 0.8,
                stagger: 0.2,
                ease: 'power3.out'
            });

            // Projects Animation
            gsap.from('.projects-header', {
                scrollTrigger: {
                    trigger: '.projects-header',
                    start: 'top 85%',
                },
                y: 50,
                opacity: 0,
                duration: 1,
                ease: 'power3.out'
            });

            gsap.from('.project-item', {
                scrollTrigger: {
                    trigger: '.project-grid',
                    start: 'top 80%',
                },
                scale: 0.95,
                opacity: 0,
                duration: 1,
                stagger: 0.2,
                ease: 'power3.out'
            });

            // About Section & Counters
            gsap.from('.about-image', {
                scrollTrigger: {
                    trigger: '.about-image',
                    start: 'top 80%',
                },
                x: 100,
                opacity: 0,
                duration: 1.2,
                ease: 'power3.out'
            });

            gsap.from('.about-content', {
                scrollTrigger: {
                    trigger: '.about-image',
                    start: 'top 80%',
                },
                x: -100,
                opacity: 0,
                duration: 1.2,
                ease: 'power3.out'
            });

            gsap.from('.stat-badge', {
                scrollTrigger: {
                    trigger: '.stat-badge',
                    start: 'top 90%',
                },
                y: 50,
                opacity: 0,
                scale: 0.8,
                duration: 0.8,
                delay: 0.5,
                ease: 'back.out(1.5)'
            });

            // Counters Animation
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                ScrollTrigger.create({
                    trigger: counter,
                    start: 'top 90%',
                    onEnter: () => {
                        const target = +counter.getAttribute('data-target');
                        gsap.to(counter, {
                            innerHTML: target,
                            duration: 2,
                            snap: { innerHTML: 1 },
                            ease: 'power2.out'
                        });
                    },
                    once: true
                });
            });
        });
    </script>
    @endpush
</x-layouts.app>
