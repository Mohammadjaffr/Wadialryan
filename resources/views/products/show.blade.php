<x-layouts.app>
    <x-slot:title>{{ $product->name }} - {{ __('المنتجات') }}</x-slot>

    <!-- Header -->
    <section class="flex overflow-hidden relative justify-center items-center pt-40 pb-24 bg-gray-50">
        <div class="absolute inset-0 opacity-20 z-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-secondary/20 via-transparent to-transparent"></div>

        <div class="container relative z-10 px-4 mx-auto text-center">
            <div class="mb-4 opacity-0 transform translate-y-4 animate-fade-in-up">
                <a href="{{ route('products.index') }}" class="inline-flex gap-2 items-center px-4 py-2 mb-2 text-sm font-bold tracking-wide rounded-full bg-brand-primary/10 text-brand-primary hover:bg-brand-primary hover:text-white transition-colors duration-300">
                    <x-heroicon-o-arrow-right class="w-4 h-4"/>
                    {{ __('العودة للمنتجات') }}
                </a>
            </div>
            <h1 class="mb-6 text-4xl font-extrabold opacity-0 transform translate-y-4 md:text-5xl text-brand-primary animate-fade-in-up"
                style="animation-delay: 100ms;">{{ $product->name }}</h1>
        </div>
    </section>

    <!-- Product Details -->
    <section class="py-24 bg-white border-t border-gray-100">
        <div class="container px-4 mx-auto max-w-5xl md:px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
                
                <!-- Images Gallery -->
                <div class="space-y-6 min-w-0" x-data="{ 
                    mainImage: '{{ $product->main_image ? $product->imageUrl('main_image') : '' }}',
                    images: [
                        @if($product->main_image) '{{ $product->imageUrl('main_image') }}', @endif
                        @if($product->gallery)
                            @foreach($product->gallery as $image)
                                '{{ app(\App\Services\ImageService::class)->url($image) }}',
                            @endforeach
                        @endif
                    ]
                }">
                    <!-- Main Image Viewer -->
                    <div class="rounded-2xl overflow-hidden border border-gray-100 shadow-sm bg-white flex items-center justify-center p-4 w-full aspect-[4/3] lg:aspect-[4/3] relative group">
                        <template x-if="mainImage">
                            <img :src="mainImage" alt="{{ $product->name }}" class="w-full h-full object-contain rounded-xl transition-all duration-300" x-transition>
                        </template>
                        <template x-if="!mainImage">
                            <div class="w-full h-full bg-gray-50 flex items-center justify-center">
                                <x-heroicon-o-cube class="w-24 h-24 text-gray-300"/>
                            </div>
                        </template>
                    </div>

                    <!-- Thumbnails Row -->
                    <template x-if="images.length > 1">
                        <div class="flex gap-3 overflow-x-auto pb-2 custom-scrollbar">
                            <template x-for="(img, index) in images" :key="index">
                                <button @click="mainImage = img" 
                                        class="shrink-0 w-24 h-24 rounded-xl overflow-hidden border-2 shadow-sm bg-white transition-all duration-300 p-1 flex items-center justify-center"
                                        :class="mainImage === img ? 'border-brand-primary ring-2 ring-brand-primary/20 opacity-100' : 'border-gray-100 hover:border-brand-secondary opacity-70 hover:opacity-100'">
                                    <img :src="img" alt="Thumbnail" class="w-full h-full object-contain rounded-lg">
                                </button>
                            </template>
                        </div>
                    </template>
                </div>

                <!-- Info -->
                <div>
                    <h2 class="text-3xl font-bold text-brand-primary mb-6 border-r-4 border-brand-secondary pr-4" style="border-right-color: #C69A72;">
                        {{ __('تفاصيل المنتج') }}
                    </h2>
                    
                    @if($product->description)
                        <div class="prose prose-lg max-w-none text-gray-600">
                            {!! $product->description !!}
                        </div>
                    @endif
                    
                    <div class="mt-10">
                        <a href="{{ route('contact') }}" class="inline-flex gap-2 items-center px-8 py-4 font-bold text-white rounded-xl transition-all duration-300 bg-brand-secondary hover:bg-brand-primary hover:shadow-lg hover:-translate-y-1">
                            <x-heroicon-o-envelope class="w-5 h-5"/>
                            {{ __('استفسر عن المنتج') }}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
    @push('scripts')
        <style>
            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fade-in-up {
                animation: fadeInUp 0.8s ease-out forwards;
            }
        </style>
    @endpush
</x-layouts.app>
