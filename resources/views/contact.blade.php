<x-layouts.app>
    <x-slot:title>اتصل بنا - الرواد للمقاولات</x-slot>
    
    <section class="min-h-screen flex flex-col md:flex-row bg-brand-dark relative overflow-hidden pt-20">
        <!-- Abstract Background -->
        <div class="absolute inset-0 z-0 opacity-30 pointer-events-none">
            <div class="absolute top-1/4 right-0 w-[500px] h-[500px] bg-brand-orange rounded-full blur-[200px]"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-brand-amber rounded-full blur-[200px]"></div>
            <!-- Grid Pattern -->
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]"></div>
        </div>

        <!-- Left Column: Map/Image Placeholder -->
        <div class="w-full md:w-1/2 min-h-[40vh] md:min-h-screen relative z-10 contact-left flex flex-col justify-end p-8 md:p-16">
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=1920&auto=format&fit=crop" class="w-full h-full object-cover opacity-40 grayscale" alt="Location Map Placeholder">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-dark via-brand-dark/50 to-transparent"></div>
            </div>
            
            <div class="relative z-10 text-white mt-auto contact-info-card">
                <h1 class="text-5xl md:text-6xl font-black mb-4">لنتحدث<span class="text-brand-orange">.</span></h1>
                <p class="text-gray-300 text-xl mb-12 max-w-md font-light">فريقنا مستعد لتحويل رؤيتك إلى واقع ملموس. تواصل معنا اليوم لنبدأ رحلة البناء.</p>
                
                <div class="space-y-8">
                    <div class="flex items-start gap-6 group cursor-pointer">
                        <div class="w-14 h-14 rounded-full border border-white/20 bg-brand-dark/50 backdrop-blur-sm flex items-center justify-center text-brand-orange group-hover:bg-brand-orange group-hover:text-brand-dark transition-all duration-300 shadow-[0_0_15px_rgba(212,175,55,0)] group-hover:shadow-[0_0_15px_rgba(212,175,55,0.4)] shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-white mb-2 text-lg uppercase tracking-wider text-sm opacity-60">المقر الرئيسي</h4>
                            <p class="text-gray-200 text-lg">طريق الملك فهد، العليا، الرياض، المملكة العربية السعودية</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-6 group cursor-pointer">
                        <div class="w-14 h-14 rounded-full border border-white/20 bg-brand-dark/50 backdrop-blur-sm flex items-center justify-center text-brand-orange group-hover:bg-brand-orange group-hover:text-brand-dark transition-all duration-300 shadow-[0_0_15px_rgba(212,175,55,0)] group-hover:shadow-[0_0_15px_rgba(212,175,55,0.4)] shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-white mb-2 text-lg uppercase tracking-wider text-sm opacity-60">تواصل هاتفياً</h4>
                            <p class="text-gray-200 text-lg dir-ltr text-right" dir="ltr">+966 50 000 0000</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-6 group cursor-pointer">
                        <div class="w-14 h-14 rounded-full border border-white/20 bg-brand-dark/50 backdrop-blur-sm flex items-center justify-center text-brand-orange group-hover:bg-brand-orange group-hover:text-brand-dark transition-all duration-300 shadow-[0_0_15px_rgba(212,175,55,0)] group-hover:shadow-[0_0_15px_rgba(212,175,55,0.4)] shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-white mb-2 text-lg uppercase tracking-wider text-sm opacity-60">البريد الإلكتروني</h4>
                            <p class="text-gray-200 text-lg">info@alruwad.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Form -->
        <div class="w-full md:w-1/2 relative z-10 flex items-center justify-center p-8 md:p-16 bg-brand-dark/80 backdrop-blur-xl border-r border-white/5 contact-right">
            <div class="w-full max-w-xl">
                <h2 class="text-3xl font-bold text-white mb-2">أرسل رسالة</h2>
                <p class="text-gray-400 mb-10">يرجى تعبئة النموذج أدناه وسنقوم بالرد في أقرب وقت.</p>
                
                @if(session('success'))
                    <div class="mb-8 bg-brand-orange/10 border border-brand-orange/50 text-brand-orange px-6 py-4 rounded-2xl relative flex items-center gap-4" role="alert">
                        <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div>
                            <strong class="font-bold block">تم الإرسال بنجاح!</strong>
                            <span class="block sm:inline text-sm opacity-80">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-8 contact-form">
                    @csrf
                    
                    <!-- Floating Label Input Group -->
                    <div class="relative group input-container">
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="peer w-full bg-transparent border-0 border-b-2 border-white/20 py-3 px-0 text-white focus:outline-none focus:ring-0 focus:border-brand-orange transition-colors placeholder-transparent" placeholder="الاسم الكامل" required>
                        <label for="name" class="absolute top-3 right-0 text-gray-500 text-lg transition-all peer-placeholder-shown:text-lg peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-3 peer-focus:-top-4 peer-focus:text-sm peer-focus:text-brand-orange peer-valid:-top-4 peer-valid:text-sm peer-valid:text-gray-400 pointer-events-none">الاسم الكامل <span class="text-red-500">*</span></label>
                        @error('name') <span class="text-red-500 text-xs mt-1 absolute -bottom-5">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="relative group input-container">
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="peer w-full bg-transparent border-0 border-b-2 border-white/20 py-3 px-0 text-white focus:outline-none focus:ring-0 focus:border-brand-orange transition-colors placeholder-transparent" placeholder="البريد الإلكتروني" required>
                            <label for="email" class="absolute top-3 right-0 text-gray-500 text-lg transition-all peer-placeholder-shown:text-lg peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-3 peer-focus:-top-4 peer-focus:text-sm peer-focus:text-brand-orange peer-valid:-top-4 peer-valid:text-sm peer-valid:text-gray-400 pointer-events-none">البريد الإلكتروني <span class="text-red-500">*</span></label>
                            @error('email') <span class="text-red-500 text-xs mt-1 absolute -bottom-5">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="relative group input-container">
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="peer w-full bg-transparent border-0 border-b-2 border-white/20 py-3 px-0 text-white focus:outline-none focus:ring-0 focus:border-brand-orange transition-colors placeholder-transparent" placeholder="رقم الهاتف">
                            <label for="phone" class="absolute top-3 right-0 text-gray-500 text-lg transition-all peer-placeholder-shown:text-lg peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-3 peer-focus:-top-4 peer-focus:text-sm peer-focus:text-brand-orange peer-valid:-top-4 peer-valid:text-sm peer-valid:text-gray-400 pointer-events-none">رقم الهاتف</label>
                            @error('phone') <span class="text-red-500 text-xs mt-1 absolute -bottom-5">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="relative group input-container pt-2">
                        <label class="block text-gray-500 text-sm mb-2">نوع الخدمة المطلوبة</label>
                        <div class="relative">
                            <select name="service_requested" class="w-full bg-white/5 border border-white/10 rounded-xl py-4 px-4 text-white appearance-none focus:outline-none focus:border-brand-orange focus:bg-brand-surface transition-colors cursor-pointer">
                                <option value="" class="bg-brand-dark text-gray-500">-- اختر الخدمة --</option>
                                <option value="البناء والمقاولات" class="bg-brand-dark text-white" {{ old('service_requested') == 'البناء والمقاولات' ? 'selected' : '' }}>البناء والمقاولات العامة</option>
                                <option value="التصميم المعماري" class="bg-brand-dark text-white" {{ old('service_requested') == 'التصميم المعماري' ? 'selected' : '' }}>التصميم المعماري والاستشارات</option>
                                <option value="البنية التحتية" class="bg-brand-dark text-white" {{ old('service_requested') == 'البنية التحتية' ? 'selected' : '' }}>مشاريع البنية التحتية</option>
                                <option value="أخرى" class="bg-brand-dark text-white" {{ old('service_requested') == 'أخرى' ? 'selected' : '' }}>أخرى / استفسار عام</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center px-4 text-brand-orange">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>

                    <div class="relative group input-container mt-8">
                        <textarea name="message" id="message" rows="4" class="peer w-full bg-transparent border-0 border-b-2 border-white/20 py-3 px-0 text-white focus:outline-none focus:ring-0 focus:border-brand-orange transition-colors placeholder-transparent resize-none" placeholder="اكتب رسالتك هنا..." required>{{ old('message') }}</textarea>
                        <label for="message" class="absolute top-3 right-0 text-gray-500 text-lg transition-all peer-placeholder-shown:text-lg peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-3 peer-focus:-top-8 peer-focus:text-sm peer-focus:text-brand-orange peer-valid:-top-8 peer-valid:text-sm peer-valid:text-gray-400 pointer-events-none">تفاصيل المشروع أو الاستفسار <span class="text-red-500">*</span></label>
                        @error('message') <span class="text-red-500 text-xs mt-1 absolute -bottom-5">{{ $message }}</span> @enderror
                    </div>

                    <div class="pt-4 submit-btn-container">
                        <button type="submit" class="w-full bg-brand-orange text-brand-dark font-black py-4 px-6 rounded-full hover:bg-brand-amber transition-colors shadow-[0_0_20px_rgba(212,175,55,0.2)] hover:shadow-[0_0_30px_rgba(212,175,55,0.4)] flex justify-center items-center gap-3 group">
                            إرسال الطلب الآن
                            <svg class="w-5 h-5 group-hover:-translate-x-2 transition-transform rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Split Screen Entrance Animation
            const tl = gsap.timeline();
            
            // If on desktop, slide from sides
            if(window.innerWidth > 768) {
                tl.fromTo('.contact-left', 
                    { x: 100, opacity: 0 }, 
                    { x: 0, opacity: 1, duration: 1, ease: 'power3.out' }
                )
                .fromTo('.contact-right', 
                    { x: -100, opacity: 0 }, 
                    { x: 0, opacity: 1, duration: 1, ease: 'power3.out' },
                    "-=1"
                );
            } else {
                tl.fromTo('.contact-left', 
                    { y: 50, opacity: 0 }, 
                    { y: 0, opacity: 1, duration: 1, ease: 'power3.out' }
                )
                .fromTo('.contact-right', 
                    { y: 50, opacity: 0 }, 
                    { y: 0, opacity: 1, duration: 1, ease: 'power3.out' },
                    "-=0.5"
                );
            }

            // Staggered info items
            tl.fromTo('.contact-info-card h1, .contact-info-card p, .contact-info-card .flex',
                { y: 30, opacity: 0 },
                { y: 0, opacity: 1, duration: 0.8, stagger: 0.1, ease: 'power3.out' },
                "-=0.5"
            );

            // Staggered form inputs
            tl.fromTo('.contact-form .input-container, .contact-form .submit-btn-container',
                { y: 30, opacity: 0 },
                { y: 0, opacity: 1, duration: 0.6, stagger: 0.1, ease: 'power3.out' },
                "-=0.8"
            );
        });
    </script>
    @endpush
</x-layouts.app>
