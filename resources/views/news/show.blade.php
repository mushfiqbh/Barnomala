@extends('layout.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50">
        <!-- Article Container -->
        <div class="md:container md:py-8 mx-auto">

            <!-- Article Header -->
            <article class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 p-5 md:p-10">

                <!-- Article Meta -->
                <div class="flex items-center justify-between mb-6 text-sm text-gray-500">
                    <div class="flex items-center space-x-4">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            {{ \Carbon\Carbon::parse($newsItem->published_at)->format('F j, Y') }}
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            2 মিনিট পড়ার সময়
                        </span>
                    </div>
                </div>

                <!-- Article Title -->
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    {{ $newsItem->title }}
                </h1>

                <!-- Article Content -->
                <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                    <div class="text-gray-700 leading-relaxed text-lg space-y-6">
                        {!! nl2br(e($newsItem->content)) !!}
                    </div>

                    <!-- Featured Image -->
                    <div class="lg:col-span-1 order-1 lg:order-2 md:px-10">
                        <div class="relative h-64 lg:h-full overflow-hidden lg:rounded-r-3xl">
                            <img src="{{ asset('storage/' . $newsItem->image_url) }}" alt="{{ $newsItem->title }}"
                                class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700">
                        </div>
                    </div>
                </div>

                <!-- Article Footer -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div
                        class="flex flex-col sm:flex-row items-start sm:items-center justify-between space-y-4 sm:space-y-0">

                        <!-- Tags (if available) -->
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">সংবাদ</span>
                            <span
                                class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">আপডেট</span>
                        </div>

                        <!-- Share Again -->
                        <div class="text-sm text-gray-500">
                            <span>এই খবরটি পছন্দ হলে শেয়ার করুন</span>
                        </div>

                    </div>
                </div>

                <!-- Share Buttons Section (Full Width) -->
                <div class="pt-6">
                    <div class="p-6 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl border border-blue-100">
                        <div
                            class="flex flex-col sm:flex-row items-start sm:items-center justify-between space-y-4 sm:space-y-0">

                            <!-- Share Label -->
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z">
                                    </path>
                                </svg>
                                <span class="font-semibold text-gray-700">এই খবরটি শেয়ার করুন:</span>
                            </div>

                            <!-- Social Share Buttons -->
                            <div class="flex flex-wrap gap-3">

                                <!-- Facebook Share -->
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                    target="_blank"
                                    class="group flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                </a>

                                <!-- Twitter Share -->
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($newsItem->title) }}&url={{ urlencode(request()->fullUrl()) }}"
                                    target="_blank"
                                    class="group flex items-center px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                    </svg>
                                </a>

                                <!-- WhatsApp Share -->
                                <a href="https://wa.me/?text={{ urlencode($newsItem->title . ' - ' . request()->fullUrl()) }}"
                                    target="_blank"
                                    class="group flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488" />
                                    </svg>
                                </a>

                                <!-- LinkedIn Share -->
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}"
                                    target="_blank"
                                    class="group flex items-center px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
@endsection
