<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $companySettings = app(\App\Settings\CompanySettings::class);
        $locale = app()->getLocale();
        $companyName = $companySettings->company_name[$locale] ?? 'Wadi Al Rayan';
        $seoTitle = $companySettings->seo_title[$locale] ?? $companyName;
        $seoDesc = $companySettings->seo_description[$locale] ?? '';
    @endphp

    <title>{{ $title ?? $seoTitle }}</title>
    <meta name="description" content="{{ $seoDesc }}">

    @if ($companySettings->favicon)
        <link rel="icon" href="{{ app(\App\Services\ImageService::class)->url($companySettings->favicon) }}">
    @endif

    <!-- JSON-LD Schema for Local SEO -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "LocalBusiness",
      "name": "{{ $companyName }}",
      "image": "{{ app(\App\Services\ImageService::class)->url($companySettings->logo, 'images/logo.png') }}",
      "@@id": "{{ url('/') }}",
      "url": "{{ url('/') }}",
      "telephone": "{{ $companySettings->phone }}",
      "address": {
        "@@type": "PostalAddress",
        "addressCountry": "{{ $companySettings->address[$locale] ?? '' }}"
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
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<body class="overflow-x-hidden antialiased text-gray-800 bg-gray-50 selection:bg-brand-secondary selection:text-white"
    x-data="{ mobileMenuOpen: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20) ? true : false">

    <!-- Topbar -->
    <div class="hidden py-2 text-sm text-white bg-brand-primary md:block">
        <div class="container flex justify-between px-4 mx-auto max-w-7xl md:px-6">
            <div class="flex gap-6 items-center">
                @if ($companySettings->phone)
                    <span class="flex gap-2 items-center"><x-heroicon-s-phone class="w-4 h-4 text-brand-secondary" />
                        <span dir="ltr">{{ $companySettings->phone }}</span></span>
                @endif
                @if ($companySettings->general_email)
                    <span class="flex gap-2 items-center"><x-heroicon-s-envelope class="w-4 h-4 text-brand-secondary" />
                        {{ $companySettings->general_email }}</span>
                @endif
            </div>
            <div class="flex gap-4 items-center">
                @if ($companySettings->linkedin)
                    <a href="{{ $companySettings->linkedin }}" target="_blank"
                        class="transition-colors hover:text-brand-secondary">LinkedIn</a>
                @endif
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav :class="{ 'bg-white/95 backdrop-blur-md shadow-sm py-4 border-b border-gray-200': scrolled, 'bg-white py-6 border-b border-gray-100':
            !scrolled }"
        class="sticky top-0 z-50 w-full transition-all duration-500">
        <div class="container flex justify-between items-center px-4 mx-auto max-w-7xl md:px-6">
            <!-- Logo -->
            <a href="/" class="flex gap-3 items-center text-3xl font-extrabold group">
                @if ($companySettings->logo)
                    <img src="{{ app(\App\Services\ImageService::class)->url($companySettings->logo) }}"
                        alt="{{ $companyName }}"
                        class="object-contain w-auto h-20 transition-transform duration-300 md:h-24 group-hover:scale-105">
                @else
                    <span
                        class="tracking-wide text-brand-primary">{{ $companySettings->short_name ?? $companyName }}</span>
                @endif
            </a>

            <!-- Desktop Menu -->
            <div class="hidden gap-8 items-center font-bold md:flex">
                <a href="/"
                    class="relative transition-colors hover:text-brand-secondary after:absolute after:-bottom-1 after:right-0 after:w-0 after:h-0.5 after:bg-brand-secondary hover:after:w-full after:transition-all after:duration-300">{{ __('الرئيسية') }}</a>
                <a href="/about"
                    class="relative text-gray-600 transition-colors hover:text-brand-secondary after:absolute after:-bottom-1 after:right-0 after:w-0 after:h-0.5 after:bg-brand-secondary hover:after:w-full after:transition-all after:duration-300">{{ __('من نحن') }}</a>
                <a href="/services"
                    class="relative text-gray-600 transition-colors hover:text-brand-secondary after:absolute after:-bottom-1 after:right-0 after:w-0 after:h-0.5 after:bg-brand-secondary hover:after:w-full after:transition-all after:duration-300">{{ __('خدماتنا') }}</a>
                <a href="/projects"
                    class="relative text-gray-600 transition-colors hover:text-brand-secondary after:absolute after:-bottom-1 after:right-0 after:w-0 after:h-0.5 after:bg-brand-secondary hover:after:w-full after:transition-all after:duration-300">{{ __('مشاريعنا') }}</a>
                <a href="/equipment"
                    class="relative text-gray-600 transition-colors hover:text-brand-secondary after:absolute after:-bottom-1 after:right-0 after:w-0 after:h-0.5 after:bg-brand-secondary hover:after:w-full after:transition-all after:duration-300">{{ __('المعدات') }}</a>

                @php
                    $switchLang = $locale === 'ar' ? 'en' : 'ar';
                    $switchText = $locale === 'ar' ? 'English' : 'عربي';
                @endphp
                <a href="{{ url('/lang/' . $switchLang) }}"
                    class="relative transition-colors text-brand-secondary hover:text-brand-primary">
                    {{ $switchText }}
                </a>

                <a href="/rfq"
                    class="px-6 py-2.5 font-bold text-white rounded-lg transition-all duration-300 transform bg-brand-secondary hover:bg-brand-primary hover:shadow-lg hover:-translate-y-0.5">{{ __('اطلب تسعيرة') }}</a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                class="p-2 rounded-lg transition text-brand-primary md:hidden focus:outline-none hover:bg-gray-100">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                    <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" style="display:none;"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu (Full Screen Overlay) -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 translate-x-full"
            class="md:hidden fixed inset-0 top-[80px] bg-brand-primary/95 backdrop-blur-xl z-40 h-screen"
            style="display: none;" x-cloak>
            <div class="flex flex-col px-6 py-10 space-y-6 text-2xl font-bold text-center">
                <a href="/" @click="mobileMenuOpen = false"
                    class="transition-colors hover:text-brand-secondary text-brand-secondary">{{ __('الرئيسية') }}</a>
                <a href="/about" @click="mobileMenuOpen = false"
                    class="text-white transition-colors hover:text-brand-secondary">{{ __('من نحن') }}</a>
                <a href="/services" @click="mobileMenuOpen = false"
                    class="text-white transition-colors hover:text-brand-secondary">{{ __('خدماتنا') }}</a>
                <a href="/projects" @click="mobileMenuOpen = false"
                    class="text-white transition-colors hover:text-brand-secondary">{{ __('مشاريعنا') }}</a>
                <a href="/equipment" @click="mobileMenuOpen = false"
                    class="text-white transition-colors hover:text-brand-secondary">{{ __('المعدات') }}</a>

                <a href="{{ url('/lang/' . $switchLang) }}"
                    class="transition-colors text-brand-secondary hover:text-white">
                    {{ $switchText }}
                </a>

                <a href="/rfq" @click="mobileMenuOpen = false"
                    class="inline-block px-8 py-4 mt-8 text-white rounded-lg border-2 transition-colors bg-brand-secondary border-brand-secondary hover:bg-brand-primary">{{ __('اطلب تسعيرة') }}</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="pt-20 pb-10 text-white bg-brand-primary">
        <div class="container grid grid-cols-1 gap-12 px-4 mx-auto max-w-7xl md:grid-cols-4 md:px-6">
            <div class="col-span-1 md:col-span-1">
                <h3 class="mb-6 text-2xl font-bold text-white">
                    {{ $companyName }}
                </h3>
                <p class="mb-6 leading-relaxed text-gray-300">{{ $companySettings->footer_text[$locale] ?? '' }}</p>
            </div>
            <div>
                <h4 class="mb-6 text-lg font-bold tracking-wider text-brand-secondary">{{ __('الشركة') }}</h4>
                <ul class="space-y-4 font-semibold text-gray-300">
                    <li><a href="/about" class="transition hover:text-brand-secondary">{{ __('من نحن') }}</a></li>
                    <li><a href="/services" class="transition hover:text-brand-secondary">{{ __('خدماتنا') }}</a>
                    </li>
                    <li><a href="/projects" class="transition hover:text-brand-secondary">{{ __('مشاريعنا') }}</a>
                    </li>
                    <li><a href="/careers" class="transition hover:text-brand-secondary">{{ __('الوظائف') }}</a></li>
                </ul>
            </div>
            <div class="col-span-1 md:col-span-2">
                <h4 class="mb-6 text-lg font-bold tracking-wider text-brand-secondary">{{ __('تواصل معنا') }}</h4>
                <ul class="space-y-4 font-semibold text-gray-300">
                    @if ($companySettings->address)
                        <li class="flex gap-3 items-center">
                            <x-heroicon-o-map-pin class="flex-shrink-0 w-6 h-6 text-brand-secondary" />
                            {{ $companySettings->address[$locale] ?? '' }}
                        </li>
                    @endif
                    @if ($companySettings->phone)
                        <li class="flex gap-3 items-center">
                            <x-heroicon-o-phone class="flex-shrink-0 w-6 h-6 text-brand-secondary" />
                            <span dir="ltr">{{ $companySettings->phone }}</span>
                        </li>
                    @endif
                    @if ($companySettings->general_email)
                        <li class="flex gap-3 items-center">
                            <x-heroicon-o-envelope class="flex-shrink-0 w-6 h-6 text-brand-secondary" />
                            {{ $companySettings->general_email }}
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="pt-8 mt-16 text-sm font-semibold text-center text-gray-400 border-t border-white/10">
            {{ $companySettings->copyright ?? __('جميع الحقوق محفوظة © :year', ['year' => date('Y')]) }}
        </div>
    </footer>

    <!-- Stacked Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    @stack('scripts')
</body>

</html>
