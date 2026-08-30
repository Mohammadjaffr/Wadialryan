<x-layouts.app>
    <x-slot:title>{{ __('مشاريعنا - وادي الريان للمقاولات') }}</x-slot>
    
    <!-- Header -->
    <section class="flex overflow-hidden relative justify-center items-center pt-40 pb-24 bg-brand-background">
        <!-- Background Pattern/Gradient -->
        <div class="absolute inset-0 z-0 bg-gradient-to-br from-brand-background to-white"></div>
        <div class="absolute inset-0 opacity-20 z-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-secondary/20 via-transparent to-transparent"></div>
        
        <div class="container relative z-10 px-4 mx-auto text-center">
            <div class="mb-4 opacity-0 transform translate-y-4 animate-fade-in-up">
                <span class="inline-flex items-center gap-2 px-4 py-2 mb-2 rounded-full bg-brand-primary/10 text-brand-primary text-sm font-bold tracking-wide">{{ __('سجل الإنجازات') }}</span>
            </div>
            <h1 class="mb-6 text-4xl font-extrabold text-brand-primary opacity-0 transform translate-y-4 md:text-6xl animate-fade-in-up" style="animation-delay: 100ms;">{{ __('معرض المشاريع') }}</h1>
            <p class="mx-auto max-w-2xl text-lg font-medium leading-relaxed opacity-0 transform translate-y-4 text-brand-muted animate-fade-in-up" style="animation-delay: 200ms;">{{ __('تصفح مجموعة مختارة من أحدث مشاريعنا التي تم إنجازها بكل دقة واحترافية لتجسد رؤية عملائنا.') }}</p>
        </div>  
    </section>

    <!-- Projects Section with Alpine.js filtering and Structured Grid Layout -->
    <section class="overflow-hidden relative py-24 min-h-screen bg-white border-t border-gray-100" x-data="{ category: 'all', init() { setTimeout(() => ScrollTrigger.refresh(), 500) } }">
        <!-- Decorative elements -->
        <div class="absolute left-0 top-20 -ml-48 w-96 h-96 rounded-full blur-3xl pointer-events-none bg-brand-secondary/5"></div>
        <div class="absolute right-0 bottom-20 -mr-48 w-96 h-96 rounded-full blur-3xl pointer-events-none bg-brand-tertiary/5"></div>

        <div class="container relative z-10 px-4 mx-auto md:px-6">
            
            <!-- Filters -->
            <div class="flex flex-wrap gap-3 justify-center mb-16 md:gap-4">
                <button @click="category = 'all'" :class="category === 'all' ? 'bg-brand-secondary text-white shadow-soft' : 'bg-white text-brand-primary border-gray-200 hover:bg-gray-50'" class="px-8 py-3 font-bold rounded-full border transition-all duration-300">{{ __('الكل') }}</button>
                <button @click="category = '{{ __('تجاري') }}'" :class="category === '{{ __('تجاري') }}' ? 'bg-brand-secondary text-white shadow-soft' : 'bg-white text-brand-primary border-gray-200 hover:bg-gray-50'" class="px-8 py-3 font-bold rounded-full border transition-all duration-300">{{ __('تجاري') }}</button>
                <button @click="category = '{{ __('سكني') }}'" :class="category === '{{ __('سكني') }}' ? 'bg-brand-secondary text-white shadow-soft' : 'bg-white text-brand-primary border-gray-200 hover:bg-gray-50'" class="px-8 py-3 font-bold rounded-full border transition-all duration-300">{{ __('سكني') }}</button>
                <button @click="category = '{{ __('بنية تحتية') }}'" :class="category === '{{ __('بنية تحتية') }}' ? 'bg-brand-secondary text-white shadow-soft' : 'bg-white text-brand-primary border-gray-200 hover:bg-gray-50'" class="px-8 py-3 font-bold rounded-full border transition-all duration-300">{{ __('بنية تحتية') }}</button>
            </div>

            <!-- Structured CSS Grid -->
            <div class="grid grid-cols-1 gap-8 pb-10 md:grid-cols-2 lg:grid-cols-3">
                @foreach($projects as $project)
                    <div x-show="category === 'all' || category === '{{ $project->category }}'" 
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-10"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="project-card flex flex-col h-full rounded-2xl bg-white border border-gray-100 shadow-card hover:shadow-soft transition-all duration-500 group overflow-hidden hover:-translate-y-2 cursor-pointer">
                        <a href="{{ route('projects.show', $project) }}" class="flex flex-col w-full h-full">
                        <!-- Image Container with consistent aspect ratio -->
                        <div class="relative overflow-hidden aspect-[4/3] w-full bg-gray-100">
                            <img src="{{ !empty($project->images) ? url($project->images[0]) : 'https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=800&auto=format&fit=crop' }}" onerror="this.style.opacity='0'" alt="{{ $project->title }}" class="object-cover relative z-10 w-full h-full transition-transform duration-700 group-hover:scale-105">
                            
                            @if(empty($project->images))
                            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=800&auto=format&fit=crop')] bg-cover bg-center mix-blend-overlay opacity-30"></div>
                            @endif
                            
                            <div class="absolute inset-0 z-20 transition-colors duration-500 bg-brand-primary/10 group-hover:bg-transparent"></div>
                            
                            <!-- Category Badge -->
                            <div class="absolute top-4 right-4 z-30 px-4 py-1.5 text-xs font-bold rounded-full shadow-md backdrop-blur-md transition-all duration-300 delay-100 transform -translate-y-2 bg-white text-brand-primary border border-gray-100 group-hover:translate-y-0 group-hover:opacity-100">
                                {{ $project->category ?? __('تجاري') }}
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="flex relative z-10 flex-col flex-grow p-8 bg-white">
                            <h3 class="mb-3 text-2xl font-bold text-brand-primary transition-colors duration-300 group-hover:text-brand-secondary">{{ $project->title }}</h3>
                            <p class="flex-grow mb-6 font-medium leading-relaxed text-brand-muted line-clamp-3">{!! strip_tags($project->description) !!}</p>
                            
                            <div class="flex justify-between items-center pt-6 mt-auto border-t border-gray-100">
                                <span class="flex gap-2 items-center text-sm font-bold text-brand-secondary bg-brand-secondary/10 px-3 py-1 rounded-full">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $project->location ?? __('الرياض') }}
                                </span>
                                <div class="flex items-center text-sm font-bold text-brand-primary transition-colors group-hover:text-brand-secondary">
                                    {{ __('عرض التفاصيل') }}
                                    <svg class="mx-2 w-4 h-4 transition-transform transform rtl:rotate-180 group-hover:{{ app()->getLocale() == 'ar' ? '-translate-x-1' : 'translate-x-1' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
            
            <!-- Empty State / Fallback (if filtered) -->
            <div x-show="!$el.previousElementSibling.querySelector('.project-card[style*=\'display: block\'], .project-card:not([style*=\'display: none\'])')" style="display: none;" class="text-center py-20 bg-white rounded-2xl border border-gray-100 mt-8 shadow-card">
                <div class="inline-flex justify-center items-center mb-6 w-24 h-24 rounded-full bg-brand-primary/5 text-brand-primary">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="mb-3 text-3xl font-bold text-brand-primary">{{ __('لا توجد مشاريع') }}</h3>
                <p class="text-lg font-medium text-brand-muted">{{ __('لم نتمكن من العثور على مشاريع في هذا التصنيف.') }}</p>
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
