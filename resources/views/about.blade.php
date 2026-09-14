<x-layouts.app>
    <x-slot:title>{{ __('من نحن - وادي الريان للمقاولات') }}</x-slot>

    @php
        $companySettings = app(\App\Settings\CompanySettings::class);
        $locale = app()->getLocale();
    @endphp

    <!-- Header -->
    <section class="flex overflow-hidden relative justify-center items-center pt-40 pb-24 bg-brand-primary">
        <div class="absolute inset-0 opacity-20 z-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-secondary/40 via-transparent to-transparent"></div>

        <div class="container relative z-10 px-4 mx-auto text-center">
            <div class="mb-4 opacity-0 transform translate-y-4 animate-fade-in-up">
                <span class="inline-flex gap-2 items-center px-4 py-2 mb-2 text-sm font-bold tracking-wide rounded-full bg-brand-secondary/20 text-brand-secondary">{{ __('عن الشركة') }}</span>
            </div>
            <h1 class="mb-6 text-4xl font-extrabold opacity-0 transform translate-y-4 md:text-6xl text-white animate-fade-in-up"
                style="animation-delay: 100ms;">{{ $companySettings->company_name[$locale] ?? __('وادي الريان') }}</h1>
            <p class="mx-auto max-w-2xl text-lg font-medium leading-relaxed opacity-0 transform translate-y-4 text-white/80 animate-fade-in-up"
                style="animation-delay: 200ms;">
                {{ __('شريكك الموثوق في البناء والتشييد والخدمات الهندسية منذ أكثر من عقدين.') }}</p>
        </div>
    </section>

    <!-- Company Profile -->
    <section class="py-24 bg-white">
        <div class="container px-4 mx-auto max-w-7xl md:px-6">
            <div class="grid grid-cols-1 gap-16 items-center lg:grid-cols-2">
                <div class="flex flex-col gap-6">
                    <h2 class="text-3xl md:text-4xl font-extrabold leading-tight text-brand-primary">
                        {{ __('نبذة عن الشركة') }}
                    </h2>
                    <div class="w-20 h-1.5 rounded-full bg-brand-secondary"></div>
                    <div class="prose prose-lg text-gray-600 prose-p:leading-relaxed">
                        <p>{!! nl2br(e($companySettings->company_profile[$locale] ?? __('نحن شركة رائدة متخصصة في المقاولات العامة...'))) !!}</p>
                    </div>
                </div>
                <div class="relative">
                    <div class="overflow-hidden rounded-2xl border border-gray-100 aspect-[4/3] shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=1000&auto=format&fit=crop" alt="Company Profile" class="object-cover w-full h-full">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Certifications Section -->
    <section class="py-24 bg-gray-50 border-t border-gray-100">
        <div class="container px-4 mx-auto max-w-7xl md:px-6">
            <div class="text-center mb-16">
                <span class="inline-flex gap-2 items-center px-4 py-2 mb-5 text-sm font-bold tracking-wide rounded-full text-brand-secondary bg-brand-secondary/10">
                    <x-heroicon-o-shield-check class="w-5 h-5"/>
                    {{ __('الشهادات والتراخيص') }}
                </span>
                <h2 class="text-3xl font-extrabold md:text-4xl text-brand-primary">{{ __('الاعتمادات الرسمية') }}</h2>
            </div>
            
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                @forelse(\App\Models\Certification::where('active', true)->orderBy('sort_order')->get() as $cert)
                    <div class="p-8 bg-white rounded-2xl border border-gray-100 shadow-lg text-center hover:-translate-y-2 transition-all duration-300">
                        @if($cert->image)
                            <img src="{{ $cert->imageUrl('image') }}" alt="{{ $cert->name }}" class="h-24 mx-auto mb-6 object-contain">
                        @else
                            <div class="w-24 h-24 mx-auto mb-6 bg-gray-50 rounded-full flex items-center justify-center text-brand-secondary">
                                <x-heroicon-o-shield-check class="w-12 h-12"/>
                            </div>
                        @endif
                        <h3 class="mb-3 text-xl font-bold text-brand-primary">{{ $cert->name }}</h3>
                        <p class="text-gray-500 text-sm">{{ $cert->issue_date ? $cert->issue_date->format('Y') : '' }}</p>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500 py-10">
                        {{ __('لا توجد بيانات حالياً.') }}
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- HSE Section -->
    <section class="py-24 bg-brand-primary relative overflow-hidden">
        <div class="container px-4 mx-auto max-w-7xl md:px-6 relative z-10">
            <div class="grid grid-cols-1 gap-16 items-center lg:grid-cols-2">
                <div class="order-2 lg:order-1 relative">
                    <div class="overflow-hidden rounded-2xl aspect-[4/3] shadow-2xl border border-brand-primary/50">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356f58?q=80&w=1000&auto=format&fit=crop" alt="HSE" class="object-cover w-full h-full opacity-80 mix-blend-luminosity">
                        <div class="absolute inset-0 bg-brand-primary/40 mix-blend-multiply"></div>
                    </div>
                </div>
                
                <div class="order-1 lg:order-2 flex flex-col gap-6">
                    <span class="inline-flex gap-2 items-center px-4 py-2 text-sm font-bold tracking-wide rounded-full w-max text-brand-secondary bg-brand-secondary/20">
                        {{ __('السلامة أولاً') }}
                    </span>
                    <h2 class="text-3xl font-extrabold leading-tight md:text-4xl text-white">
                        {{ __('الصحة والسلامة المهنية والبيئة (HSE)') }}
                    </h2>
                    <div class="w-20 h-1.5 rounded-full bg-brand-secondary"></div>
                    <p class="text-lg font-medium leading-relaxed text-gray-300">
                        {{ __('نلتزم في وادي الريان بأعلى معايير الأمن والسلامة للحفاظ على سلامة أفرادنا والمجتمع والبيئة. نطبق أنظمة صارمة لإدارة المخاطر والتأكد من توافق كافة عملياتنا مع المعايير الدولية والمحلية لضمان بيئة عمل آمنة ومستدامة.') }}
                    </p>
                    
                    <ul class="space-y-4 font-medium text-white/90 mt-4">
                        <li class="flex items-start gap-4">
                            <x-heroicon-o-check-circle class="w-6 h-6 text-brand-secondary shrink-0"/>
                            <span>{{ __('تطبيق برامج تدريبية دورية لكافة الكوادر العاملة.') }}</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <x-heroicon-o-check-circle class="w-6 h-6 text-brand-secondary shrink-0"/>
                            <span>{{ __('توفير معدات السلامة الشخصية الأحدث والمطابقة للمواصفات.') }}</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <x-heroicon-o-check-circle class="w-6 h-6 text-brand-secondary shrink-0"/>
                            <span>{{ __('الالتزام بالاشتراطات البيئية لتقليل البصمة الكربونية وإدارة المخلفات.') }}</span>
                        </li>
                    </ul>
                </div>
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
