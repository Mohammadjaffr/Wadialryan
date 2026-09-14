<x-layouts.app>
    <x-slot name="title">{{ __('الصفحة غير موجودة') }}</x-slot>
    <div class="py-32 bg-gray-50 text-center">
        <div class="container mx-auto px-4 max-w-7xl">
            <h1 class="text-9xl font-bold text-gray-300 mb-8">404</h1>
            <h2 class="text-3xl font-bold mb-6">{{ __('عذراً، الصفحة التي تبحث عنها غير موجودة') }}</h2>
            <p class="text-gray-600 mb-10">{{ __('قد يكون تم نقل الصفحة أو حذفها، أو أنك أدخلت الرابط بشكل خاطئ.') }}</p>
            <a href="/" class="px-8 py-3 bg-brand-primary text-white font-bold rounded-lg hover:bg-brand-secondary transition">{{ __('العودة للرئيسية') }}</a>
        </div>
    </div>
</x-layouts.app>