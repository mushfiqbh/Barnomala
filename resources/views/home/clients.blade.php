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

        <!-- Clients Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
            @foreach ($clients as $index => $client)
                <x-client-card :client="$client" :index="$index" />
            @endforeach
        </div>

        <!-- View All Button -->
        <div class="text-center mt-12 scroll-animate" data-animation="fade-in-up" data-delay="1200">
            <a href="/clients" class="btn btn-primary px-8 py-3 text-lg">সকল গ্রাহক দেখুন</a>
        </div>
    </div>

    <style>
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</div>
