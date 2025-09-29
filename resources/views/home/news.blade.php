<div id="news" class="w-fit mx-auto mb-10">
    <!-- Enhanced News Heading -->
    <div class="text-center my-16 scroll-animate" data-animation="fade-in-up">
        <!-- Main Heading -->
        <h1 class="text-4xl lg:text-5xl text-slate-800 font-bold mb-4 leading-tight">
            সাম্প্রতিক খবর
        </h1>

        <!-- Decorative Elements -->
        <div class="relative">
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-8">
                <div
                    class="w-6 h-6 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full blur-lg opacity-30 animate-bounce">
                </div>
            </div>
            <div class="h-1 w-20 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full mx-auto"></div>
        </div>
    </div>

    <div class="w-fit mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 scroll-animate" data-animation="fade-in-up" data-delay="300">
        @foreach ($news as $item)
            <a href="{{ url('/news/' . $item->slug) }}" class="w-full md:w-80 text-blue-600 hover:underline group scroll-animate" data-animation="slide-in-up" data-delay="{{ $loop->index * 150 }}">
                <div>
                    <img src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->title }}"
                        class="group-hover:scale-105 transition-transform">
                </div>
                <div class="mt-2 p-5">
                    <p class="text-gray-600">{{ $item->published_at }}</p>
                    <hr class="my-2 border-gray-300" />
                    <p class="text-primary font-semibold">{{ $item->title }}</p>
                </div>
            </a>
        @endforeach
    </div>

    <div class="w-full mx-auto text-center scroll-animate" data-animation="fade-in-up" data-delay="600">
        <a href="/news" class="btn btn-primary block mt-6">সকল খবর</a>
    </div>
</div>
