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
    <div class="flex overflow-hidden relative justify-center items-center py-24 bg-gray-900">
        @if($banner)
            <img src="{{ $banner }}" alt="{{ $title }}" class="object-cover absolute inset-0 w-full h-full opacity-40">
        @else
            <div class="absolute inset-0 bg-gradient-to-r from-emerald-900 to-emerald-700 opacity-90"></div>
        @endif
        <div class="container relative z-10 px-4 mx-auto text-center">
            <h1 class="mb-6 text-4xl font-bold text-white md:text-5xl">{{ $title }}</h1>
            @if($subtitle)
                <p class="mx-auto max-w-2xl text-lg text-gray-200 md:text-xl">{{ $subtitle }}</p>
            @endif
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