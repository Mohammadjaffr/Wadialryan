<x-layouts.app>
    <x-slot:title>مشاريعنا - الرواد للمقاولات</x-slot>
    
    <!-- Header -->
    <section class="relative pt-40 pb-20 bg-brand-dark flex items-center justify-center overflow-hidden min-h-[40vh]">
        <div class="absolute inset-0 z-0">
            <!-- Subtle Grid Background -->
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]"></div>
            <div class="absolute left-0 right-0 top-0 -z-10 m-auto h-[310px] w-[310px] rounded-full bg-brand-orange opacity-20 blur-[100px]"></div>
        </div>
        
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="overflow-hidden mb-4">
                <span class="block text-brand-orange font-bold tracking-[0.2em] uppercase text-sm header-reveal">سجل الإنجازات</span>
            </div>
            <div class="overflow-hidden mb-6">
                <h1 class="text-5xl md:text-7xl font-black text-white header-reveal">معرض المشاريع</h1>
            </div>
            <div class="overflow-hidden">
                <p class="text-xl text-gray-300 max-w-2xl mx-auto font-light leading-relaxed header-reveal">تصفح مجموعة مختارة من أحدث مشاريعنا التي تم إنجازها بكل دقة واحترافية لتجسد رؤية عملائنا.</p>
            </div>
        </div>
    </section>

    <!-- Projects Section with Alpine.js filtering and Masonry Layout -->
    <section class="py-24 bg-brand-surface min-h-screen relative z-10" x-data="{ category: 'all', init() { setTimeout(() => ScrollTrigger.refresh(), 500) } }">
        <div class="container mx-auto px-4 md:px-6">
            
            <!-- Filters -->
            <div class="flex justify-center gap-3 md:gap-6 mb-16 flex-wrap filters-container">
                <button @click="category = 'all'" :class="category === 'all' ? 'bg-brand-orange text-brand-dark shadow-[0_0_15px_rgba(212,175,55,0.4)] border-brand-orange' : 'bg-transparent text-gray-300 border-white/20 hover:border-brand-orange hover:text-white'" class="px-8 py-3 rounded-full font-bold transition-all duration-300 border backdrop-blur-sm">الكل</button>
                <button @click="category = 'تجاري'" :class="category === 'تجاري' ? 'bg-brand-orange text-brand-dark shadow-[0_0_15px_rgba(212,175,55,0.4)] border-brand-orange' : 'bg-transparent text-gray-300 border-white/20 hover:border-brand-orange hover:text-white'" class="px-8 py-3 rounded-full font-bold transition-all duration-300 border backdrop-blur-sm">تجاري</button>
                <button @click="category = 'سكني'" :class="category === 'سكني' ? 'bg-brand-orange text-brand-dark shadow-[0_0_15px_rgba(212,175,55,0.4)] border-brand-orange' : 'bg-transparent text-gray-300 border-white/20 hover:border-brand-orange hover:text-white'" class="px-8 py-3 rounded-full font-bold transition-all duration-300 border backdrop-blur-sm">سكني</button>
                <button @click="category = 'بنية تحتية'" :class="category === 'بنية تحتية' ? 'bg-brand-orange text-brand-dark shadow-[0_0_15px_rgba(212,175,55,0.4)] border-brand-orange' : 'bg-transparent text-gray-300 border-white/20 hover:border-brand-orange hover:text-white'" class="px-8 py-3 rounded-full font-bold transition-all duration-300 border backdrop-blur-sm">بنية تحتية</button>
            </div>

            <!-- CSS Masonry Grid -->
            <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8 pb-10">
                @foreach($projects as $project)
                    <div x-show="category === 'all' || category === '{{ $project->category }}'" 
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-10"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="project-card break-inside-avoid bg-brand-dark rounded-3xl overflow-hidden group border border-white/5 hover:border-brand-orange/30 transition-colors duration-500 relative cursor-pointer block">
                        
                        <!-- Image Container with varying aspect ratios for masonry effect -->
                        <div class="relative overflow-hidden {{ $loop->index % 3 == 0 ? 'aspect-[4/5]' : ($loop->index % 2 == 0 ? 'aspect-square' : 'aspect-[16/9]') }}">
                            <img src="{{ !empty($project->images) ? url($project->images[0]) : 'https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=800&auto=format&fit=crop' }}" onerror="this.style.display='none'" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-brand-dark/40 group-hover:bg-brand-dark/10 transition-colors duration-500"></div>
                            
                            <!-- Category Badge -->
                            <div class="absolute top-6 right-6 bg-brand-dark/80 backdrop-blur-md text-brand-orange border border-white/10 px-4 py-2 rounded-full text-xs font-bold shadow-lg transform -translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 delay-100">
                                {{ $project->category }}
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-8 relative bg-brand-dark">
                            <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-brand-orange transition-colors">{{ $project->title }}</h3>
                            <p class="text-gray-400 font-light leading-relaxed line-clamp-3">{!! strip_tags($project->description) !!}</p>
                            
                            <div class="mt-6 w-10 h-10 rounded-full border border-white/20 flex items-center justify-center text-white group-hover:bg-brand-orange group-hover:border-brand-orange group-hover:text-brand-dark transition-all duration-300">
                                <svg class="w-5 h-5 -rotate-45 rtl:rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Empty State / Fallback (if filtered) -->
            <div x-show="!$el.previousElementSibling.querySelector('.project-card[style*=\'display: block\'], .project-card:not([style*=\'display: none\'])')" style="display: none;" class="text-center py-20">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-brand-dark border border-white/10 text-gray-500 mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">لا توجد مشاريع</h3>
                <p class="text-gray-400">لم نتمكن من العثور على مشاريع في هذا التصنيف.</p>
            </div>
            
        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Header Reveal Animation
            gsap.fromTo('.header-reveal', 
                { y: 100, opacity: 0 }, 
                { y: 0, opacity: 1, duration: 1, stagger: 0.2, ease: 'power4.out', delay: 0.1 }
            );

            // Filters Entrance
            gsap.fromTo('.filters-container button',
                { y: 30, opacity: 0 },
                { y: 0, opacity: 1, duration: 0.6, stagger: 0.1, ease: 'back.out(1.5)', delay: 0.6 }
            );

            // Projects Initial Staggered Reveal
            gsap.from('.project-card', {
                scrollTrigger: {
                    trigger: '.columns-1',
                    start: 'top 85%',
                },
                y: 50,
                opacity: 0,
                scale: 0.95,
                duration: 0.8,
                stagger: 0.1,
                ease: 'power3.out'
            });
            
            // Watch for Alpine changes to refresh ScrollTrigger (since elements change display)
            window.addEventListener('alpine:initialized', () => {
                Alpine.effect(() => {
                    setTimeout(() => {
                        ScrollTrigger.refresh();
                    }, 600); // Wait for transition to end
                });
            });
        });
    </script>
    @endpush
</x-layouts.app>
