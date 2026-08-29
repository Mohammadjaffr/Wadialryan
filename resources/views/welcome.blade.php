<x-layouts.app>
    <!-- Hero Section -->
    <section class="relative w-full min-h-[85vh] flex items-center bg-brand-background overflow-hidden pt-32 pb-24" id="hero-section">
        <div class="container max-w-7xl mx-auto px-4 md:px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
            <div class="flex flex-col gap-8 max-w-2xl reveal stagger-1">
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-black text-brand-primary leading-[1.2]">
                    <div class="overflow-hidden"><span class="block hero-text-line">نبني المستقبل</span></div>
                    <div class="overflow-hidden"><span class="block hero-text-line"><span class="text-brand-secondary">بحرفية</span> وتميز</span></div>
                </h1>
                
                <div class="overflow-hidden">
                    <p class="text-lg md:text-xl text-brand-muted border-r-4 border-brand-tertiary pr-6 leading-relaxed hero-text-line">
                        نصنع فارقاً في عالم المقاولات بتصاميم عصرية وتنفيذ احترافي يضمن أعلى معايير الجودة العالمية منذ أكثر من عقدين. نحن وادي الريان، شريكك الموثوق.
                    </p>
                </div>
                
                <div class="flex flex-wrap gap-4 mt-4 overflow-hidden">
                    <a href="/contact" class="hero-btn inline-flex justify-center items-center px-8 py-4 text-lg font-bold text-white rounded-lg shadow-card transition-all duration-500 bg-brand-secondary hover:bg-brand-primary hover:shadow-soft hover:-translate-y-1">
                        ابدأ مشروعك
                        <svg class="mr-3 w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                    <a href="#services" class="hero-btn inline-flex justify-center items-center px-8 py-4 text-lg font-bold rounded-lg border-2 transition-all duration-500 bg-transparent text-brand-primary border-brand-primary hover:bg-brand-primary hover:text-white">
                        اكتشف خدماتنا
                    </a>
                </div>
            </div>
            
            <div class="relative h-[400px] md:h-[500px] lg:h-[600px] w-full rounded-2xl overflow-hidden shadow-soft border border-gray-100 reveal stagger-3 hero-image">
                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop" alt="Prestigious Architecture" class="object-cover w-full h-full transition-transform duration-700 hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-primary/40 to-transparent"></div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-brand-primary py-20 w-full relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-brand-tertiary/10 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-brand-secondary/10 rounded-full -ml-32 -mb-32"></div>
        <div class="container max-w-7xl mx-auto px-4 md:px-6 grid grid-cols-2 md:grid-cols-4 gap-8 relative z-10">
            <div class="flex flex-col items-center text-center px-4">
                <span class="text-5xl md:text-6xl font-black text-brand-secondary">20+</span>
                <span class="text-sm md:text-base font-bold text-white/70 mt-2 uppercase tracking-widest">عاماً من الخبرة</span>
            </div>
            <div class="flex flex-col items-center text-center px-4">
                <span class="text-5xl md:text-6xl font-black text-white">150+</span>
                <span class="text-sm md:text-base font-bold text-white/70 mt-2 uppercase tracking-widest">مشروع مكتمل</span>
            </div>
            <div class="flex flex-col items-center text-center px-4">
                <span class="text-5xl md:text-6xl font-black text-white">100%</span>
                <span class="text-sm md:text-base font-bold text-white/70 mt-2 uppercase tracking-widest">التزام بالمواعيد</span>
            </div>
            <div class="flex flex-col items-center text-center px-4">
                <span class="text-5xl md:text-6xl font-black text-brand-tertiary">24/7</span>
                <span class="text-sm md:text-base font-bold text-white/70 mt-2 uppercase tracking-widest">دعم فني هندسي</span>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-24 bg-white border-t border-gray-100">
        <div class="container max-w-7xl px-4 mx-auto md:px-6">
            <div class="text-center mb-20 max-w-3xl mx-auto">
                <span class="inline-flex items-center gap-2 px-4 py-2 mb-5 rounded-full bg-brand-secondary/10 text-brand-secondary text-sm font-bold tracking-wide">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    مجالاتنا
                </span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-brand-primary mb-6">مجالات التميز الهندسي</h2>
                <p class="text-lg text-brand-muted leading-relaxed">
                    نقدم حلولاً إنشائية وهندسية متكاملة عبر فريق من الخبراء لضمان تنفيذ مشاريعكم بأعلى معايير الجودة والسلامة المهنية.
                </p>
                <div class="mx-auto mt-8 w-24 h-1.5 rounded-full bg-brand-tertiary"></div>
            </div>
            
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Service 1 -->
                <div class="bg-white border-b-4 border-transparent hover:border-brand-secondary border-x border-t border-gray-100 p-10 rounded-xl shadow-card hover:shadow-soft transition-all duration-500 group">
                    <div class="mb-6 group-hover:text-brand-secondary text-brand-primary transition-colors duration-300">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold text-brand-primary">بناء عام</h3>
                    <p class="font-medium leading-relaxed text-brand-muted/90">
                        نقوم بتنفيذ أضخم المشاريع الإنشائية، بدءاً من الأبراج السكنية والمراكز التجارية وصولاً إلى المجمعات المتكاملة، مع التزام تام بالجودة.
                    </p>
                </div>

                <!-- Service 2 -->
                <div class="bg-white border-b-4 border-transparent hover:border-brand-secondary border-x border-t border-gray-100 p-10 rounded-xl shadow-card hover:shadow-soft transition-all duration-500 group">
                    <div class="mb-6 group-hover:text-brand-secondary text-brand-primary transition-colors duration-300">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold text-brand-primary">ترميم المباني</h3>
                    <p class="font-medium leading-relaxed text-brand-muted/90">
                        إعادة إحياء المباني القائمة وتحديثها عبر أحدث التقنيات لضمان استدامتها وحمايتها، مع الحفاظ على القيمة الجمالية والمعمارية.
                    </p>
                </div>

                <!-- Service 3 -->
                <div class="bg-white border-b-4 border-transparent hover:border-brand-secondary border-x border-t border-gray-100 p-10 rounded-xl shadow-card hover:shadow-soft transition-all duration-500 group">
                    <div class="mb-6 group-hover:text-brand-secondary text-brand-primary transition-colors duration-300">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold text-brand-primary">تصميم هندسي</h3>
                    <p class="font-medium leading-relaxed text-brand-muted/90">
                        تقديم تصاميم معمارية وإنشائية مبتكرة تجمع بين الجمال الوظيفي والحلول المستدامة لتلبي طموحات عملائنا بدقة واحترافية.
                    </p>
                </div>
            </div>
            
            <div class="mt-16 text-center">
                <a href="/services" class="inline-flex gap-3 items-center font-bold text-brand-primary transition-colors hover:text-brand-secondary group">
                    عرض جميع الخدمات
                    <span class="p-2 rounded-full bg-brand-tertiary/20 text-brand-tertiary group-hover:bg-brand-secondary group-hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- Projects Gallery Grid -->
    <section class="py-24 bg-brand-background border-t border-gray-100">
        <div class="container max-w-7xl px-4 mx-auto md:px-6">
            <div class="flex flex-col justify-between items-end mb-16 md:flex-row">
                <div class="max-w-2xl">
                    <span class="inline-flex items-center gap-2 px-4 py-2 mb-4 rounded-full bg-brand-primary/10 text-brand-primary text-sm font-bold tracking-wide">
                        أبرز المشاريع
                    </span>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-brand-primary">سجل حافل بالإنجازات</h2>
                </div>
                <a href="/projects" class="hidden gap-3 items-center font-bold text-brand-primary transition-colors md:flex hover:text-brand-secondary group">
                    استعراض السجل الكامل
                    <span class="p-2 rounded-full bg-brand-tertiary/20 text-brand-tertiary group-hover:bg-brand-secondary group-hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </span>
                </a>
            </div>

            <!-- Projects Card Gallery -->
            <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3">
                @forelse($projects->take(3) ?? [] as $project)
                    <a href="{{ route('projects.show', $project) }}" class="flex flex-col h-full rounded-2xl bg-white border border-gray-100 shadow-card hover:shadow-soft transition-all duration-500 group overflow-hidden hover:-translate-y-2">
                        <div class="relative overflow-hidden aspect-video bg-gray-100">
                            <img src="{{ !empty($project->images) ? url($project->images[0]) : 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=600&auto=format&fit=crop' }}" class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-105" alt="{{ $project->title }}">
                            <div class="absolute inset-0 transition-colors duration-500 bg-brand-primary/10 group-hover:bg-transparent"></div>
                            
                            <!-- Date Badge -->
                            <div class="absolute top-4 left-4 px-4 py-1.5 text-xs font-bold rounded-full shadow-md bg-white text-brand-primary border border-gray-100">
                                {{ $project->completed_at ? \Carbon\Carbon::parse($project->completed_at)->format('Y/m/d') : 'قريباً' }}
                            </div>
                        </div>
                        
                        <div class="flex flex-col flex-grow justify-between p-8">
                            <div>
                                <div class="flex justify-between items-center mb-4">
                                    <span class="px-3 py-1 text-xs font-bold tracking-wider rounded-full text-brand-secondary bg-brand-secondary/10">{{ $project->location ?? 'الرياض' }}</span>
                                </div>
                                <h3 class="mb-4 text-2xl font-bold text-brand-primary transition-colors group-hover:text-brand-secondary">{{ $project->title }}</h3>
                                <p class="mb-6 text-base font-medium leading-relaxed text-brand-muted line-clamp-3">
                                    {{ Str::limit(strip_tags($project->description ?? 'تفاصيل المشروع غير متوفرة حالياً. نحن في وادي الريان نهتم بأدق التفاصيل في كل مشاريعنا لضمان الجودة.'), 120) }}
                                </p>
                            </div>
                            <div class="flex items-center text-sm font-bold text-brand-primary transition-colors group-hover:text-brand-secondary">
                                عرض التفاصيل
                                <svg class="mr-2 w-4 h-4 transition-transform transform rtl:rotate-180 group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </div>
                        </div>
                    </a>
                @empty
                    <!-- Fallback if no projects exist in DB yet -->
                    @foreach(range(1, 3) as $i)
                        <a href="#" class="flex flex-col h-full rounded-2xl bg-white border border-gray-100 shadow-card hover:shadow-soft transition-all duration-500 group overflow-hidden hover:-translate-y-2">
                            <div class="relative overflow-hidden aspect-video bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=600&auto=format&fit=crop" class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-105" alt="مشروع">
                                <div class="absolute inset-0 transition-colors duration-500 bg-brand-primary/10 group-hover:bg-transparent"></div>
                                <div class="absolute top-4 left-4 px-4 py-1.5 text-xs font-bold rounded-full shadow-md bg-white text-brand-primary border border-gray-100">2024/05/12</div>
                            </div>
                            <div class="flex flex-col flex-grow justify-between p-8">
                                <div>
                                    <div class="flex justify-between items-center mb-4">
                                        <span class="px-3 py-1 text-xs font-bold tracking-wider rounded-full text-brand-secondary bg-brand-secondary/10">سيئون، حضرموت</span>
                                    </div>
                                    <h3 class="mb-4 text-2xl font-bold text-brand-primary transition-colors group-hover:text-brand-secondary">مجمع سكني نموذجي</h3>
                                    <p class="mb-6 text-base font-medium leading-relaxed text-brand-muted line-clamp-3">
                                        مشروع سكني متكامل يضم مجموعة من الفلل الفاخرة المصممة بأحدث الطرازات المعمارية التي تلبي احتياجات العائلة العصرية.
                                    </p>
                                </div>
                                <div class="flex items-center text-sm font-bold text-brand-primary transition-colors group-hover:text-brand-secondary">
                                    عرض التفاصيل
                                    <svg class="mr-2 w-4 h-4 transition-transform transform rtl:rotate-180 group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endforelse
            </div>
            
            <div class="mt-12 text-center md:hidden">
                <a href="/projects" class="inline-flex gap-3 items-center font-bold text-brand-primary transition-colors hover:text-brand-secondary group">
                    عرض كل المشاريع
                    <span class="p-2 rounded-full bg-brand-tertiary/20 text-brand-tertiary group-hover:bg-brand-secondary group-hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- Formal About Us Section -->
    <section class="py-24 bg-white border-t border-gray-100">
        <div class="container max-w-7xl mx-auto px-4 md:px-6">
            <div class="grid grid-cols-1 gap-16 items-center lg:grid-cols-2">
                <div class="relative">
                    <div class="overflow-hidden rounded-2xl border-4 border-white shadow-soft aspect-[4/3]">
                        <img src="https://images.unsplash.com/photo-1581094722700-1c5c7d0a7cb5?q=80&w=1000&auto=format&fit=crop" alt="About Us" class="object-cover w-full h-full transition-transform duration-700 hover:scale-105">
                    </div>
                    <!-- Floating Stat Badge -->
                    <div class="absolute -bottom-8 -right-8 p-8 rounded-2xl border border-gray-100 shadow-card z-20 hidden md:flex flex-col items-center justify-center min-w-[220px] bg-white">
                        <span class="mb-1 text-5xl font-black text-brand-secondary">20+</span>
                        <span class="text-sm font-bold tracking-widest text-brand-muted uppercase">عاماً من التميز</span>
                    </div>
                </div>
                
                <div class="flex flex-col gap-6">
                    <span class="inline-flex items-center gap-2 px-4 py-2 w-max rounded-full bg-brand-primary/10 text-brand-primary text-sm font-bold tracking-wide">
                        عن الشركة
                    </span>
                    <h2 class="text-4xl md:text-5xl font-extrabold leading-tight text-brand-primary">
                        شريكك الموثوق في البناء والتشييد
                    </h2>
                    <div class="w-20 h-1.5 bg-brand-secondary rounded-full"></div>
                    <p class="text-lg font-medium leading-relaxed text-brand-muted">
                        في وادي الريان للمقاولات، نلتزم بتقديم مشاريع نموذجية تجسد التطور وتلبي أعلى المعايير الهندسية. نسعى دائماً لتخطي توقعات عملائنا من خلال الدمج بين التكنولوجيا الحديثة والخبرات المتراكمة.
                    </p>
                    
                    <a href="/contact" class="inline-flex items-center gap-3 text-brand-primary font-bold hover:text-brand-secondary transition-colors mt-4 w-fit group">
                        <span class="border-b-2 border-brand-tertiary pb-1 group-hover:border-brand-secondary transition-colors">تواصل مع فريقنا</span>
                        <span class="p-2 rounded-full bg-brand-tertiary/20 text-brand-tertiary group-hover:bg-brand-secondary group-hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if(typeof gsap !== 'undefined') {
                const tl = gsap.timeline();
                tl.fromTo('.hero-text-line', 
                    { y: 50, opacity: 0 }, 
                    { y: 0, opacity: 1, duration: 1, stagger: 0.15, ease: 'power3.out', delay: 0.2 }
                )
                .fromTo('.hero-btn',
                    { y: 20, opacity: 0 },
                    { y: 0, opacity: 1, duration: 0.6, stagger: 0.1, ease: 'power2.out' },
                    "-=0.5"
                )
                .fromTo('.hero-image',
                    { scale: 0.95, opacity: 0 },
                    { scale: 1, opacity: 1, duration: 1, ease: 'power2.out' },
                    "-=1"
                );
            }
        });
    </script>
    @endpush
</x-layouts.app>
