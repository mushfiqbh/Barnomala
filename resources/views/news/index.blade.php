@extends('layout.app')

@section('title', 'সংবাদ')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 relative overflow-hidden">
        <!-- Floating Background Elements -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-green-200 rounded-full blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 bg-teal-200 rounded-full blur-3xl opacity-40 animate-pulse"
            style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-emerald-200 rounded-full blur-2xl opacity-25 animate-pulse"
            style="animation-delay: 2s;"></div>

        <div class="container mx-auto px-4 py-10 lg:py-16">
            <!-- Enhanced Header Section -->
            <div class="text-center mb-16">
                <!-- Badge -->
                <div
                    class="inline-flex items-center px-6 py-3 bg-white/80 backdrop-blur-sm rounded-full shadow-lg border border-green-100 mb-8">
                    <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                    </svg>
                    <span class="text-sm font-medium text-gray-700">সর্বশেষ আপডেট</span>
                </div>

                <!-- Title with Gradient -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                    বর্নমালা <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-green-600 via-teal-600 to-emerald-600">সংবাদ</span>
                    ও তথ্য
                </h1>

                <!-- Description -->
                <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    আমাদের প্রতিষ্ঠানের সর্বশেষ সংবাদ, গুরুত্বপূর্ণ তথ্যাবলী এবং আপডেট যা আপনাকে সব সময় অবগত রাখবে।
                </p>
            </div>

            <!-- Modern News Grid -->
            @if (count($news) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
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
            @else
                <!-- Enhanced Empty State -->
                <div class="text-center py-16">
                    <div
                        class="bg-white/70 backdrop-blur-xl rounded-3xl shadow-lg p-12 max-w-md mx-auto border border-white/20">
                        <div
                            class="w-20 h-20 bg-gradient-to-br from-green-100 to-teal-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">কোনো সংবাদ নেই</h3>
                        <p class="text-gray-600">এখনো কোনো সংবাদ প্রকাশ করা হয়নি। পরে আবার দেখুন।</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection
