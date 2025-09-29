@extends('layout.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-purple-50 to-pink-50 relative overflow-hidden">
        <!-- Floating Background Elements -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-purple-200 rounded-full blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 bg-pink-200 rounded-full blur-3xl opacity-40 animate-pulse"
            style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-indigo-200 rounded-full blur-2xl opacity-25 animate-pulse"
            style="animation-delay: 2s;"></div>

        <div class="container mx-auto px-4 py-10 lg:py-16">
            <!-- Enhanced Header Section -->
            <div class="text-center mb-16">
                <!-- Badge -->
                <div
                    class="inline-flex items-center px-6 py-3 bg-white/80 backdrop-blur-sm rounded-full shadow-lg border border-purple-100 mb-8">
                    <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-sm font-medium text-gray-700">আমাদের স্মৃতিভান্ডার</span>
                </div>

                <!-- Title with Gradient -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                    বর্নমালা <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 via-pink-600 to-indigo-600">গ্যালারী</span>
                    এবং স্মৃতি
                </h1>

                <!-- Description -->
                <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    প্রতিটি মুহূর্তের সুন্দর স্মৃতি, আমাদের যাত্রার অবিস্মরণীয় অধ্যায় এবং সাফল্যের গল্প যা আমাদের ভবিষ্যতের পথ দেখায়।
                </p>
            </div>

            <!-- Modern Gallery Grid -->
            @if ($galleries->count() > 0)
                <!-- Simple Grid layout -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="gallery-container">
                    @foreach ($galleries as $index => $image)
                        <div class="gallery-item animate-fadeInUp" 
                             style="animation-delay: {{ $index * 0.1 }}s;" 
                             data-category="all recent">
                            
                            <!-- Simple Image Card -->
                            <div class="group relative bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl border border-gray-100 hover:border-purple-200 cursor-pointer"
                                 onclick="openSimpleModal('{{ asset('storage/' . $image->image_url) }}', '{{ addslashes($image->caption) }}')">

                                <!-- Image Container - Fixed Aspect Ratio -->
                                <div class="relative overflow-hidden aspect-square bg-gradient-to-br from-purple-100 to-pink-100">
                                    
                                    <!-- Main Image -->
                                    <img src="{{ asset('storage/' . $image->image_url) }}" 
                                         alt="{{ $image->caption }}"
                                         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                                         loading="lazy">
                                    
                                    <!-- Hover Overlay -->
                                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300"></div>
                                    
                                    <!-- Share Button on Hover -->
                                    <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        <button class="p-2 bg-white/90 backdrop-blur-sm rounded-full shadow-lg hover:bg-white hover:scale-110 transition-all duration-200" 
                                                onclick="event.stopPropagation(); shareImage('{{ asset('storage/' . $image->image_url) }}', '{{ addslashes($image->caption) }}')">
                                            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Caption Section -->
                                <div class="p-4">
                                    <h3 class="text-sm font-medium text-gray-900 group-hover:text-purple-700 transition-colors duration-300 line-clamp-2">
                                        {{ $image->caption }}
                                    </h3>
                                    
                                    <!-- Date -->
                                    <div class="flex items-center mt-2 text-xs text-gray-500">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        @if($image->created_at)
                                            {{ \Carbon\Carbon::parse($image->created_at)->format('d M Y') }}
                                        @else
                                            সম্প্রতি
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-20">
                    <div
                        class="w-24 h-24 bg-gradient-to-r from-purple-100 to-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">কোনো ছবি পাওয়া যায়নি</h3>
                    <p class="text-gray-600 mb-8">এখনো কোনো ছবি আপলোড করা হয়নি। শীঘ্রই নতুন ছবি যোগ করা হবে।</p>
                    <a href="/"
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-medium rounded-full hover:from-purple-700 hover:to-pink-700 transition-all duration-300">
                        হোমে ফিরুন
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Simple Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 hidden opacity-0 transition-all duration-300">
        <div class="absolute inset-0 flex items-center justify-center p-4" onclick="closeSimpleModal()">
            <!-- Close Button -->
            <button onclick="closeSimpleModal()" class="absolute top-6 right-6 z-60 p-2 bg-white/20 backdrop-blur-sm rounded-full hover:bg-white/30 transition-all duration-300">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Image Container -->
            <div class="max-w-4xl max-h-[90vh] bg-white rounded-2xl overflow-hidden shadow-2xl" onclick="event.stopPropagation()">
                <img id="modalImage" src="" alt="" class="w-full h-auto max-h-[70vh] object-contain">
                <div class="p-6">
                    <h3 id="modalCaption" class="text-lg font-semibold text-gray-900 mb-2"></h3>
                    <p class="text-sm text-gray-600">ছবিতে ক্লিক করুন বন্ধ করতে</p>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('css/events.css') }}">
    <script src="{{ asset('js/gallery.js') }}"></script>
@endsection
