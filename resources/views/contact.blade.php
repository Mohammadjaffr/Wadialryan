<x-layouts.app>
    <x-slot:title>{{ __('اتصل بنا - وادي الريان للمقاولات') }}</x-slot>

    @php
        $companySettings = app(\App\Settings\CompanySettings::class);
        $locale = app()->getLocale();
    @endphp

    <!-- Header -->
    <section class="flex overflow-hidden relative justify-center items-center pt-40 pb-24 bg-gray-50">
        <div class="absolute inset-0 z-0 bg-gradient-to-br to-white from-gray-50"></div>
        <div class="absolute inset-0 opacity-20 z-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-secondary/20 via-transparent to-transparent"></div>

        <div class="container relative z-10 px-4 mx-auto text-center">
            <div class="mb-4 opacity-0 transform translate-y-4 animate-fade-in-up">
                <span class="inline-flex gap-2 items-center px-4 py-2 mb-2 text-sm font-bold tracking-wide rounded-full bg-brand-primary/10 text-brand-primary">{{ __('تواصل معنا') }}</span>
            </div>
            <h1 class="mb-6 text-4xl font-extrabold opacity-0 transform translate-y-4 md:text-6xl text-brand-primary animate-fade-in-up"
                style="animation-delay: 100ms;">{{ __('لنتحدث حول مشروعك القادم') }}</h1>
            <p class="mx-auto max-w-2xl text-lg font-medium leading-relaxed opacity-0 transform translate-y-4 text-gray-600 animate-fade-in-up"
                style="animation-delay: 200ms;">
                {{ __('فريقنا مستعد لتحويل رؤيتك إلى واقع ملموس. تواصل معنا اليوم لنبدأ رحلة البناء.') }}</p>
        </div>
    </section>

    <section class="overflow-hidden relative py-24 bg-white border-t border-gray-100">
        <div class="absolute top-0 right-0 -mt-48 -mr-48 w-96 h-96 rounded-full blur-3xl pointer-events-none bg-brand-secondary/5"></div>
        <div class="absolute bottom-0 left-0 -mb-48 -ml-48 w-96 h-96 rounded-full blur-3xl pointer-events-none bg-brand-primary/5"></div>

        <div class="container relative z-10 px-4 mx-auto md:px-6">
            <div class="grid grid-cols-1 gap-16 lg:grid-cols-12">
                <!-- Contact Info -->
                <div class="lg:col-span-4">
                    <h2 class="mb-8 text-3xl font-bold text-brand-primary">{{ __('معلومات التواصل') }}</h2>

                    <div class="space-y-6">
                        @if($companySettings->address)
                        <div class="flex gap-5 items-start p-6 bg-white rounded-3xl border border-gray-100 transition-all duration-300 hover:border-brand-secondary group shadow-lg hover:shadow-xl">
                            <div class="flex justify-center items-center w-14 h-14 rounded-2xl transition-all duration-300 bg-brand-secondary/10 text-brand-secondary shrink-0 group-hover:scale-110 group-hover:bg-brand-secondary group-hover:text-white">
                                <x-heroicon-o-map-pin class="w-7 h-7"/>
                            </div>
                            <div>
                                <h4 class="mb-2 text-lg font-bold text-brand-primary">{{ __('المقر الرئيسي') }}</h4>
                                <p class="text-sm font-medium leading-relaxed text-gray-600">{{ $companySettings->address[$locale] ?? '' }}</p>
                            </div>
                        </div>
                        @endif

                        @if($companySettings->phone)
                        <div class="flex gap-5 items-start p-6 bg-white rounded-3xl border border-gray-100 transition-all duration-300 hover:border-brand-secondary group shadow-lg hover:shadow-xl">
                            <div class="flex justify-center items-center w-14 h-14 rounded-2xl transition-all duration-300 bg-brand-secondary/10 text-brand-secondary shrink-0 group-hover:scale-110 group-hover:bg-brand-secondary group-hover:text-white">
                                <x-heroicon-o-phone class="w-7 h-7"/>
                            </div>
                            <div>
                                <h4 class="mb-2 text-lg font-bold text-brand-primary">{{ __('تواصل هاتفياً') }}</h4>
                                <p class="text-gray-600 font-medium text-sm dir-ltr text-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}"
                                    dir="ltr">{{ $companySettings->phone }}</p>
                            </div>
                        </div>
                        @endif

                        @if($companySettings->general_email)
                        <div class="flex gap-5 items-start p-6 bg-white rounded-3xl border border-gray-100 transition-all duration-300 hover:border-brand-secondary group shadow-lg hover:shadow-xl">
                            <div class="flex justify-center items-center w-14 h-14 rounded-2xl transition-all duration-300 bg-brand-secondary/10 text-brand-secondary shrink-0 group-hover:scale-110 group-hover:bg-brand-secondary group-hover:text-white">
                                <x-heroicon-o-envelope class="w-7 h-7"/>
                            </div>
                            <div>
                                <h4 class="mb-2 text-lg font-bold text-brand-primary">{{ __('البريد الإلكتروني') }}</h4>
                                <p class="text-sm font-medium text-gray-600">{{ $companySettings->general_email }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Form -->
                <div class="lg:col-span-8">
                    <div class="bg-white p-8 md:p-12 rounded-[2.5rem] border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 relative overflow-hidden">
                        <h2 class="relative z-10 mb-3 text-3xl font-bold text-brand-primary">{{ __('أرسل رسالة') }}</h2>
                        <p class="relative z-10 mb-10 font-medium text-gray-600">
                            {{ __('يرجى تعبئة النموذج أدناه وسنقوم بالرد في أقرب وقت.') }}</p>

                        @if (session('success'))
                            <div class="flex relative z-10 gap-4 items-start px-6 py-4 mb-8 text-green-700 bg-green-50 rounded-2xl border border-green-200">
                                <x-heroicon-o-check-circle class="w-6 h-6 shrink-0 mt-0.5"/>
                                <div>
                                    <strong class="block font-bold">{{ __('تم الإرسال بنجاح!') }}</strong>
                                    <span class="block mt-1 text-sm text-green-600 sm:inline">{{ session('success') }}</span>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST" class="relative z-10 space-y-6">
                            @csrf

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

                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
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
                                    <label for="phone" class="block mb-2 text-sm font-semibold text-brand-primary">{{ __('رقم الهاتف') }}</label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                        class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 px-5 text-brand-primary placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-secondary/50 focus:border-brand-secondary transition-all duration-300 dir-ltr text-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}"
                                        placeholder="+967 7xx xxx xxx">
                                    @error('phone')
                                        <span class="block mt-2 text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="subject" class="block mb-2 text-sm font-semibold text-brand-primary">{{ __('الموضوع') }}</label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                                    class="px-5 py-4 w-full placeholder-gray-400 bg-gray-50 rounded-2xl border border-gray-200 transition-all duration-300 text-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-secondary/50 focus:border-brand-secondary"
                                    placeholder="{{ __('عنوان الرسالة') }}">
                                @error('subject')
                                    <span class="block mt-2 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="message" class="block mb-2 text-sm font-semibold text-brand-primary">{{ __('تفاصيل الرسالة') }}
                                    <span class="text-red-500">*</span></label>
                                <textarea name="message" id="message" rows="5"
                                    class="px-5 py-4 w-full placeholder-gray-400 bg-gray-50 rounded-2xl border border-gray-200 transition-all duration-300 resize-none text-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-secondary/50 focus:border-brand-secondary"
                                    placeholder="{{ __('كيف يمكننا مساعدتك؟') }}" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="block mt-2 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="pt-6">
                                <button type="submit"
                                    class="flex gap-3 justify-center items-center px-6 py-4 w-full font-bold text-white rounded-2xl transition-all duration-500 bg-brand-secondary hover:bg-brand-primary shadow-lg hover:shadow-xl hover:-translate-y-1 group">
                                    <span class="text-lg">{{ __('إرسال الرسالة') }}</span>
                                    <x-heroicon-o-paper-airplane class="w-6 h-6 transition-transform rtl:-scale-x-100 group-hover:{{ app()->getLocale() == 'ar' ? '-translate-x-1' : 'translate-x-1' }}"/>
                                </button>
                            </div>
                        </form>
                    </div>
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
