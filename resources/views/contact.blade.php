<x-layouts.app>
    <x-slot:title>{{ __('اتصل بنا - وادي الريان للمقاولات') }}</x-slot>

    <!-- Header -->
    <section class="flex overflow-hidden relative justify-center items-center pt-40 pb-24 bg-brand-background">
        <!-- Background Pattern/Gradient -->
        <div class="absolute inset-0 z-0 bg-gradient-to-br to-white from-brand-background"></div>
        <div class="absolute inset-0 opacity-20 z-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-secondary/20 via-transparent to-transparent"></div>

        <div class="container relative z-10 px-4 mx-auto text-center">
            <div class="mb-4 opacity-0 transform translate-y-4 animate-fade-in-up">
                <span class="inline-flex gap-2 items-center px-4 py-2 mb-2 text-sm font-bold tracking-wide rounded-full bg-brand-primary/10 text-brand-primary">{{ __('تواصل معنا') }}</span>
            </div>
            <h1 class="mb-6 text-4xl font-extrabold opacity-0 transform translate-y-4 md:text-6xl text-brand-primary animate-fade-in-up"
                style="animation-delay: 100ms;">{{ __('لنتحدث حول مشروعك القادم') }}</h1>
            <p class="mx-auto max-w-2xl text-lg font-medium leading-relaxed opacity-0 transform translate-y-4 text-brand-muted animate-fade-in-up"
                style="animation-delay: 200ms;">
                {{ __('فريقنا مستعد لتحويل رؤيتك إلى واقع ملموس. تواصل معنا اليوم لنبدأ رحلة البناء.') }}</p>
        </div>
    </section>

    <section class="overflow-hidden relative py-24 bg-white border-t border-gray-100">
        <!-- Decorative elements -->
        <div class="absolute top-0 right-0 -mt-48 -mr-48 w-96 h-96 rounded-full blur-3xl pointer-events-none bg-brand-secondary/5"></div>
        <div class="absolute bottom-0 left-0 -mb-48 -ml-48 w-96 h-96 rounded-full blur-3xl pointer-events-none bg-brand-tertiary/5"></div>

        <div class="container relative z-10 px-4 mx-auto md:px-6">
            <div class="grid grid-cols-1 gap-16 lg:grid-cols-12">
                <!-- Contact Info (Left Column in LTR, Right in RTL) -->
                <div class="lg:col-span-4">
                    <h2 class="mb-8 text-3xl font-bold text-brand-primary">{{ __('معلومات التواصل') }}</h2>

                    <div class="space-y-6">
                        <!-- Info Card 1 -->
                        <div class="flex gap-5 items-start p-6 bg-white rounded-3xl border border-gray-100 transition-all duration-300 hover:border-brand-secondary group shadow-card hover:shadow-soft">
                            <div class="flex justify-center items-center w-14 h-14 rounded-2xl transition-all duration-300 bg-brand-secondary/10 text-brand-secondary shrink-0 group-hover:scale-110 group-hover:bg-brand-secondary group-hover:text-white">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="mb-2 text-lg font-bold text-brand-primary">{{ __('المقر الرئيسي') }}</h4>
                                <p class="text-sm font-medium leading-relaxed text-brand-muted">{!! __('سيئون، حضرموت،<br>الجمهورية اليمنية') !!}</p>
                            </div>
                        </div>

                        <!-- Info Card 2 -->
                        <div class="flex gap-5 items-start p-6 bg-white rounded-3xl border border-gray-100 transition-all duration-300 hover:border-brand-secondary group shadow-card hover:shadow-soft">
                            <div class="flex justify-center items-center w-14 h-14 rounded-2xl transition-all duration-300 bg-brand-secondary/10 text-brand-secondary shrink-0 group-hover:scale-110 group-hover:bg-brand-secondary group-hover:text-white">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="mb-2 text-lg font-bold text-brand-primary">{{ __('تواصل هاتفياً') }}</h4>
                                <p class="text-brand-muted font-medium text-sm dir-ltr text-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}"
                                    dir="ltr">+967 700 000 000</p>
                            </div>
                        </div>

                        <!-- Info Card 3 -->
                        <div class="flex gap-5 items-start p-6 bg-white rounded-3xl border border-gray-100 transition-all duration-300 hover:border-brand-secondary group shadow-card hover:shadow-soft">
                            <div class="flex justify-center items-center w-14 h-14 rounded-2xl transition-all duration-300 bg-brand-secondary/10 text-brand-secondary shrink-0 group-hover:scale-110 group-hover:bg-brand-secondary group-hover:text-white">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="mb-2 text-lg font-bold text-brand-primary">{{ __('البريد الإلكتروني') }}</h4>
                                <p class="text-sm font-medium text-brand-muted">info@wadialryan.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form (Right Column in LTR, Left in RTL) -->
                <div class="lg:col-span-8">
                    <div class="bg-white p-8 md:p-12 rounded-[2.5rem] border border-gray-100 shadow-card hover:shadow-soft transition-all duration-500 relative overflow-hidden">
                        <div class="absolute top-0 right-0 -mt-32 -mr-32 w-64 h-64 rounded-full blur-3xl pointer-events-none bg-brand-secondary/5"></div>

                        <h2 class="relative z-10 mb-3 text-3xl font-bold text-brand-primary">{{ __('أرسل رسالة') }}</h2>
                        <p class="relative z-10 mb-10 font-medium text-brand-muted">
                            {{ __('يرجى تعبئة النموذج أدناه وسنقوم بالرد في أقرب وقت.') }}</p>

                        @if (session('success'))
                            <div class="flex relative z-10 gap-4 items-start px-6 py-4 mb-8 text-green-700 bg-green-50 rounded-2xl border border-green-200">
                                <svg class="mt-0.5 w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <strong class="block font-bold">{{ __('تم الإرسال بنجاح!') }}</strong>
                                    <span class="block mt-1 text-sm text-green-600 sm:inline">{{ session('success') }}</span>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST" class="relative z-10 space-y-6">
                            @csrf

                            <!-- Input Group -->
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
                                <label class="block mb-2 text-sm font-semibold text-brand-primary">{{ __('نوع الخدمة المطلوبة') }}</label>
                                <div class="relative">
                                    <select name="service_requested"
                                        class="px-5 py-4 pr-10 w-full bg-gray-50 rounded-2xl border border-gray-200 transition-all duration-300 appearance-none cursor-pointer text-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-secondary/50 focus:border-brand-secondary">
                                        <option value="" class="bg-white">-- {{ __('اختر الخدمة') }} --</option>
                                        <option value="{{ __('البناء والمقاولات') }}" class="bg-white"
                                            {{ old('service_requested') == __('البناء والمقاولات') ? 'selected' : '' }}>
                                            {{ __('البناء والمقاولات العامة') }}</option>
                                        <option value="{{ __('التصميم المعماري') }}" class="bg-white"
                                            {{ old('service_requested') == __('التصميم المعماري') ? 'selected' : '' }}>
                                            {{ __('التصميم المعماري والاستشارات') }}</option>
                                        <option value="{{ __('البنية التحتية') }}" class="bg-white"
                                            {{ old('service_requested') == __('البنية التحتية') ? 'selected' : '' }}>
                                            {{ __('مشاريع البنية التحتية') }}</option>
                                        <option value="{{ __('أخرى') }}" class="bg-white"
                                            {{ old('service_requested') == __('أخرى') ? 'selected' : '' }}>
                                            {{ __('أخرى / استفسار عام') }}</option>
                                    </select>
                                    <div class="flex absolute inset-y-0 right-5 items-center text-gray-400 pointer-events-none">
                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="message" class="block mb-2 text-sm font-semibold text-brand-primary">{{ __('تفاصيل المشروع أو الاستفسار') }}
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
                                    class="flex gap-3 justify-center items-center px-6 py-4 w-full font-bold text-white rounded-2xl transition-all duration-500 bg-brand-secondary hover:bg-brand-primary shadow-card hover:shadow-soft hover:-translate-y-1 group">
                                    <span class="text-lg">{{ __('إرسال الطلب الآن') }}</span>
                                    <svg class="w-6 h-6 transition-transform rtl:rotate-180 group-hover:{{ app()->getLocale() == 'ar' ? '-translate-x-1' : 'translate-x-1' }}"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
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
