<x-layouts.app>
    <x-slot name="title">{{ $career->getTranslation('title', app()->getLocale()) }}</x-slot>
    <div class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <h1 class="text-4xl font-bold mb-4">{{ $career->getTranslation('title', app()->getLocale()) }}</h1>
                <p class="text-gray-600 mb-8">{{ $career->getTranslation('location', app()->getLocale()) }} | {{ $career->employment_type }}</p>
                
                <div class="prose max-w-none mb-8">
                    {!! $career->getTranslation('description', app()->getLocale()) !!}
                </div>
                
                <h3 class="text-2xl font-bold mb-4">{{ __('المتطلبات') }}</h3>
                <div class="prose max-w-none">
                    {!! $career->getTranslation('requirements', app()->getLocale()) !!}
                </div>
            </div>
            
            <div>
                <div class="bg-white p-8 rounded-xl shadow-sm sticky top-32">
                    <h3 class="text-2xl font-bold mb-6">{{ __('قدم الآن') }}</h3>
                    
                    @if(session('success'))
                        <div class="p-4 mb-6 text-green-700 bg-green-100 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('careers.apply', $career->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-bold mb-2">{{ __('الاسم الكامل') }}</label>
                            <input type="text" name="name" required class="w-full border-gray-300 rounded-lg shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">{{ __('البريد الإلكتروني') }}</label>
                            <input type="email" name="email" required class="w-full border-gray-300 rounded-lg shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">{{ __('رقم الهاتف') }}</label>
                            <input type="text" name="phone" required class="w-full border-gray-300 rounded-lg shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">{{ __('السيرة الذاتية (PDF, DOC)') }}</label>
                            <input type="file" name="cv_path" required accept=".pdf,.doc,.docx" class="w-full">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">{{ __('رسالة (اختياري)') }}</label>
                            <textarea name="message" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm"></textarea>
                        </div>
                        <button type="submit" class="w-full py-3 bg-brand-primary text-white font-bold rounded-lg hover:bg-brand-secondary transition">{{ __('إرسال الطلب') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>