<x-layouts.app>
    <x-slot:title>مشاريعنا - الرواد للمقاولات</x-slot>
    <!-- Header -->
    <section class="pt-32 pb-20 bg-brand-dark text-white text-center">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up">معرض المشاريع</h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">اكتشف أحدث مشاريعنا التي تم إنجازها بكل دقة واحترافية.</p>
        </div>
    </section>

    <!-- Projects Section with Alpine.js filtering -->
    <section class="py-20 bg-gray-50 min-h-screen" x-data="{ category: 'all' }">
        <div class="container mx-auto px-4 md:px-6">
            <!-- Filters -->
            <div class="flex justify-center gap-4 mb-12 flex-wrap" data-aos="fade-up">
                <button @click="category = 'all'" :class="category === 'all' ? 'bg-brand-orange text-brand-dark' : 'bg-white text-gray-600 hover:bg-gray-100 shadow'" class="px-6 py-2 rounded-full font-bold transition">الكل</button>
                <button @click="category = 'تجاري'" :class="category === 'تجاري' ? 'bg-brand-orange text-brand-dark' : 'bg-white text-gray-600 hover:bg-gray-100 shadow'" class="px-6 py-2 rounded-full font-bold transition">تجاري</button>
                <button @click="category = 'سكني'" :class="category === 'سكني' ? 'bg-brand-orange text-brand-dark' : 'bg-white text-gray-600 hover:bg-gray-100 shadow'" class="px-6 py-2 rounded-full font-bold transition">سكني</button>
                <button @click="category = 'بنية تحتية'" :class="category === 'بنية تحتية' ? 'bg-brand-orange text-brand-dark' : 'bg-white text-gray-600 hover:bg-gray-100 shadow'" class="px-6 py-2 rounded-full font-bold transition">بنية تحتية</button>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                    <div x-show="category === 'all' || category === '{{ $project->category }}'" x-transition class="bg-white rounded-xl shadow-lg overflow-hidden group hover:-translate-y-2 transition duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ $project->image_path }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <div class="absolute top-4 right-4 bg-brand-dark text-brand-orange px-3 py-1 rounded-full text-sm font-bold shadow">
                                {{ $project->category }}
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-brand-dark mb-2">{{ $project->title }}</h3>
                            <p class="text-gray-600">{{ $project->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.app>
