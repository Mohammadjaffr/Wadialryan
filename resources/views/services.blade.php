<x-layouts.app>
    <x-slot:title>{{ __('خدماتنا - وادي الريان للمقاولات') }}</x-slot>

    <!-- Header -->
    <section class="relative pt-40 pb-24 bg-brand-background flex items-center justify-center overflow-hidden">
        <!-- Background Pattern/Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-brand-background to-white z-0"></div>
        <div class="absolute inset-0 opacity-20 z-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-secondary/20 via-transparent to-transparent"></div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="mb-4 transform translate-y-4 opacity-0 animate-fade-in-up">
                <span class="inline-flex items-center gap-2 px-4 py-2 mb-2 rounded-full bg-brand-primary/10 text-brand-primary text-sm font-bold tracking-wide">{{ __('مجالات التميز') }}</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-extrabold text-brand-primary mb-6 transform translate-y-4 opacity-0 animate-fade-in-up"
                style="animation-delay: 100ms;">{{ __('الخدمات الهندسية') }}</h1>
            <p class="text-lg text-brand-muted max-w-2xl mx-auto font-medium leading-relaxed transform translate-y-4 opacity-0 animate-fade-in-up"
                style="animation-delay: 200ms;">
                {{ __('نقدم مجموعة شاملة من الخدمات الهندسية والإنشائية التي تلبي كافة متطلباتكم بمهنية عالية وبمعايير استثنائية.') }}
            </p>
        </div>
    </section>

    <!-- Services Detail (Clean Alternating Blocks) -->
    <section class="py-24 bg-white border-t border-gray-100 relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-20 right-0 w-96 h-96 bg-brand-secondary/5 rounded-full blur-3xl -mr-48 pointer-events-none"></div>
        <div class="absolute bottom-20 left-0 w-96 h-96 bg-brand-tertiary/5 rounded-full blur-3xl -ml-48 pointer-events-none"></div>

        <div class="container mx-auto px-4 md:px-6 relative z-10">

            <!-- Service 1 -->
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20 mb-24 pb-24 border-b border-gray-100 last:border-0 last:mb-0 last:pb-0 group">
                <div class="lg:w-1/2 w-full order-2 lg:order-1">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-brand-primary/5 rounded-2xl text-brand-secondary mb-8 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-brand-primary mb-6 transition-colors duration-300">
                        {{ __('المقاولات العامة والبناء') }}</h2>
                    <p class="text-brand-muted leading-relaxed mb-8 text-lg">
                        {{ __('نقوم بتنفيذ جميع أنواع المشاريع السكنية، التجارية، والصناعية. نعتمد على أحدث التقنيات وأفضل المواد لضمان متانة وجودة البناء في كل مرحلة.') }}
                    </p>

                    <ul class="space-y-5 font-medium">
                        <li class="flex items-start gap-4 text-brand-primary">
                            <span class="flex-shrink-0 w-6 h-6 mt-1 flex items-center justify-center text-brand-secondary">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                            <span class="text-lg">{{ __('بناء الفلل والمجمعات السكنية') }}</span>
                        </li>
                        <li class="flex items-start gap-4 text-brand-primary">
                            <span class="flex-shrink-0 w-6 h-6 mt-1 flex items-center justify-center text-brand-secondary">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                            <span class="text-lg">{{ __('تشييد الأبراج والمراكز التجارية') }}</span>
                        </li>
                        <li class="flex items-start gap-4 text-brand-primary">
                            <span class="flex-shrink-0 w-6 h-6 mt-1 flex items-center justify-center text-brand-secondary">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                            <span class="text-lg">{{ __('أعمال التشطيبات والديكور الداخلي المتكامل') }}</span>
                        </li>
                    </ul>
                </div>
                <div class="lg:w-1/2 w-full order-1 lg:order-2">
                    <div class="aspect-[4/3] rounded-[2.5rem] overflow-hidden shadow-card border border-gray-100 bg-gray-100 flex items-center justify-center group-hover:-translate-y-2 transition-transform duration-500 relative">
                        <img src="https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=1200&auto=format&fit=crop"
                            onerror="this.style.opacity='0'" alt="Construction"
                            class="w-full h-full object-cover relative z-10 transition-opacity duration-500">
                        <div class="absolute inset-0 bg-brand-primary/5 group-hover:bg-transparent transition-colors duration-500 z-20"></div>
                    </div>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20 mb-24 pb-24 border-b border-gray-100 last:border-0 last:mb-0 last:pb-0 group">
                <div class="lg:w-1/2 w-full">
                    <div class="aspect-[4/3] rounded-[2.5rem] overflow-hidden shadow-card border border-gray-100 bg-gray-100 flex items-center justify-center group-hover:-translate-y-2 transition-transform duration-500 relative">
                        <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1200&auto=format&fit=crop"
                            onerror="this.style.opacity='0'" alt="Architecture"
                            class="w-full h-full object-cover relative z-10 transition-opacity duration-500">
                        <div class="absolute inset-0 bg-brand-primary/5 group-hover:bg-transparent transition-colors duration-500 z-20"></div>
                    </div>
                </div>
                <div class="lg:w-1/2 w-full">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-brand-primary/5 rounded-2xl text-brand-secondary mb-8 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-brand-primary mb-6 transition-colors duration-300">
                        {{ __('التصميم المعماري والاستشارات') }}</h2>
                    <p class="text-brand-muted leading-relaxed mb-8 text-lg">
                        {{ __('نقدم استشارات هندسية وتصاميم معمارية مبتكرة تواكب العصر وتلبي تطلعاتك. فريقنا من المهندسين مستعد لتحويل أفكارك إلى واقع يفوق خيالك.') }}
                    </p>

                    <ul class="space-y-5 font-medium">
                        <li class="flex items-start gap-4 text-brand-primary">
                            <span class="flex-shrink-0 w-6 h-6 mt-1 flex items-center justify-center text-brand-secondary">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                            <span class="text-lg">{{ __('التصميم المعماري الحديث والكلاسيكي') }}</span>
                        </li>
                        <li class="flex items-start gap-4 text-brand-primary">
                            <span class="flex-shrink-0 w-6 h-6 mt-1 flex items-center justify-center text-brand-secondary">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                            <span class="text-lg">{{ __('التخطيط الحضري وتنسيق المواقع') }}</span>
                        </li>
                        <li class="flex items-start gap-4 text-brand-primary">
                            <span class="flex-shrink-0 w-6 h-6 mt-1 flex items-center justify-center text-brand-secondary">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                            <span class="text-lg">{{ __('استخراج التراخيص والإشراف الهندسي') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20 mb-24 pb-24 border-b border-gray-100 last:border-0 last:mb-0 last:pb-0 group">
                <div class="lg:w-1/2 w-full order-2 lg:order-1">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-brand-primary/5 rounded-2xl text-brand-secondary mb-8 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-brand-primary mb-6 transition-colors duration-300">
                        {{ __('مشاريع البنية التحتية') }}</h2>
                    <p class="text-brand-muted leading-relaxed mb-8 text-lg">
                        {{ __('مشاريع البنية التحتية تعتبر الأساس لأي تطور عمراني. نحن متخصصون في تجهيز الأراضي وشبكات الطرق وتمديدات المياه والصرف الصحي بأعلى مقاييس الاستدامة.') }}
                    </p>

                    <ul class="space-y-5 font-medium">
                        <li class="flex items-start gap-4 text-brand-primary">
                            <span class="flex-shrink-0 w-6 h-6 mt-1 flex items-center justify-center text-brand-secondary">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                            <span class="text-lg">{{ __('أعمال الحفر والردم وتسوية الأراضي') }}</span>
                        </li>
                        <li class="flex items-start gap-4 text-brand-primary">
                            <span class="flex-shrink-0 w-6 h-6 mt-1 flex items-center justify-center text-brand-secondary">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                            <span class="text-lg">{{ __('تمديد شبكات المياه والصرف الصحي') }}</span>
                        </li>
                        <li class="flex items-start gap-4 text-brand-primary">
                            <span class="flex-shrink-0 w-6 h-6 mt-1 flex items-center justify-center text-brand-secondary">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                            <span class="text-lg">{{ __('رصف وسفلتة الطرق وإنارة الشوارع') }}</span>
                        </li>
                    </ul>
                </div>
                <div class="lg:w-1/2 w-full order-1 lg:order-2">
                    <div class="aspect-[4/3] rounded-[2.5rem] overflow-hidden shadow-card border border-gray-100 bg-gray-100 flex items-center justify-center group-hover:-translate-y-2 transition-transform duration-500 relative">
                        <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?q=80&w=1200&auto=format&fit=crop"
                            onerror="this.style.opacity='0'" alt="Infrastructure"
                            class="w-full h-full object-cover relative z-10 transition-opacity duration-500">
                        <div class="absolute inset-0 bg-brand-primary/5 group-hover:bg-transparent transition-colors duration-500 z-20"></div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @push('scripts')
        <style>
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in-up {
                animation: fadeInUp 0.8s ease-out forwards;
            }
        </style>
    @endpush
</x-layouts.app>
