<?php
$qualitySettings = app(\App\Settings\QualitySettings::class);
$locale = app()->getLocale();
$title = $qualitySettings->page_title[$locale] ?? __('إدارة الجودة');
$subtitle = $qualitySettings->page_subtitle[$locale] ?? '';
$banner = $qualitySettings->banner_image ? asset('storage/' . $qualitySettings->banner_image) : null;
$contentTitle = $qualitySettings->content_title[$locale] ?? '';
$contentText = $qualitySettings->content_text[$locale] ?? '';
$features = $qualitySettings->features ?? [];
?>
<x-layouts.app>
    <x-slot name="title">{{ $title }}</x-slot>

    <!-- Hero Section -->
    <div class="relative py-24 bg-gray-900 flex items-center justify-center overflow-hidden">
        @if ($banner)
            <img src="{{ $banner }}" alt="{{ $title }}"
                class="absolute inset-0 w-full h-full object-cover opacity-40">
        @else
            <div class="absolute inset-0 bg-gradient-to-r from-gray-800 to-gray-900 opacity-90"></div>
        @endif
        <div class="relative z-10 container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">{{ $title }}</h1>
            @if ($subtitle)
                <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto">{{ $subtitle }}</p>
            @endif
        </div>
    </div>

    <!-- Content Section -->
    <div class="py-20 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="bg-white rounded-3xl shadow-sm p-8 md:p-12 border border-gray-100 mb-16">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ $contentTitle }}</h2>
                    <div class="w-24 h-1 bg-gray-800 mx-auto rounded-full opacity-30"></div>
                </div>
                <div class="prose prose-lg max-w-none text-gray-600">
                    {!! $contentText !!}
                </div>
            </div>

            @if (count($features) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($features as $feature)
                        <div
                            class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-50 hover:-translate-y-1">
                            <div
                                class="w-14 h-14 bg-gray-100 rounded-xl flex items-center justify-center mb-6 text-gray-800">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-4">{{ $feature['title'][$locale] ?? '' }}</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $feature['description'][$locale] ?? '' }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
