<x-layouts.app>
    <x-slot:title>{{ __('اطلب تسعيرة - وادي الريان للمقاولات') }}</x-slot>

    @php
        $companySettings = app(\App\Settings\CompanySettings::class);
        $locale = app()->getLocale();
    @endphp

    <!-- Header -->
    <section class="flex overflow-hidden relative justify-center items-center pt-40 pb-24 bg-brand-primary">
        <div class="absolute inset-0 opacity-20 z-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-secondary/40 via-transparent to-transparent"></div>

        <div class="container relative z-10 px-4 mx-auto text-center">
            <div class="mb-4 opacity-0 transform translate-y-4 animate-fade-in-up">
                <span class="inline-flex gap-2 items-center px-4 py-2 mb-2 text-sm font-bold tracking-wide rounded-full bg-brand-secondary/20 text-brand-secondary">{{ __('طلب تسعيرة') }}</span>
            </div>
            <h1 class="mb-6 text-4xl font-extrabold opacity-0 transform translate-y-4 md:text-6xl text-white animate-fade-in-up"
                style="animation-delay: 100ms;">{{ __('ابدأ مشروعك معنا') }}</h1>
            <p class="mx-auto max-w-2xl text-lg font-medium leading-relaxed opacity-0 transform translate-y-4 text-white/80 animate-fade-in-up"
                style="animation-delay: 200ms;">
                {{ __('نحن مستعدون لتقديم أفضل الحلول الهندسية والإنشائية لمشروعك. يرجى تزويدنا بالتفاصيل لنتمكن من دراسة طلبك.') }}</p>
        </div>
    </section>

    <section class="overflow-hidden relative py-24 bg-gray-50">
        <div class="container relative z-10 px-4 mx-auto max-w-4xl md:px-6">
            <div class="bg-white p-8 md:p-12 rounded-[2.5rem] border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 relative overflow-hidden">
                @if (session('success'))
                    <div class="flex relative z-10 gap-4 items-start px-6 py-4 mb-8 text-green-700 bg-green-50 rounded-2xl border border-green-200">
                        <x-heroicon-o-check-circle class="w-6 h-6 shrink-0 mt-0.5"/>
                        <div>
                            <strong class="block font-bold">{{ __('تم الإرسال بنجاح!') }}</strong>
                            <span class="block mt-1 text-sm text-green-600 sm:inline">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <form action="{{ route('rfq.submit') }}" method="POST" class="relative z-10 space-y-6">
                    @csrf
                    
                    <h3 class="text-xl font-bold text-brand-primary border-b border-gray-100 pb-3 mb-6">{{ __('معلومات الاتصال') }}</h3>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-semibold text-brand-primary">{{ __('الاسم الكامل') }}
                                <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="px-5 py-4 w-full placeholder-gray-400 bg-gray-50 rounded-2xl border border-gray-200 transition-all duration-300 text-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-secondary/50 focus:border-brand-secondary"
                                placeholder="{{ __('أدخل اسمك') }}" required>
                            @error('name')
                                <span class="block mt-2 text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="company" class="block mb-2 text-sm font-semibold text-brand-primary">{{ __('الشركة / المؤسسة') }}</label>
                            <input type="text" name="company" id="company" value="{{ old('company') }}"
                                class="px-5 py-4 w-full placeholder-gray-400 bg-gray-50 rounded-2xl border border-gray-200 transition-all duration-300 text-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-secondary/50 focus:border-brand-secondary"
                                placeholder="{{ __('اسم الشركة (اختياري)') }}">
                            @error('company')
                                <span class="block mt-2 text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block mb-2 text-sm font-semibold text-brand-primary">{{ __('البريد الإلكتروني') }}
                                <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="px-5 py-4 w-full placeholder-gray-400 bg-gray-50 rounded-2xl border border-gray-200 transition-all duration-300 text-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-secondary/50 focus:border-brand-secondary"
                                placeholder="example@domain.com" required>
                            @error('email')
                                <span class="block mt-2 text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block mb-2 text-sm font-semibold text-brand-primary">{{ __('رقم الهاتف') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 px-5 text-brand-primary placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-secondary/50 focus:border-brand-secondary transition-all duration-300 dir-ltr text-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}"
                                placeholder="+967 7xx xxx xxx" required>
                            @error('phone')
                                <span class="block mt-2 text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-brand-primary border-b border-gray-100 pb-3 mb-6 mt-8">{{ __('تفاصيل المشروع') }}</h3>

                    <div>
                        <label class="block mb-2 text-sm font-semibold text-brand-primary">{{ __('نوع الخدمة المطلوبة') }}</label>
                        <div class="relative">
                            <select name="service_requested"
                                class="px-5 py-4 pr-10 w-full bg-gray-50 rounded-2xl border border-gray-200 transition-all duration-300 appearance-none cursor-pointer text-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-secondary/50 focus:border-brand-secondary">
                                <option value="" class="bg-white">-- {{ __('اختر الخدمة') }} --</option>
                                @foreach(\App\Models\Service::all() as $service)
                                    <option value="{{ $service->title }}" class="bg-white"
                                        {{ old('service_requested') == $service->title ? 'selected' : '' }}>
                                        {{ $service->title }}</option>
                                @endforeach
                            </select>
                            <div class="flex absolute inset-y-0 right-5 items-center text-gray-400 pointer-events-none">
                                <x-heroicon-o-chevron-down class="w-5 h-5"/>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block mb-2 text-sm font-semibold text-brand-primary">{{ __('وصف المشروع') }}
                            <span class="text-red-500">*</span></label>
                        <textarea name="message" id="message" rows="6"
                            class="px-5 py-4 w-full placeholder-gray-400 bg-gray-50 rounded-2xl border border-gray-200 transition-all duration-300 resize-none text-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-secondary/50 focus:border-brand-secondary"
                            placeholder="{{ __('يرجى تزويدنا بتفاصيل مساحة المشروع، الموقع، الميزانية التقديرية، والمدة الزمنية المتوقعة.') }}" required>{{ old('message') }}</textarea>
                        @error('message')
                            <span class="block mt-2 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="pt-6 text-center">
                        <button type="submit"
                            class="inline-flex gap-3 justify-center items-center px-12 py-4 w-full md:w-auto font-bold text-white rounded-full transition-all duration-500 bg-brand-secondary hover:bg-brand-primary shadow-lg hover:shadow-xl hover:-translate-y-1 group">
                            <span class="text-lg">{{ __('إرسال الطلب الآن') }}</span>
                            <x-heroicon-o-paper-airplane class="w-6 h-6 transition-transform rtl:-scale-x-100 group-hover:{{ app()->getLocale() == 'ar' ? '-translate-x-1' : 'translate-x-1' }}"/>
                        </button>
                    </div>
                </form>
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
