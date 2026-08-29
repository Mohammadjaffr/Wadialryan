<x-layouts.app>
    <x-slot:title>{{ __('خدماتنا - وادي الريان للمقاولات') }}</x-slot>
    
    <!-- Header -->
    <section class="relative pt-40 pb-24 bg-brand-surface flex items-center justify-center overflow-hidden border-b border-white/5">
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="mb-4">
                <span class="inline-block text-brand-orange font-bold tracking-[0.2em] uppercase text-sm mb-2 px-4 py-1 bg-brand-orange/10 rounded-full">{{ __('مجالات التميز') }}</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6">{{ __('الخدمات الهندسية') }}</h1>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto font-medium leading-relaxed">{{ __('نقدم مجموعة شاملة من الخدمات الهندسية والإنشائية التي تلبي كافة متطلباتكم بمهنية عالية وبمعايير استثنائية.') }}</p>
        </div>
    </section>

    <!-- Services Detail (Clean Alternating Blocks) -->
    <section class="py-24 bg-brand-dark">
        <div class="container mx-auto px-4 md:px-6">
            
            <!-- Service 1 -->
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20 mb-24 pb-24 border-b border-gray-800 last:border-0 last:mb-0 last:pb-0">
                <div class="lg:w-1/2 w-full order-2 lg:order-1">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-brand-surface rounded-2xl text-brand-orange border border-gray-800 mb-6 shadow-sm">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">{{ __('المقاولات العامة والبناء') }}</h2>
                    <p class="text-gray-400 leading-relaxed mb-8 text-lg">{{ __('نقوم بتنفيذ جميع أنواع المشاريع السكنية، التجارية، والصناعية. نعتمد على أحدث التقنيات وأفضل المواد لضمان متانة وجودة البناء في كل مرحلة.') }}</p>
                    
                    <ul class="space-y-4 font-medium">
                        <li class="flex items-start gap-4 text-gray-300">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-orange/10 flex items-center justify-center text-brand-orange mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </span>
                            {{ __('بناء الفلل والمجمعات السكنية') }}
                        </li>
                        <li class="flex items-start gap-4 text-gray-300">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-orange/10 flex items-center justify-center text-brand-orange mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </span>
                            {{ __('تشييد الأبراج والمراكز التجارية') }}
                        </li>
                        <li class="flex items-start gap-4 text-gray-300">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-orange/10 flex items-center justify-center text-brand-orange mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </span>
                            {{ __('أعمال التشطيبات والديكور الداخلي المتكامل') }}
                        </li>
                    </ul>
                </div>
                <div class="lg:w-1/2 w-full order-1 lg:order-2">
                    <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-lg border border-gray-800">
                        <img src="https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=1200&auto=format&fit=crop" onerror="this.style.display='none'" alt="Construction" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20 mb-24 pb-24 border-b border-gray-800 last:border-0 last:mb-0 last:pb-0">
                <div class="lg:w-1/2 w-full">
                    <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-lg border border-gray-800">
                        <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1200&auto=format&fit=crop" onerror="this.style.display='none'" alt="Architecture" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="lg:w-1/2 w-full">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-brand-surface rounded-2xl text-brand-orange border border-gray-800 mb-6 shadow-sm">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path></svg>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">{{ __('التصميم المعماري والاستشارات') }}</h2>
                    <p class="text-gray-400 leading-relaxed mb-8 text-lg">{{ __('نقدم استشارات هندسية وتصاميم معمارية مبتكرة تواكب العصر وتلبي تطلعاتك. فريقنا من المهندسين مستعد لتحويل أفكارك إلى واقع يفوق خيالك.') }}</p>
                    
                    <ul class="space-y-4 font-medium">
                        <li class="flex items-start gap-4 text-gray-300">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-orange/10 flex items-center justify-center text-brand-orange mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </span>
                            {{ __('التصميم المعماري الحديث والكلاسيكي') }}
                        </li>
                        <li class="flex items-start gap-4 text-gray-300">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-orange/10 flex items-center justify-center text-brand-orange mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </span>
                            {{ __('التخطيط الحضري وتنسيق المواقع') }}
                        </li>
                        <li class="flex items-start gap-4 text-gray-300">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-orange/10 flex items-center justify-center text-brand-orange mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </span>
                            {{ __('استخراج التراخيص والإشراف الهندسي') }}
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Service 3 -->
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20 mb-24 pb-24 border-b border-gray-800 last:border-0 last:mb-0 last:pb-0">
                <div class="lg:w-1/2 w-full order-2 lg:order-1">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-brand-surface rounded-2xl text-brand-orange border border-gray-800 mb-6 shadow-sm">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">{{ __('مشاريع البنية التحتية') }}</h2>
                    <p class="text-gray-400 leading-relaxed mb-8 text-lg">{{ __('مشاريع البنية التحتية تعتبر الأساس لأي تطور عمراني. نحن متخصصون في تجهيز الأراضي وشبكات الطرق وتمديدات المياه والصرف الصحي بأعلى مقاييس الاستدامة.') }}</p>
                    
                    <ul class="space-y-4 font-medium">
                        <li class="flex items-start gap-4 text-gray-300">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-orange/10 flex items-center justify-center text-brand-orange mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </span>
                            {{ __('أعمال الحفر والردم وتسوية الأراضي') }}
                        </li>
                        <li class="flex items-start gap-4 text-gray-300">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-orange/10 flex items-center justify-center text-brand-orange mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </span>
                            {{ __('تمديد شبكات المياه والصرف الصحي') }}
                        </li>
                        <li class="flex items-start gap-4 text-gray-300">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-orange/10 flex items-center justify-center text-brand-orange mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </span>
                            {{ __('رصف وسفلتة الطرق وإنارة الشوارع') }}
                        </li>
                    </ul>
                </div>
                <div class="lg:w-1/2 w-full order-1 lg:order-2">
                    <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-lg border border-gray-800">
                        <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?q=80&w=1200&auto=format&fit=crop" onerror="this.style.display='none'" alt="Infrastructure" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</x-layouts.app>
