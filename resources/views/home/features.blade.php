<div id="features" class="w-full md:w-2/3 py-10 gap-8 mx-auto">
    <div class="text-center scroll-animate" data-animation="fade-in-up">
        <!-- Enhanced Features Heading -->
        <div class="relative mb-8">
            <!-- Main Heading -->
            <h1 class="text-4xl lg:text-5xl text-slate-800 font-bold mb-4 leading-tight">
                বর্নমালার বৈশিষ্ট্যসমুহ</h1>

            <!-- Decorative Elements -->
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-4">
                <div
                    class="w-8 h-8 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full blur-lg opacity-30 animate-pulse">
                </div>
            </div>
            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                <div class="h-1 w-24 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
            </div>
        </div>

        <p class="text-lg text-slate-600 max-w-3xl mx-auto leading-relaxed">বর্নমালা তৈরি করা হয়েছে কিছু আকর্ষণীয় ও
            যুগপযোগি বৈশিষ্ট্যের সমন্বয়ে, যা আপনাকে অটোমেশন
            সিস্টেমের মতো আপনার
            ইনস্টিটিউট পরিচালনা করতে সহায়তা করে।</p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-5 mt-8 scroll-animate" data-animation="scale-in" data-delay="300">
        @foreach ($features->take(6) as $feature)
            <x-feature-card :feature="$feature" :index="$loop->index" />
        @endforeach
    </div>

    <div class="w-full mx-auto text-center scroll-animate" data-animation="fade-in-up" data-delay="600">
        <a href="/features" class="btn btn-primary block mt-6">সকল বৈশিষ্ট্য সমুহ</a>
    </div>
</div>
