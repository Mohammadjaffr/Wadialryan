<x-layouts.app>
    <x-slot name="title">إضافة مشروع جديد | Add New Project</x-slot>

    <div class="py-24 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="container max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700">
                <div class="px-8 py-6 border-b border-gray-100 dark:border-gray-700">
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">إضافة مشروع جديد / Add New Project</h2>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">أدخل بيانات المشروع باللغتين العربية والإنجليزية.</p>
                </div>

                <div class="p-8">
                    <form action="/projects" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            
                            <!-- Arabic Section -->
                            <div class="space-y-6 bg-gray-50/50 dark:bg-gray-750 p-6 rounded-xl border border-gray-200/60 dark:border-gray-700">
                                <div class="flex items-center justify-between mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">
                                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100">البيانات بالعربية</h3>
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">AR</span>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 text-right mb-2">اسم المشروع <span class="text-red-500">*</span></label>
                                    <input type="text" name="title[ar]" dir="rtl" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-primary focus:border-brand-primary dark:bg-gray-800 dark:border-gray-600 dark:text-white transition-shadow" required placeholder="مثال: مشروع طريق سيئون">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 text-right mb-2">الموقع <span class="text-red-500">*</span></label>
                                    <input type="text" name="location[ar]" dir="rtl" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-primary focus:border-brand-primary dark:bg-gray-800 dark:border-gray-600 dark:text-white transition-shadow" required placeholder="مثال: حضرموت، اليمن">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 text-right mb-2">الوصف <span class="text-red-500">*</span></label>
                                    <textarea name="description[ar]" rows="5" dir="rtl" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-primary focus:border-brand-primary dark:bg-gray-800 dark:border-gray-600 dark:text-white transition-shadow" required placeholder="وصف تفصيلي للمشروع..."></textarea>
                                </div>
                            </div>

                            <!-- English Section -->
                            <div class="space-y-6 bg-gray-50/50 dark:bg-gray-750 p-6 rounded-xl border border-gray-200/60 dark:border-gray-700">
                                <div class="flex items-center justify-between mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">
                                    <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100">English Data</h3>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">EN</span>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 text-left mb-2">Project Name <span class="text-red-500">*</span></label>
                                    <input type="text" name="title[en]" dir="ltr" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-primary focus:border-brand-primary dark:bg-gray-800 dark:border-gray-600 dark:text-white transition-shadow" required placeholder="e.g. Seiyun Road Project">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 text-left mb-2">Location <span class="text-red-500">*</span></label>
                                    <input type="text" name="location[en]" dir="ltr" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-primary focus:border-brand-primary dark:bg-gray-800 dark:border-gray-600 dark:text-white transition-shadow" required placeholder="e.g. Hadhramaut, Yemen">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 text-left mb-2">Description <span class="text-red-500">*</span></label>
                                    <textarea name="description[en]" rows="5" dir="ltr" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-primary focus:border-brand-primary dark:bg-gray-800 dark:border-gray-600 dark:text-white transition-shadow" required placeholder="Detailed project description..."></textarea>
                                </div>
                            </div>
                            
                        </div>

                        <!-- Common Fields -->
                        <div class="mt-8 space-y-6 bg-gray-50/50 dark:bg-gray-750 p-6 rounded-xl border border-gray-200/60 dark:border-gray-700">
                             <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 border-b border-gray-200 dark:border-gray-600 pb-2">بيانات عامة / Common Data</h3>
                             <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Slug (URL)</label>
                                    <input type="text" name="slug" dir="ltr" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-primary focus:border-brand-primary dark:bg-gray-800 dark:border-gray-600 dark:text-white transition-shadow" required placeholder="e.g. seiyun-road-project">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">تاريخ الإنجاز / Completion Date</label>
                                    <input type="date" name="completion_date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-primary focus:border-brand-primary dark:bg-gray-800 dark:border-gray-600 dark:text-white transition-shadow">
                                </div>
                             </div>
                        </div>

                        <div class="mt-10 flex items-center justify-end gap-4 border-t border-gray-200 dark:border-gray-700 pt-6">
                            <a href="/projects" class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-lg hover:bg-gray-200 transition duration-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                                إلغاء / Cancel
                            </a>
                            <button type="submit" class="px-8 py-3 bg-brand-primary text-white font-bold rounded-lg hover:bg-brand-secondary hover:shadow-lg transition duration-200 transform hover:-translate-y-0.5">
                                حفظ المشروع / Save Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
