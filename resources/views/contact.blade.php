<x-layouts.app>
    <x-slot:title>اتصل بنا - الرواد للمقاولات</x-slot>
    <!-- Header -->
    <section class="pt-32 pb-20 bg-brand-dark text-white text-center">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up">اتصل بنا</h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">نحن هنا للإجابة على استفساراتكم وتحويل أفكاركم إلى مشاريع ناجحة.</p>
        </div>
    </section>

    <section class="py-20 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4 md:px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Map and Info -->
                <div data-aos="fade-left">
                    <h2 class="text-3xl font-bold text-brand-dark mb-6">موقعنا ومعلومات التواصل</h2>
                    <p class="text-gray-600 mb-8">يسعدنا زيارتكم لمقرنا الرئيسي أو التواصل معنا عبر الهاتف والبريد الإلكتروني.</p>
                    
                    <div class="bg-white p-6 rounded-xl shadow-lg mb-8 space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-brand-gray rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-brand-dark mb-1">العنوان</h4>
                                <p class="text-gray-600">طريق الملك فهد، العليا، الرياض، المملكة العربية السعودية</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-brand-gray rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-brand-dark mb-1">الهاتف</h4>
                                <p class="text-gray-600">+966 50 000 0000</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-brand-gray rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-brand-dark mb-1">البريد الإلكتروني</h4>
                                <p class="text-gray-600">info@alruwad.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- Google Map Placeholder -->
                    <div class="w-full h-64 bg-gray-300 rounded-xl overflow-hidden shadow-lg flex items-center justify-center relative">
                        <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover opacity-60">
                        <div class="absolute text-brand-dark font-bold bg-white/80 px-4 py-2 rounded-lg backdrop-blur-sm shadow">خريطة الموقع</div>
                    </div>
                </div>

                <!-- Standard Form -->
                <div data-aos="fade-right">
                    <div class="bg-white rounded-xl shadow-xl p-8">
                        <h3 class="text-2xl font-bold text-brand-dark mb-6">أرسل لنا رسالة</h3>
                        
                        @if(session('success'))
                            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                                <strong class="font-bold">شكراً لك!</strong>
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                            @csrf
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">الاسم <span class="text-red-500">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-brand-orange focus:ring-1 focus:ring-brand-orange transition" required>
                                @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 font-bold mb-2">البريد الإلكتروني <span class="text-red-500">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-brand-orange focus:ring-1 focus:ring-brand-orange transition" required>
                                    @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-bold mb-2">رقم الهاتف</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-brand-orange focus:ring-1 focus:ring-brand-orange transition">
                                    @error('phone') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-bold mb-2">الخدمة المطلوبة</label>
                                <select name="service_requested" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-brand-orange focus:ring-1 focus:ring-brand-orange transition bg-white">
                                    <option value="">-- اختر الخدمة --</option>
                                    <option value="البناء والمقاولات" {{ old('service_requested') == 'البناء والمقاولات' ? 'selected' : '' }}>البناء والمقاولات</option>
                                    <option value="التصميم المعماري" {{ old('service_requested') == 'التصميم المعماري' ? 'selected' : '' }}>التصميم المعماري</option>
                                    <option value="البنية التحتية" {{ old('service_requested') == 'البنية التحتية' ? 'selected' : '' }}>البنية التحتية</option>
                                    <option value="أخرى" {{ old('service_requested') == 'أخرى' ? 'selected' : '' }}>أخرى</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-bold mb-2">رسالتك <span class="text-red-500">*</span></label>
                                <textarea name="message" rows="5" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-brand-orange focus:ring-1 focus:ring-brand-orange transition" required>{{ old('message') }}</textarea>
                                @error('message') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>

                            <button type="submit" class="w-full bg-brand-dark text-white font-bold py-3 px-4 rounded-lg hover:bg-navy-800 transition shadow-lg flex justify-center items-center gap-2">
                                إرسال الطلب
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
