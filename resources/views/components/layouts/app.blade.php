<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'شركة الرواد للمقاولات والبناء' }}</title>

    <!-- Google Fonts: Tajawal -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Vite & Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Tajawal', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased" x-data="{ mobileMenuOpen: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20) ? true : false">

    <!-- Navbar -->
    <nav :class="{'bg-brand-dark shadow-md py-3': scrolled, 'bg-brand-dark/95 py-5': !scrolled}" class="fixed w-full top-0 z-50 transition-all duration-300 text-white">
        <div class="container mx-auto px-4 md:px-6 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-2xl font-bold flex items-center gap-2">
                <span class="text-brand-orange">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </span>
                الرواد للمقاولات
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 space-x-reverse items-center">
                <a href="/" class="hover:text-brand-orange transition">الرئيسية</a>
                <a href="/services" class="hover:text-brand-orange transition">خدماتنا</a>
                <a href="/projects" class="hover:text-brand-orange transition">مشاريعنا</a>
                <a href="/contact" class="px-5 py-2 bg-brand-orange text-brand-dark rounded-md font-bold hover:bg-yellow-400 transition">اتصل بنا</a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display:none;"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-transition class="md:hidden bg-brand-dark absolute w-full shadow-lg border-t border-gray-800" style="display: none;">
            <div class="flex flex-col px-4 py-3 space-y-3">
                <a href="/" class="hover:text-brand-orange">الرئيسية</a>
                <a href="/services" class="hover:text-brand-orange">خدماتنا</a>
                <a href="/projects" class="hover:text-brand-orange">مشاريعنا</a>
                <a href="/contact" class="text-brand-orange font-bold">اتصل بنا</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen pt-20">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-brand-dark text-gray-300 py-12 border-t-4 border-brand-orange">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-2xl font-bold text-white mb-4 flex items-center gap-2">
                    <span class="text-brand-orange">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </span>
                    الرواد للمقاولات
                </h3>
                <p class="mb-4 leading-relaxed max-w-sm">نحن شركة رائدة في مجال المقاولات والبناء، نقدم خدمات متكاملة بأعلى معايير الجودة والاحترافية منذ أكثر من 20 عاماً.</p>
            </div>
            <div>
                <h4 class="text-xl font-bold text-white mb-4">روابط سريعة</h4>
                <ul class="space-y-2">
                    <li><a href="/" class="hover:text-brand-orange transition">الرئيسية</a></li>
                    <li><a href="/services" class="hover:text-brand-orange transition">خدماتنا</a></li>
                    <li><a href="/projects" class="hover:text-brand-orange transition">مشاريعنا</a></li>
                    <li><a href="/contact" class="hover:text-brand-orange transition">اتصل بنا</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-xl font-bold text-white mb-4">تواصل معنا</h4>
                <ul class="space-y-3">
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        الرياض، المملكة العربية السعودية
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        +966 50 000 0000
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        info@alruwad.com
                    </li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-8 pt-8 border-t border-gray-700 text-sm">
            جميع الحقوق محفوظة &copy; {{ date('Y') }} شركة الرواد للمقاولات.
        </div>
    </footer>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
</body>
</html>
