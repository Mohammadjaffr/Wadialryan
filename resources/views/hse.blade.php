<?php
$hseSettings = app(\App\Settings\HseSettings::class);
$locale = app()->getLocale();
$title = $hseSettings->page_title[$locale] ?? __('الصحة والسلامة والبيئة (HSE)');
$subtitle = $hseSettings->page_subtitle[$locale] ?? '';
$banner = $hseSettings->banner_image ? asset('storage/' . $hseSettings->banner_image) : null;
$contentTitle = $hseSettings->content_title[$locale] ?? '';
$contentText = $hseSettings->content_text[$locale] ?? '';
$policies = $hseSettings->policies ?? [];
?>
<x-layouts.app>
    <x-slot name="title">{{ $title }}</x-slot>
    
    <!-- Hero Section -->
    <div class="overflow-hidden relative pt-32 pb-20 bg-gray-900 lg:pt-40 lg:pb-32">
        <div class="absolute inset-0 z-0">
            <!-- Default Background Cover Image -->
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop" alt="HSE Background" class="object-cover w-full h-full opacity-20 mix-blend-luminosity">
            <div class="absolute inset-0 bg-gradient-to-l from-emerald-900/95 to-gray-900/95"></div>
            <div class="absolute inset-0 opacity-30 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-emerald-500/20 via-transparent to-transparent"></div>
        </div>
        
        <div class="container relative z-10 px-4 mx-auto">
            <div class="flex flex-col gap-12 items-center lg:flex-row lg:gap-16">
                <div class="flex-1 w-full {{ $banner ? 'text-center lg:text-start' : 'text-center' }}">
                    <h1 class="mb-6 text-4xl font-bold leading-tight text-black drop-shadow-lg md:text-5xl lg:text-6xl">{{ $title }}</h1>
                    @if($subtitle)
                        <p class="max-w-2xl text-lg font-medium text-black md:text-xl drop-shadow mx-auto {{ $banner ? 'lg:mx-0' : '' }} leading-relaxed">{{ $subtitle }}</p>
                    @endif
                </div>
                @if($banner)
                <div class="mx-auto w-full max-w-sm lg:w-1/3 lg:mx-0">
                    <div class="relative rounded-[2rem] shadow-2xl bg-white p-8 md:p-10 border-4 border-white/10 bg-clip-padding">
                        <img src="{{ $banner }}" alt="{{ $title }}" class="object-contain w-full h-auto drop-shadow-sm">
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto max-w-7xl">
            <div class="grid grid-cols-1 gap-16 items-center mb-20 lg:grid-cols-2">
                <div>
                    <h2 class="mb-6 text-3xl font-bold text-gray-800">{{ $contentTitle }}</h2>
                    <div class="mb-8 w-20 h-1 bg-emerald-600 rounded-full"></div>
                    <div class="max-w-none text-gray-600 prose prose-lg">
                        {!! $contentText !!}
                    </div>
                </div>
                <div class="p-8 bg-white rounded-3xl border border-gray-100 shadow-sm">
                    <div class="flex items-center justify-center w-full h-full min-h-[300px] bg-emerald-50 rounded-2xl text-emerald-600">
                        <svg class="w-32 h-32 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                </div>
            </div>

            @if(count($policies) > 0)
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-800">{{ __('السياسات والإجراءات') }}</h2>
                <div class="mx-auto w-24 h-1 bg-emerald-600 rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                @foreach($policies as $policy)
                <div class="flex gap-4 items-start p-6 bg-white rounded-2xl border border-gray-50 shadow-sm transition-shadow hover:shadow-md">
                    <div class="flex flex-shrink-0 justify-center items-center w-12 h-12 text-emerald-600 bg-emerald-50 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <h3 class="mb-2 text-xl font-bold text-gray-800">{{ $policy['title'][$locale] ?? '' }}</h3>
                        <p class="leading-relaxed text-gray-600">{{ $policy['description'][$locale] ?? '' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</x-layouts.app>