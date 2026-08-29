<x-layouts.app>
    <x-slot:title>{{ __('مشاريعنا - وادي الريان للمقاولات') }}</x-slot>
    
    <!-- Header -->
    <section class="relative pt-40 pb-24 bg-brand-surface flex items-center justify-center overflow-hidden border-b border-white/5">
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="mb-4">
                <span class="inline-block text-brand-orange font-bold tracking-[0.2em] uppercase text-sm mb-2 px-4 py-1 bg-brand-orange/10 rounded-full">{{ __('سجل الإنجازات') }}</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6">{{ __('معرض المشاريع') }}</h1>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto font-medium leading-relaxed">{{ __('تصفح مجموعة مختارة من أحدث مشاريعنا التي تم إنجازها بكل دقة واحترافية لتجسد رؤية عملائنا.') }}</p>
        </div>
    </section>

    <!-- Projects Section with Alpine.js filtering and Structured Grid Layout -->
    <section class="py-24 bg-brand-dark min-h-screen relative z-10" x-data="{ category: 'all', init() { setTimeout(() => ScrollTrigger.refresh(), 500) } }">
        <div class="container mx-auto px-4 md:px-6">
            
            <!-- Filters -->
            <div class="flex justify-center gap-3 md:gap-4 mb-16 flex-wrap">
                <button @click="category = 'all'" :class="category === 'all' ? 'bg-brand-orange text-brand-dark border-brand-orange' : 'bg-brand-surface text-gray-400 border-gray-800 hover:border-brand-orange hover:text-white'" class="px-8 py-2.5 rounded-full font-bold transition-all duration-300 border shadow-sm">{{ __('الكل') }}</button>
                <button @click="category = '{{ __('تجاري') }}'" :class="category === '{{ __('تجاري') }}' ? 'bg-brand-orange text-brand-dark border-brand-orange' : 'bg-brand-surface text-gray-400 border-gray-800 hover:border-brand-orange hover:text-white'" class="px-8 py-2.5 rounded-full font-bold transition-all duration-300 border shadow-sm">{{ __('تجاري') }}</button>
                <button @click="category = '{{ __('سكني') }}'" :class="category === '{{ __('سكني') }}' ? 'bg-brand-orange text-brand-dark border-brand-orange' : 'bg-brand-surface text-gray-400 border-gray-800 hover:border-brand-orange hover:text-white'" class="px-8 py-2.5 rounded-full font-bold transition-all duration-300 border shadow-sm">{{ __('سكني') }}</button>
                <button @click="category = '{{ __('بنية تحتية') }}'" :class="category === '{{ __('بنية تحتية') }}' ? 'bg-brand-orange text-brand-dark border-brand-orange' : 'bg-brand-surface text-gray-400 border-gray-800 hover:border-brand-orange hover:text-white'" class="px-8 py-2.5 rounded-full font-bold transition-all duration-300 border shadow-sm">{{ __('بنية تحتية') }}</button>
            </div>

            <!-- Structured CSS Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pb-10">
                @foreach($projects as $project)
                    <div x-show="category === 'all' || category === '{{ $project->category }}'" 
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-10"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="project-card bg-brand-surface rounded-2xl overflow-hidden group border border-gray-800 hover:shadow-xl hover:border-brand-orange/30 transition-all duration-300 flex flex-col h-full cursor-pointer">
                        <a href="{{ route('projects.show', $project) }}" class="flex flex-col h-full w-full">
                        <!-- Image Container with consistent aspect ratio -->
                        <div class="relative overflow-hidden aspect-[4/3] w-full bg-brand-dark">
                            <img src="{{ !empty($project->images) ? url($project->images[0]) : 'https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=800&auto=format&fit=crop' }}" onerror="this.style.display='none'" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-brand-dark/40 group-hover:bg-transparent transition-colors duration-500"></div>
                            
                            <!-- Category Badge -->
                            <div class="absolute top-4 right-4 bg-brand-dark/95 backdrop-blur-md text-brand-orange border border-gray-800 px-4 py-1.5 rounded-full text-xs font-bold shadow-sm transform -translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 delay-100">
                                {{ $project->category ?? __('تجاري') }}
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-8 flex flex-col flex-grow">
                            <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-brand-orange transition-colors">{{ $project->title }}</h3>
                            <p class="text-gray-400 font-medium leading-relaxed line-clamp-3 mb-6 flex-grow">{!! strip_tags($project->description) !!}</p>
                            
                            <div class="flex items-center justify-between pt-6 border-t border-gray-800 mt-auto">
                                <span class="text-sm font-bold text-gray-400 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $project->location ?? __('الرياض') }}
                                </span>
                                <div class="w-10 h-10 rounded-full border border-gray-800 flex items-center justify-center text-gray-400 group-hover:bg-brand-orange group-hover:border-brand-orange group-hover:text-brand-dark transition-all duration-300">
                                    <svg class="w-5 h-5 -rotate-45 rtl:rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
            
            <!-- Empty State / Fallback (if filtered) -->
            <div x-show="!$el.previousElementSibling.querySelector('.project-card[style*=\'display: block\'], .project-card:not([style*=\'display: none\'])')" style="display: none;" class="text-center py-20 bg-brand-surface rounded-2xl border border-gray-800 mt-8">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-brand-dark border border-gray-800 text-brand-orange mb-6 shadow-sm">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">{{ __('لا توجد مشاريع') }}</h3>
                <p class="text-gray-400 font-medium">{{ __('لم نتمكن من العثور على مشاريع في هذا التصنيف.') }}</p>
            </div>
            
        </div>
    </section>
</x-layouts.app>
