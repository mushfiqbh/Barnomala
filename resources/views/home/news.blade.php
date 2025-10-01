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

    <div class="w-full md:w-5/6 mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 scroll-animate" data-animation="fade-in-up"
        data-delay="300">
        @foreach ($news as $article)
            <article
                class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden">
                <!-- News Image -->
                <div class="aspect-video overflow-hidden">
                    @if ($article->image_url)
                        <img src="{{ asset('storage/' . $article->image_url) }}" alt="{{ $article->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <div
                            class="w-full h-full bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                </path>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- News Content -->
                <div class="p-6">
                    <a href="/news/{{ $article->slug }}">
                        <!-- Publication Date -->
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d F Y') : \Carbon\Carbon::parse($article->created_at)->format('d F Y') }}
                        </div>

                        <!-- News Title -->
                        <h2
                            class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-200">
                            {{ $article->title }}
                        </h2>

                        <!-- News Excerpt -->
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ Str::limit($article->content, 150) }}
                        </p>

                        <!-- Read More Button -->
                        <p
                            class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors duration-200">
                            বিস্তারিত পড়ুন
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </p>
                    </a>
                </div>
            </article>
        @endforeach
    </div>

    <div class="w-full mx-auto text-center scroll-animate" data-animation="fade-in-up" data-delay="600">
        <a href="/news" class="btn btn-primary block mt-6">সকল খবর</a>
    </div>
</div>
