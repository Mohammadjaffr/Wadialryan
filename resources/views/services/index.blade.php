<x-layouts.app>
    <x-slot:title>{{ __('خدماتنا - وادي الريان للمقاولات') }}</x-slot>

    <!-- Header -->
    <section class="flex overflow-hidden relative justify-center items-center pt-40 pb-24 bg-gray-50">
        <div class="absolute inset-0 z-0 bg-gradient-to-br from-gray-50 to-white"></div>
        <div
            class="absolute inset-0 opacity-20 z-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-secondary/20 via-transparent to-transparent">
        </div>

        <div class="container relative z-10 px-4 mx-auto text-center">
            <div class="mb-4 opacity-0 transform translate-y-4 animate-fade-in-up">
                <span
                    class="inline-flex gap-2 items-center px-4 py-2 mb-2 text-sm font-bold tracking-wide rounded-full bg-brand-primary/10 text-brand-primary">{{ __('مجالات التميز') }}</span>
            </div>
            <h1 class="mb-6 text-4xl font-extrabold opacity-0 transform translate-y-4 md:text-6xl text-brand-primary animate-fade-in-up"
                style="animation-delay: 100ms;">{{ __('الخدمات الهندسية') }}</h1>
            <p class="mx-auto max-w-2xl text-lg font-medium leading-relaxed text-gray-600 opacity-0 transform translate-y-4 animate-fade-in-up"
                style="animation-delay: 200ms;">
                {{ __('نقدم مجموعة شاملة من الخدمات الهندسية والإنشائية التي تلبي كافة متطلباتكم بمهنية عالية وبمعايير استثنائية.') }}
            </p>
        </div>
    </section>

    <!-- Services Detail -->
    <section class="overflow-hidden relative py-24 bg-white border-t border-gray-100">
        <div
            class="absolute right-0 top-20 -mr-48 w-96 h-96 rounded-full blur-3xl pointer-events-none bg-brand-secondary/5">
        </div>
        <div
            class="absolute left-0 bottom-20 -ml-48 w-96 h-96 rounded-full blur-3xl pointer-events-none bg-brand-primary/5">
        </div>

        <div class="container relative z-10 px-4 mx-auto md:px-6">
            @php $services = \App\Models\Service::latest()->get(); @endphp

            @forelse($services as $index => $service)
                <div
                    class="flex flex-col gap-12 items-center pb-24 mb-24 border-b border-gray-100 lg:flex-row lg:gap-20 last:border-0 last:mb-0 last:pb-0 group">
                    <div class="lg:w-1/2 w-full {{ $index % 2 == 0 ? 'order-2 lg:order-1' : '' }}">
                        <div
                            class="inline-flex justify-center items-center mb-8 w-16 h-16 rounded-2xl transition-transform duration-500 bg-brand-primary/5 text-brand-secondary group-hover:scale-110">
                            @if ($service->icon)
                                <x-dynamic-component :component="$service->icon" class="w-8 h-8" />
                            @else
                                <x-heroicon-o-wrench-screwdriver class="w-8 h-8" />
                            @endif
                        </div>
                        <h2
                            class="mb-6 text-3xl font-bold transition-colors duration-300 md:text-4xl text-brand-primary">
                            {{ $service->title }}
                        </h2>
                        <p class="mb-8 text-lg leading-relaxed text-gray-600">
                            {!! nl2br(e($service->full_description ?? $service->description)) !!}
                        </p>

                        @if ($service->capabilities)
                            <ul class="space-y-5 font-medium">
                                @foreach (is_array($service->capabilities) ? $service->capabilities : [] as $capability)
                                    <li class="flex gap-4 items-start text-brand-primary">
                                        <span
                                            class="flex flex-shrink-0 justify-center items-center mt-1 w-6 h-6 text-brand-secondary">
                                            <x-heroicon-o-check class="w-5 h-5" />
                                        </span>
                                        <span class="text-lg">{{ $capability }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="lg:w-1/2 w-full {{ $index % 2 == 0 ? 'order-1 lg:order-2' : '' }}">
                       <div
    class="aspect-[4/3] rounded-[2.5rem] overflow-hidden shadow-2xl border border-gray-100 bg-gray-100 flex items-center justify-center group-hover:-translate-y-2 transition-transform duration-500 relative p-6">
    @if ($service->main_image)
        <img src="{{ $service->imageUrl('main_image') }}"
            class="object-contain object-center relative z-10 w-full h-full transition-transform duration-700 group-hover:scale-105"
            alt="{{ $service->title }}">
    @else
        <img src="https://images.unsplash.com/photo-1541888086425-d81bb19240f5?q=80&w=1200&auto=format&fit=crop"
            class="object-cover object-center relative z-10 w-full h-full transition-transform duration-700 group-hover:scale-105"
            alt="{{ $service->title }}">
    @endif
    <div
        class="absolute inset-0 z-20 transition-colors duration-500 pointer-events-none bg-brand-primary/5 group-hover:bg-transparent">
    </div>
</div>
                    </div>
                </div>
            @empty
                <!-- Empty state handled gracefully -->
                <div class="py-20 text-center text-gray-500">
                    {{ __('جاري تحديث قائمة الخدمات. يرجى زيارة الصفحة لاحقاً.') }}
                </div>
            @endforelse
        </div>
    </section>

    @push('scripts')
        <style>
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in-up {
                animation: fadeInUp 0.8s ease-out forwards;
            }
        </style>
    @endpush
</x-layouts.app>
