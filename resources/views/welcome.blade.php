<x-layouts.app>
    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=1920&auto=format&fit=crop" alt="Construction Hero" class="w-full h-full object-cover">
            <!-- Subtle gradient overlay instead of solid color -->
            <div class="absolute inset-0 bg-gradient-to-r from-brand-dark/90 to-brand-dark/60"></div>
        </div>
        <div class="relative z-10 text-center px-4 max-w-5xl mx-auto" data-aos="fade-up" data-aos-duration="1000">
            <!-- New Typography -->
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 leading-tight tracking-tight">
                مستقبل العمران، <span class="text-brand-orange">نبني الرؤى</span>، نجسد الإتقان
            </h1>
            <p class="text-xl md:text-2xl text-gray-200 mb-10 max-w-3xl mx-auto font-light">
                نصنع فارقاً في عالم المقاولات بتصاميم عصرية وتنفيذ احترافي يفوق التوقعات.
            </p>
            <div class="flex gap-4 justify-center">
                <a href="/contact" class="px-10 py-4 bg-brand-orange text-white rounded-full font-bold text-lg hover:bg-orange-600 hover:shadow-xl hover:shadow-brand-orange/30 transition-all transform hover:-translate-y-1">ابدأ مشروعك</a>
                <a href="#services" class="px-10 py-4 bg-white/10 backdrop-blur-md border border-white/30 text-white rounded-full font-bold text-lg hover:bg-white hover:text-brand-dark transition-all">اكتشف المزيد</a>
            </div>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce z-10">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
        </div>
    </section>

    <!-- Services Overview -->
    <section id="services" class="py-24 bg-brand-gray relative">
        <div class="container mx-auto px-4 md:px-6">
            <div class="text-center mb-20" data-aos="fade-up">
                <span class="text-brand-orange font-bold tracking-wider uppercase text-sm mb-2 block">ماذا نقدم؟</span>
                <h2 class="text-4xl md:text-5xl font-bold text-brand-dark mb-6">خدماتنا</h2>
                <div class="w-24 h-1 bg-brand-orange mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Service 1 -->
                <div class="bg-white p-10 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 group border border-gray-100" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-20 h-20 bg-brand-orange/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-brand-orange transition-colors duration-300 transform group-hover:rotate-6">
                        <svg class="w-10 h-10 text-brand-orange group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-brand-dark mb-4">البناء والمقاولات</h3>
                    <p class="text-gray-500 mb-6 leading-relaxed">تنفيذ كافة المشاريع الإنشائية السكنية والتجارية بدقة متناهية والتزام بالمعايير الهندسية العالمية.</p>
                </div>
                <!-- Service 2 -->
                <div class="bg-white p-10 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 group border border-gray-100" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-20 h-20 bg-brand-orange/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-brand-orange transition-colors duration-300 transform group-hover:rotate-6">
                        <svg class="w-10 h-10 text-brand-orange group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-brand-dark mb-4">التصميم المعماري</h3>
                    <p class="text-gray-500 mb-6 leading-relaxed">تصاميم معمارية وداخلية فريدة تلبي احتياجاتك وتجمع بين الجمالية والوظائف العملية المبتكرة.</p>
                </div>
                <!-- Service 3 -->
                <div class="bg-white p-10 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 group border border-gray-100" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-20 h-20 bg-brand-orange/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-brand-orange transition-colors duration-300 transform group-hover:rotate-6">
                        <svg class="w-10 h-10 text-brand-orange group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-brand-dark mb-4">البنية التحتية</h3>
                    <p class="text-gray-500 mb-6 leading-relaxed">تطوير وتجهيز مشاريع البنية التحتية من شبكات طرق، مياه، وصرف صحي للمدن والمخططات العمرانية.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Gallery Grid -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 md:px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16" data-aos="fade-up">
                <div>
                    <span class="text-brand-orange font-bold tracking-wider uppercase text-sm mb-2 block">أعمالنا</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-brand-dark mb-4">المشاريع</h2>
                    <div class="w-24 h-1 bg-brand-orange rounded-full"></div>
                </div>
                <a href="/projects" class="hidden md:flex items-center gap-2 text-brand-dark font-bold hover:text-brand-orange transition">
                    عرض كل المشاريع
                    <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <!-- Stylish Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-4 h-[600px]">
                <!-- Large Project -->
                <div class="md:col-span-2 md:row-span-2 relative group rounded-2xl overflow-hidden shadow-lg cursor-pointer" data-aos="zoom-in" data-aos-delay="100">
                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Project 1">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/90 via-brand-dark/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-8 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <span class="text-brand-orange font-semibold text-sm mb-2 block">مجمع سكني</span>
                        <h3 class="text-white text-3xl font-bold">أبراج المستقبل</h3>
                    </div>
                </div>
                <!-- Small Project 1 -->
                <div class="md:col-span-1 md:row-span-1 relative group rounded-2xl overflow-hidden shadow-lg cursor-pointer" data-aos="zoom-in" data-aos-delay="200">
                    <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Project 2">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/90 to-transparent opacity-80"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <span class="text-brand-orange font-semibold text-xs mb-1 block">تصميم داخلي</span>
                        <h3 class="text-white text-xl font-bold">مكاتب إدارية</h3>
                    </div>
                </div>
                <!-- Small Project 2 -->
                <div class="md:col-span-1 md:row-span-1 relative group rounded-2xl overflow-hidden shadow-lg cursor-pointer" data-aos="zoom-in" data-aos-delay="300">
                    <img src="https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Project 3">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/90 to-transparent opacity-80"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <span class="text-brand-orange font-semibold text-xs mb-1 block">بنية تحتية</span>
                        <h3 class="text-white text-xl font-bold">تطوير طرق</h3>
                    </div>
                </div>
                <!-- Wide Project -->
                <div class="md:col-span-2 md:row-span-1 relative group rounded-2xl overflow-hidden shadow-lg cursor-pointer" data-aos="zoom-in" data-aos-delay="400">
                    <img src="https://images.unsplash.com/photo-1504307651254-35680f356f58?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Project 4">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/90 to-transparent opacity-80"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <span class="text-brand-orange font-semibold text-sm mb-1 block">منشأة تجارية</span>
                        <h3 class="text-white text-2xl font-bold">مول العاصمة</h3>
                    </div>
                </div>
            </div>
            
            <div class="mt-10 text-center md:hidden">
                <a href="/projects" class="inline-flex items-center gap-2 text-brand-dark font-bold hover:text-brand-orange transition">
                    عرض كل المشاريع
                    <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="py-24 bg-brand-gray overflow-hidden">
        <div class="container mx-auto px-4 md:px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div class="relative" data-aos="fade-left">
                    <div class="absolute -inset-4 bg-brand-orange/20 rounded-[2rem] transform -rotate-3"></div>
                    <img src="https://images.unsplash.com/photo-1581094722700-1c5c7d0a7cb5?q=80&w=1000&auto=format&fit=crop" alt="About Us" class="relative rounded-3xl shadow-2xl z-10">
                    <!-- Floating Stat Card -->
                    <div class="absolute -bottom-10 -right-10 bg-white p-8 rounded-2xl shadow-2xl z-20 hidden md:flex items-center gap-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="text-brand-orange">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <span class="block text-4xl font-extrabold text-brand-dark mb-1">+20</span>
                            <span class="text-gray-500 font-medium">عاماً من التميز</span>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-right">
                    <span class="text-brand-orange font-bold tracking-wider uppercase text-sm mb-2 block">عن الشركة</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-brand-dark mb-8 leading-tight">شريكك الموثوق في بناء المستقبل</h2>
                    <p class="text-xl text-gray-600 leading-relaxed mb-8">
                        نحن شركة رائدة في قطاع البناء والمقاولات، نمتلك خبرة تمتد لأكثر من عقدين من الزمان في تقديم حلول هندسية مبتكرة ومستدامة. نسعى دائماً لتجاوز توقعات عملائنا.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-8 mb-10">
                        <div class="border-r-4 border-brand-orange pr-4">
                            <div class="text-4xl font-extrabold text-brand-dark mb-2">+150</div>
                            <div class="text-gray-500 font-medium">مشروع منجز بنجاح</div>
                        </div>
                        <div class="border-r-4 border-brand-orange pr-4">
                            <div class="text-4xl font-extrabold text-brand-dark mb-2">100%</div>
                            <div class="text-gray-500 font-medium">معدل رضا العملاء</div>
                        </div>
                    </div>

                    <a href="/contact" class="inline-flex items-center justify-center px-8 py-4 bg-brand-dark text-white rounded-full font-bold text-lg hover:bg-gray-800 transition-all shadow-lg hover:shadow-xl group">
                        تعرف علينا أكثر
                        <svg class="w-5 h-5 mr-3 group-hover:-translate-x-1 transition-transform rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
