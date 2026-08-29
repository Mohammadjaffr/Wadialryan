<x-layouts.app>
    <x-slot:title>{{ __('اتصل بنا - وادي الريان للمقاولات') }}</x-slot>
    
    <!-- Header -->
    <section class="relative pt-40 pb-24 bg-brand-surface flex items-center justify-center overflow-hidden border-b border-white/5">
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="mb-4">
                <span class="inline-block text-brand-orange font-bold tracking-[0.2em] uppercase text-sm mb-2 px-4 py-1 bg-brand-orange/10 rounded-full">{{ __('تواصل معنا') }}</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6">{{ __('لنتحدث حول مشروعك القادم') }}</h1>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto font-medium leading-relaxed">{{ __('فريقنا مستعد لتحويل رؤيتك إلى واقع ملموس. تواصل معنا اليوم لنبدأ رحلة البناء.') }}</p>
        </div>
    </section>

    <section class="py-24 bg-brand-dark relative overflow-hidden">
        <div class="container mx-auto px-4 md:px-6 relative z-10">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                <!-- Contact Info (Left Column) -->
                <div class="lg:col-span-4">
                    <h2 class="text-3xl font-bold text-white mb-8">{{ __('معلومات التواصل') }}</h2>
                    
                    <div class="space-y-6">
                        <!-- Info Card 1 -->
                        <div class="bg-brand-surface p-6 rounded-2xl border border-gray-800 flex items-start gap-5 hover:shadow-md transition-shadow">
                            <div class="w-12 h-12 rounded-xl bg-brand-dark border border-gray-800 flex items-center justify-center text-brand-orange shrink-0 shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-white mb-1">{{ __('المقر الرئيسي') }}</h4>
                                <p class="text-gray-400 font-medium text-sm leading-relaxed">{!! __('سيئون، حضرموت،<br>الجمهورية اليمنية') !!}</p>
                            </div>
                        </div>
                        
                        <!-- Info Card 2 -->
                        <div class="bg-brand-surface p-6 rounded-2xl border border-gray-800 flex items-start gap-5 hover:shadow-md transition-shadow">
                            <div class="w-12 h-12 rounded-xl bg-brand-dark border border-gray-800 flex items-center justify-center text-brand-orange shrink-0 shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-white mb-1">{{ __('تواصل هاتفياً') }}</h4>
                                <p class="text-gray-400 font-medium text-sm dir-ltr text-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}" dir="ltr">+967 700 000 000</p>
                            </div>
                        </div>
                        
                        <!-- Info Card 3 -->
                        <div class="bg-brand-surface p-6 rounded-2xl border border-gray-800 flex items-start gap-5 hover:shadow-md transition-shadow">
                            <div class="w-12 h-12 rounded-xl bg-brand-dark border border-gray-800 flex items-center justify-center text-brand-orange shrink-0 shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-white mb-1">{{ __('البريد الإلكتروني') }}</h4>
                                <p class="text-gray-400 font-medium text-sm">info@wadialryan.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form (Right Column) -->
                <div class="lg:col-span-8">
                    <div class="bg-brand-surface p-8 md:p-12 rounded-3xl border border-gray-800 shadow-xl shadow-brand-dark/50">
                        <h2 class="text-2xl font-bold text-white mb-2">{{ __('أرسل رسالة') }}</h2>
                        <p class="text-gray-400 font-medium mb-10">{{ __('يرجى تعبئة النموذج أدناه وسنقوم بالرد في أقرب وقت.') }}</p>
                        
                        @if(session('success'))
                            <div class="mb-8 bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl flex items-start gap-4">
                                <svg class="w-6 h-6 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div>
                                    <strong class="font-bold block">{{ __('تم الإرسال بنجاح!') }}</strong>
                                    <span class="block sm:inline text-sm mt-1">{{ session('success') }}</span>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <!-- Input Group -->
                            <div>
                                <label for="name" class="block text-gray-300 font-bold mb-2 text-sm">{{ __('الاسم الكامل') }} <span class="text-red-500">*</span></label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full bg-brand-dark border border-gray-800 rounded-xl py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-brand-orange/50 focus:border-brand-orange transition-colors" required>
                                @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="email" class="block text-gray-300 font-bold mb-2 text-sm">{{ __('البريد الإلكتروني') }} <span class="text-red-500">*</span></label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full bg-brand-dark border border-gray-800 rounded-xl py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-brand-orange/50 focus:border-brand-orange transition-colors" required>
                                    @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                
                                <div>
                                    <label for="phone" class="block text-gray-300 font-bold mb-2 text-sm">{{ __('رقم الهاتف') }}</label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="w-full bg-brand-dark border border-gray-800 rounded-xl py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-brand-orange/50 focus:border-brand-orange transition-colors dir-ltr text-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}">
                                    @error('phone') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-300 font-bold mb-2 text-sm">{{ __('نوع الخدمة المطلوبة') }}</label>
                                <div class="relative">
                                    <select name="service_requested" class="w-full bg-brand-dark border border-gray-800 rounded-xl py-3 px-4 pr-10 text-white appearance-none focus:outline-none focus:ring-2 focus:ring-brand-orange/50 focus:border-brand-orange transition-colors cursor-pointer">
                                        <option value="">-- {{ __('اختر الخدمة') }} --</option>
                                        <option value="{{ __('البناء والمقاولات') }}" {{ old('service_requested') == __('البناء والمقاولات') ? 'selected' : '' }}>{{ __('البناء والمقاولات العامة') }}</option>
                                        <option value="{{ __('التصميم المعماري') }}" {{ old('service_requested') == __('التصميم المعماري') ? 'selected' : '' }}>{{ __('التصميم المعماري والاستشارات') }}</option>
                                        <option value="{{ __('البنية التحتية') }}" {{ old('service_requested') == __('البنية التحتية') ? 'selected' : '' }}>{{ __('مشاريع البنية التحتية') }}</option>
                                        <option value="{{ __('أخرى') }}" {{ old('service_requested') == __('أخرى') ? 'selected' : '' }}>{{ __('أخرى / استفسار عام') }}</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-gray-400">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="message" class="block text-gray-300 font-bold mb-2 text-sm">{{ __('تفاصيل المشروع أو الاستفسار') }} <span class="text-red-500">*</span></label>
                                <textarea name="message" id="message" rows="5" class="w-full bg-brand-dark border border-gray-800 rounded-xl py-3 px-4 text-white focus:outline-none focus:ring-2 focus:ring-brand-orange/50 focus:border-brand-orange transition-colors resize-none" required>{{ old('message') }}</textarea>
                                @error('message') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div class="pt-4">
                                <button type="submit" class="w-full bg-brand-orange text-white font-bold py-4 px-6 rounded-full hover:bg-brand-amber transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5 flex justify-center items-center gap-3 group">
                                    {{ __('إرسال الطلب الآن') }}
                                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform rtl:rotate-180 group-hover:{{ app()->getLocale() == 'ar' ? '-translate-x-1' : 'translate-x-1' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</x-layouts.app>
