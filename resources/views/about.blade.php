<x-layouts.app>
    <x-slot:title>{{ __('من نحن - وادي الريان للمقاولات') }}</x-slot>

    @php
        $companySettings = app(\App\Settings\CompanySettings::class);
        $locale = app()->getLocale();
    @endphp

    <!-- Header -->
    <section class="flex overflow-hidden relative justify-center items-center pt-40 pb-24 bg-brand-primary">
        <div
            class="absolute inset-0 opacity-20 z-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-secondary/40 via-transparent to-transparent">
        </div>

        <div class="container relative z-10 px-4 mx-auto text-center">
            <div class="mb-4 opacity-0 transform translate-y-4 animate-fade-in-up">
                <span
                    class="inline-flex gap-2 items-center px-4 py-2 mb-2 text-sm font-bold tracking-wide rounded-full bg-brand-secondary/20 text-brand-secondary">{{ __('عن الشركة') }}</span>
            </div>
            <h1 class="mb-6 text-4xl font-extrabold text-white opacity-0 transform translate-y-4 md:text-6xl animate-fade-in-up"
                style="animation-delay: 100ms;">{{ $companySettings->company_name[$locale] ?? __('وادي الريان') }}</h1>
            <p class="mx-auto max-w-2xl text-lg font-medium leading-relaxed opacity-0 transform translate-y-4 text-white/80 animate-fade-in-up"
                style="animation-delay: 200ms;">
                {{ $companySettings->about_subtitle[$locale] ?? __('شريكك الموثوق في البناء والتشييد والخدمات الهندسية منذ أكثر من عقدين.') }}
            </p>
        </div>
    </section>

    <!-- Company Profile -->
    <section class="py-24 bg-white">
        <div class="container px-4 mx-auto max-w-7xl md:px-6">
            <div class="grid grid-cols-1 gap-16 items-center lg:grid-cols-2">
                <div class="flex flex-col gap-6">
                    <h2 class="text-3xl font-extrabold leading-tight md:text-4xl text-brand-primary">
                        {{ __('نبذة عن الشركة') }}
                    </h2>
                    <div class="w-20 h-1.5 rounded-full bg-brand-secondary"></div>
                    <div class="mb-6 text-gray-600 prose prose-lg prose-p:leading-relaxed">
                        {!! $companySettings->about_story[$locale] ?? '<p>نحن شركة رائدة متخصصة في المقاولات العامة...</p>' !!}
                    </div>

                    @if (!empty($companySettings->vision[$locale]))
                        <div class="mb-4">
                            <h3 class="mb-2 text-xl font-bold text-brand-primary">{{ __('الرؤية') }}</h3>
                            <div class="text-gray-600 prose">{!! $companySettings->vision[$locale] !!}</div>
                        </div>
                    @endif

                    @if (!empty($companySettings->mission[$locale]))
                        <div class="mb-4">
                            <h3 class="mb-2 text-xl font-bold text-brand-primary">{{ __('الرسالة') }}</h3>
                            <div class="text-gray-600 prose">{!! $companySettings->mission[$locale] !!}</div>
                        </div>
                    @endif
                </div>
                <div class="relative">
                    <div
                        class="overflow-hidden rounded-2xl border border-gray-100 aspect-[4/3] shadow-2xl bg-gray-50 p-2">
                        <img src="{{ $companySettings->about_image ? Storage::url($companySettings->about_image) : 'https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=1000&auto=format&fit=crop' }}"
                            alt="Company Profile"
                            class="{{ $companySettings->about_image ? 'object-contain' : 'object-cover' }} w-full h-full rounded-xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Certifications Section -->
    <section class="py-24 bg-gray-50 border-t border-gray-100">
        <div class="container px-4 mx-auto max-w-7xl md:px-6">
            <div class="mb-16 text-center">
                <span
                    class="inline-flex gap-2 items-center px-4 py-2 mb-5 text-sm font-bold tracking-wide rounded-full text-brand-secondary bg-brand-secondary/10">
                    <x-heroicon-o-shield-check class="w-5 h-5" />
                    {{ __('الشهادات والتراخيص') }}
                </span>
                <h2 class="text-3xl font-extrabold md:text-4xl text-brand-primary">{{ __('الاعتمادات الرسمية') }}</h2>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                @forelse(\App\Models\Certification::where('active', true)->orderBy('sort_order')->get() as $cert)
                    <div
                        class="p-8 text-center bg-white rounded-2xl border border-gray-100 shadow-lg transition-all duration-300 hover:-translate-y-2">
                        @if ($cert->image)
                            <img src="{{ $cert->imageUrl('image') }}" alt="{{ $cert->name }}"
                                class="object-contain mx-auto mb-6 h-24">
                        @else
                            <div
                                class="flex justify-center items-center mx-auto mb-6 w-24 h-24 bg-gray-50 rounded-full text-brand-secondary">
                                <x-heroicon-o-shield-check class="w-12 h-12" />
                            </div>
                        @endif
                        <h3 class="mb-3 text-xl font-bold text-brand-primary">{{ $cert->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $cert->issue_date ? $cert->issue_date->format('Y') : '' }}
                        </p>
                    </div>
                @empty
                    <div class="col-span-full py-10 text-center text-gray-500">
                        {{ __('لا توجد بيانات حالياً.') }}
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- HSE Section -->
    <section class="overflow-hidden relative py-24 bg-brand-primary">
        <div class="container relative z-10 px-4 mx-auto max-w-7xl md:px-6">
            <div class="grid grid-cols-1 gap-16 items-center lg:grid-cols-2">
                <div class="relative order-2 lg:order-1">
                    <div class="overflow-hidden rounded-2xl aspect-[4/3] shadow-2xl border border-brand-primary/50">
                        <img src="{{ $companySettings->hse_image ? Storage::url($companySettings->hse_image) : 'https://images.unsplash.com/photo-1504307651254-35680f356f58?q=80&w=1000&auto=format&fit=crop' }}"
                            alt="HSE" class="object-contain w-full h-full opacity-80 mix-blend-luminosity">
                        <div class="absolute inset-0 mix-blend-multiply bg-brand-primary/40"></div>
                    </div>
                </div>

                <div class="flex flex-col order-1 gap-6 lg:order-2">
                    <span
                        class="inline-flex gap-2 items-center px-4 py-2 w-max text-sm font-bold tracking-wide rounded-full text-brand-secondary bg-brand-secondary/20">
                        {{ $companySettings->hse_badge[$locale] ?? __('السلامة أولاً') }}
                    </span>
                    <h2 class="text-3xl font-extrabold leading-tight text-white md:text-4xl">
                        {{ $companySettings->hse_title[$locale] ?? __('الصحة والسلامة المهنية والبيئة (HSE)') }}
                    </h2>
                    <div class="w-20 h-1.5 rounded-full bg-brand-secondary"></div>
                    <p class="text-lg font-medium leading-relaxed text-gray-300">
                        {{ $companySettings->hse_text[$locale] ?? __('نلتزم في وادي الريان بأعلى معايير الأمن والسلامة للحفاظ على سلامة أفرادنا والمجتمع والبيئة. نطبق أنظمة صارمة لإدارة المخاطر والتأكد من توافق كافة عملياتنا مع المعايير الدولية والمحلية لضمان بيئة عمل آمنة ومستدامة.') }}
                    </p>

                    @if (!empty($companySettings->hse_list))
                        <ul class="mt-4 space-y-4 font-medium text-white/90">
                            @foreach ($companySettings->hse_list as $point)
                                @if (isset($point[$locale]))
                                    <li class="flex gap-4 items-start">
                                        <x-heroicon-o-check-circle class="w-6 h-6 text-brand-secondary shrink-0" />
                                        <span>{{ $point[$locale] }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
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
