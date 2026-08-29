<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'وادي الريان للمقاولات | شركة مقاولات في سيئون، حضرموت' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'شركة وادي الريان للمقاولات العامة في سيئون، حضرموت، اليمن. بناء وتشييد طرق، مباني، وبنية تحتية بأعلى معايير الجودة.' }}">
    <meta name="keywords" content="شركة مقاولات في سيئون, مقاولات عامة حضرموت, بناء وتشييد طرق في اليمن, وادي الريان للمقاولات">
    
    <!-- JSON-LD Schema for Local SEO -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "LocalBusiness",
      "name": "وادي الريان للمقاولات",
      "image": "{{ asset('images/logo.png') }}",
      "@@id": "{{ url('/') }}",
      "url": "{{ url('/') }}",
      "telephone": "+967 700 000 000",
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "الشارع العام",
        "addressLocality": "سيئون",
        "addressRegion": "حضرموت",
        "postalCode": "00000",
        "addressCountry": "YE"
      },
      "geo": {
        "@@type": "GeoCoordinates",
        "latitude": 15.9431,
        "longitude": 48.7816
      }
    }
    </script>

    <!-- Google Fonts: Cairo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vite & Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Cairo', sans-serif; }
    </style>
</head>
<body class="overflow-x-hidden antialiased text-brand-dark bg-brand-background selection:bg-brand-secondary selection:text-white" x-data="{ mobileMenuOpen: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20) ? true : false">

    <!-- Navbar -->
    <nav :class="{'bg-white/95 backdrop-blur-md shadow-sm py-4 border-b border-gray-200': scrolled, 'bg-white py-6 border-b border-gray-100': !scrolled}" class="fixed top-0 z-50 w-full transition-all duration-500 text-brand-dark">
        <div class="container max-w-7xl flex justify-between items-center px-4 mx-auto md:px-6">
            <!-- Logo -->
            <a href="/" class="flex gap-3 items-center text-3xl font-extrabold group">
                <span class="transition-transform duration-300 text-brand-primary group-hover:rotate-12">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </span>
                <span class="tracking-wide text-brand-primary">وادي الريان<span class="block -mt-2 text-xl font-semibold text-brand-muted opacity-90">للمقاولات</span></span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden gap-10 items-center font-bold md:flex">
                <a href="/" class="relative transition-colors hover:text-brand-secondary after:absolute after:-bottom-1 after:right-0 after:w-0 after:h-0.5 after:bg-brand-secondary hover:after:w-full after:transition-all after:duration-300">الرئيسية</a>
                <a href="/services" class="relative text-brand-muted transition-colors hover:text-brand-secondary after:absolute after:-bottom-1 after:right-0 after:w-0 after:h-0.5 after:bg-brand-secondary hover:after:w-full after:transition-all after:duration-300">خدماتنا</a>
                <a href="/projects" class="relative text-brand-muted transition-colors hover:text-brand-secondary after:absolute after:-bottom-1 after:right-0 after:w-0 after:h-0.5 after:bg-brand-secondary hover:after:w-full after:transition-all after:duration-300">مشاريعنا</a>
                <a href="/contact" class="px-8 py-3 font-bold text-white rounded-lg transition-all duration-300 transform bg-brand-secondary hover:bg-brand-primary hover:shadow-lg hover:shadow-brand-secondary/20 hover:-translate-y-1">اطلب تسعيرة</a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-lg transition text-brand-primary md:hidden focus:outline-none hover:bg-gray-100">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display:none;"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu (Full Screen Overlay) -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-x-full"
             x-transition:enter-end="opacity-100 translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-x-0"
             x-transition:leave-end="opacity-0 translate-x-full"
             class="md:hidden fixed inset-0 top-[80px] bg-brand-primary/95 backdrop-blur-xl z-40 h-screen" 
             style="display: none;" x-cloak>
            <div class="flex flex-col px-6 py-10 space-y-8 text-2xl font-bold text-center">
                <a href="/" @click="mobileMenuOpen = false" class="transition-colors hover:text-brand-secondary text-brand-tertiary">الرئيسية</a>
                <a href="/services" @click="mobileMenuOpen = false" class="transition-colors hover:text-brand-tertiary text-white">خدماتنا</a>
                <a href="/projects" @click="mobileMenuOpen = false" class="transition-colors hover:text-brand-tertiary text-white">مشاريعنا</a>
                <a href="/contact" @click="mobileMenuOpen = false" class="inline-block px-8 py-4 mt-8 text-white rounded-lg border-2 transition-colors bg-brand-secondary border-brand-secondary hover:bg-brand-primary">اطلب تسعيرة</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer id="contact" class="py-20 text-white bg-brand-primary border-t border-white/5">
        <div class="container max-w-7xl grid grid-cols-1 gap-12 px-4 mx-auto md:grid-cols-4 md:px-6">
            <div class="col-span-1 md:col-span-2">
                <h3 class="flex gap-2 items-center mb-6 text-2xl font-bold text-white">
                    <span class="text-white">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </span>
                    وادي الريان للمقاولات
                </h3>
                <p class="mb-6 max-w-md leading-relaxed text-white/60">نحن شركة رائدة في مجال المقاولات العامة، الطرق، والمباني والبنية التحتية، نبني حضرموت ونمهد طرق المستقبل بأعلى معايير الجودة والاحترافية.</p>
            </div>
            <div>
                <h4 class="mb-6 text-xl font-bold text-brand-tertiary uppercase tracking-wider">روابط سريعة</h4>
                <ul class="space-y-4 font-semibold">
                    <li><a href="/" class="text-white/70 transition hover:text-brand-secondary">الرئيسية</a></li>
                    <li><a href="/services" class="text-white/70 transition hover:text-brand-secondary">خدماتنا</a></li>
                    <li><a href="/projects" class="text-white/70 transition hover:text-brand-secondary">مشاريعنا</a></li>
                </ul>
            </div>
            <div>
                <h4 class="mb-6 text-xl font-bold text-brand-tertiary uppercase tracking-wider">تواصل معنا</h4>
                <ul class="space-y-4 font-semibold">
                    <li class="flex gap-3 items-center text-sm text-white/70 md:text-base">
                        <svg class="flex-shrink-0 w-6 h-6 text-brand-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        سيئون، حضرموت، الجمهورية اليمنية
                    </li>
                    <li class="flex gap-3 items-center text-sm text-white/70 md:text-base">
                        <svg class="flex-shrink-0 w-6 h-6 text-brand-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span dir="ltr" class="inline-block w-full text-right">+967 700 000 000</span>
                    </li>
                    <li class="flex gap-3 items-center text-sm text-white/70 md:text-base">
                        <svg class="flex-shrink-0 w-6 h-6 text-brand-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        info@wadialryan.com
                    </li>
                </ul>
            </div>
        </div>
        <div class="pt-8 mt-16 text-sm text-center font-semibold text-white/40 border-t border-white/10">
            جميع الحقوق محفوظة &copy; {{ date('Y') }} شركة وادي الريان للمقاولات.
        </div>
        
    </footer>

    <!-- Stacked Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    @stack('scripts')
</body>
</html>
