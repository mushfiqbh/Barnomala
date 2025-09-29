<div class="w-full bg-gradient-to-br from-gray-50 to-blue-50 py-16 scroll-animate" data-animation="fade-in-up">
    <div class="w-5/6 mx-auto">
        <!-- Section Heading -->
        <div class="text-center mb-12 scroll-animate" data-animation="fade-in-up">
            <!-- Main Heading -->
            <h1 class="text-4xl lg:text-5xl font-bold mb-4 leading-tight">
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 animate-gradient">বর্নমালা</span>
                <span class="text-gray-800"> গ্রাহকগণ</span>
            </h1>

            <!-- Decorative Elements -->
            <div class="relative">
                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-8">
                    <div
                        class="w-6 h-6 bg-gradient-to-r from-blue-400 to-indigo-500 rounded-full blur-lg opacity-30 animate-pulse">
                    </div>
                </div>
                <div class="h-1 w-20 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full mx-auto"></div>
            </div>

            <p class="text-lg text-slate-600 max-w-3xl mx-auto mt-6 leading-relaxed">
                দেশের বিভিন্ন অঞ্চলের শিক্ষা প্রতিষ্ঠানগুলো আমাদের সেবা গ্রহণ করে তাদের শিক্ষা ব্যবস্থাপনাকে আধুনিকায়ন
                করেছে
            </p>
        </div>

        <!-- Customers Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
            @foreach ($customers as $index => $customer)
                <div class="scroll-animate" data-animation="fade-in-up" data-delay="0">
                    <div
                        class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 group border border-gray-100">
                        <div class="flex items-center mb-4">
                            <img src="{{ asset('storage/' . $customer->image_url) }}" alt="{{ $customer->name }}"
                                class="w-10 h-10 object-contain filter group-hover:brightness-110 transition-all duration-300">

                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $customer->name }}</h3>
                                <a href="{{ $customer->url }}" target="_blank" class="text-sm text-gray-500 hover:text-blue-500">Visit Website</a>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            {{ [
                                'আমাদের প্রতিষ্ঠান বর্ণমালা ব্যবহার করে তাদের প্রশাসনিক কাজগুলো অনেক সহজ করেছে।',
                                'বর্ণমালা ব্যবহার করে আমাদের স্কুলের ছাত্র-ছাত্রী ও  অভিভাবকদের সাথে যোগাযোগ এখন আরও সহজ।',
                                'বর্ণমালা ব্যবহার করে আমাদের প্রতিষ্ঠান তাদের প্রশাসনিক কাজগুলো অনেক সহজ করেছে।',
                            ][$index] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- View All Button -->
        <div class="text-center mt-12 scroll-animate" data-animation="fade-in-up" data-delay="1200">
            <a href="/customers" class="btn btn-primary px-8 py-3 text-lg">সকল গ্রাহক দেখুন</a>
        </div>
    </div>
</div>
