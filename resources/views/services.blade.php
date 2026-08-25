<x-layouts.app>
    <x-slot:title>خدماتنا - الرواد للمقاولات</x-slot>
    
    <!-- Header -->
    <section class="relative pt-40 pb-32 bg-brand-dark flex items-center justify-center overflow-hidden min-h-[50vh]">
        <!-- Abstract background elements -->
        <div class="absolute inset-0 z-0 opacity-20">
            <div class="absolute top-0 right-0 w-96 h-96 bg-brand-orange rounded-full blur-[150px]"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-brand-amber rounded-full blur-[150px]"></div>
        </div>
        
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="overflow-hidden mb-4">
                <span class="block text-brand-orange font-bold tracking-[0.2em] uppercase text-sm header-reveal">ماذا نقدم</span>
            </div>
            <div class="overflow-hidden mb-6">
                <h1 class="text-5xl md:text-7xl font-black text-white header-reveal">خدماتنا الهندسية</h1>
            </div>
            <div class="overflow-hidden">
                <p class="text-xl text-gray-300 max-w-2xl mx-auto font-light leading-relaxed header-reveal">نقدم مجموعة شاملة من الخدمات الهندسية والإنشائية التي تلبي كافة متطلباتكم بمهنية عالية وبمعايير استثنائية.</p>
            </div>
        </div>
    </section>

    <!-- Services Detail (Sticky Scroll Strategy) -->
    <section class="bg-brand-surface py-20 relative">
        <div class="container mx-auto px-4 md:px-6">
            
            <!-- Service 1 -->
            <div class="service-row min-h-screen flex flex-col md:flex-row items-center gap-12 md:gap-20 py-20 border-t border-white/5 relative">
                <div class="md:w-1/2 w-full h-[50vh] md:h-[70vh] relative rounded-3xl overflow-hidden service-img-wrapper group">
                    <img src="https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=1200&auto=format&fit=crop" onerror="this.style.display='none'" alt="Construction" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                    <div class="absolute inset-0 bg-brand-dark/20 group-hover:bg-transparent transition-colors duration-500"></div>
                </div>
                
                <div class="md:w-1/2 w-full service-content">
                    <div class="w-20 h-20 bg-brand-dark border border-brand-orange/20 text-brand-orange rounded-2xl flex items-center justify-center mb-8 shadow-glass transform -rotate-3 hover:rotate-0 transition-transform duration-500">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <span class="text-brand-orange font-bold text-6xl opacity-10 absolute -top-10 -right-10 pointer-events-none">01</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">المقاولات العامة والبناء</h2>
                    <p class="text-gray-400 leading-relaxed mb-8 text-lg font-light">نقوم بتنفيذ جميع أنواع المشاريع السكنية، التجارية، والصناعية. نعتمد على أحدث التقنيات وأفضل المواد لضمان متانة وجودة البناء في كل مرحلة.</p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-gray-300"><div class="w-2 h-2 rounded-full bg-brand-orange shadow-[0_0_10px_rgba(212,175,55,0.8)]"></div> بناء الفلل والمجمعات السكنية</li>
                        <li class="flex items-center gap-3 text-gray-300"><div class="w-2 h-2 rounded-full bg-brand-orange shadow-[0_0_10px_rgba(212,175,55,0.8)]"></div> تشييد الأبراج والمراكز التجارية</li>
                        <li class="flex items-center gap-3 text-gray-300"><div class="w-2 h-2 rounded-full bg-brand-orange shadow-[0_0_10px_rgba(212,175,55,0.8)]"></div> أعمال التشطيبات والديكور الداخلي المتكامل</li>
                    </ul>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="service-row min-h-screen flex flex-col md:flex-row-reverse items-center gap-12 md:gap-20 py-20 border-t border-white/5 relative">
                <div class="md:w-1/2 w-full h-[50vh] md:h-[70vh] relative rounded-3xl overflow-hidden service-img-wrapper group">
                    <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1200&auto=format&fit=crop" onerror="this.style.display='none'" alt="Architecture" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                    <div class="absolute inset-0 bg-brand-dark/20 group-hover:bg-transparent transition-colors duration-500"></div>
                </div>
                
                <div class="md:w-1/2 w-full service-content">
                    <div class="w-20 h-20 bg-brand-dark border border-brand-orange/20 text-brand-orange rounded-2xl flex items-center justify-center mb-8 shadow-glass transform rotate-3 hover:rotate-0 transition-transform duration-500">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path></svg>
                    </div>
                    <span class="text-brand-orange font-bold text-6xl opacity-10 absolute -top-10 -right-10 pointer-events-none">02</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">التصميم المعماري والاستشارات</h2>
                    <p class="text-gray-400 leading-relaxed mb-8 text-lg font-light">نقدم استشارات هندسية وتصاميم معمارية مبتكرة تواكب العصر وتلبي تطلعاتك. فريقنا من المهندسين مستعد لتحويل أفكارك إلى واقع يفوق خيالك.</p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-gray-300"><div class="w-2 h-2 rounded-full bg-brand-orange shadow-[0_0_10px_rgba(212,175,55,0.8)]"></div> التصميم المعماري الحديث والكلاسيكي</li>
                        <li class="flex items-center gap-3 text-gray-300"><div class="w-2 h-2 rounded-full bg-brand-orange shadow-[0_0_10px_rgba(212,175,55,0.8)]"></div> التخطيط الحضري وتنسيق المواقع</li>
                        <li class="flex items-center gap-3 text-gray-300"><div class="w-2 h-2 rounded-full bg-brand-orange shadow-[0_0_10px_rgba(212,175,55,0.8)]"></div> استخراج التراخيص والإشراف الهندسي</li>
                    </ul>
                </div>
            </div>
            
            <!-- Service 3 -->
            <div class="service-row min-h-screen flex flex-col md:flex-row items-center gap-12 md:gap-20 py-20 border-t border-white/5 relative">
                <div class="md:w-1/2 w-full h-[50vh] md:h-[70vh] relative rounded-3xl overflow-hidden service-img-wrapper group">
                    <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?q=80&w=1200&auto=format&fit=crop" onerror="this.style.display='none'" alt="Infrastructure" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                    <div class="absolute inset-0 bg-brand-dark/20 group-hover:bg-transparent transition-colors duration-500"></div>
                </div>
                
                <div class="md:w-1/2 w-full service-content">
                    <div class="w-20 h-20 bg-brand-dark border border-brand-orange/20 text-brand-orange rounded-2xl flex items-center justify-center mb-8 shadow-glass transform -rotate-3 hover:rotate-0 transition-transform duration-500">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <span class="text-brand-orange font-bold text-6xl opacity-10 absolute -top-10 -right-10 pointer-events-none">03</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">مشاريع البنية التحتية</h2>
                    <p class="text-gray-400 leading-relaxed mb-8 text-lg font-light">مشاريع البنية التحتية تعتبر الأساس لأي تطور عمراني. نحن متخصصون في تجهيز الأراضي وشبكات الطرق وتمديدات المياه والصرف الصحي بأعلى مقاييس الاستدامة.</p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-gray-300"><div class="w-2 h-2 rounded-full bg-brand-orange shadow-[0_0_10px_rgba(212,175,55,0.8)]"></div> أعمال الحفر والردم وتسوية الأراضي</li>
                        <li class="flex items-center gap-3 text-gray-300"><div class="w-2 h-2 rounded-full bg-brand-orange shadow-[0_0_10px_rgba(212,175,55,0.8)]"></div> تمديد شبكات المياه والصرف الصحي</li>
                        <li class="flex items-center gap-3 text-gray-300"><div class="w-2 h-2 rounded-full bg-brand-orange shadow-[0_0_10px_rgba(212,175,55,0.8)]"></div> رصف وسفلتة الطرق وإنارة الشوارع</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Header Animation
            gsap.fromTo('.header-reveal', 
                { y: 100, opacity: 0 }, 
                { y: 0, opacity: 1, duration: 1, stagger: 0.2, ease: 'power4.out', delay: 0.2 }
            );

            // Desktop Only Pinning and Revealing
            if (window.innerWidth > 768) {
                const serviceRows = document.querySelectorAll('.service-row');
                
                serviceRows.forEach((row, i) => {
                    const imgWrapper = row.querySelector('.service-img-wrapper');
                    const content = row.querySelector('.service-content');
                    
                    // Image reveal effect
                    gsap.fromTo(imgWrapper, 
                        { clipPath: 'inset(100% 0% 0% 0%)' },
                        {
                            clipPath: 'inset(0% 0% 0% 0%)',
                            ease: 'power3.inOut',
                            scrollTrigger: {
                                trigger: row,
                                start: 'top 70%',
                                end: 'center center',
                                scrub: 1
                            }
                        }
                    );
                    
                    // Content slide in
                    gsap.from(content, {
                        y: 100,
                        opacity: 0,
                        duration: 1,
                        scrollTrigger: {
                            trigger: row,
                            start: 'top 70%',
                        }
                    });
                });
            } else {
                // Mobile basic animations
                gsap.utils.toArray('.service-row').forEach(row => {
                    gsap.from(row, {
                        y: 50,
                        opacity: 0,
                        duration: 0.8,
                        scrollTrigger: {
                            trigger: row,
                            start: 'top 80%',
                        }
                    });
                });
            }
        });
    </script>
    @endpush
</x-layouts.app>
