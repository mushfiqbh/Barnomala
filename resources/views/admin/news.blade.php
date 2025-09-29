@extends('layout.app')

@section('title', 'সংবাদ ম্যানেজমেন্ট')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900 mb-2">সংবাদ ম্যানেজমেন্ট</h1>
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                <li class="inline-flex items-center">
                                    <a href="{{ route('admin.index') }}"
                                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                            </path>
                                        </svg>
                                        অ্যাডমিন
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">সংবাদ</span>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>

                    <div class="flex space-x-3">
                        <a href="/news"
                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            সকল সংবাদ দেখুন
                        </a>
                    </div>
                </div>
            </div>

            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg" role="alert">
                    <div class="flex">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg" role="alert">
                    <div class="flex">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <!-- Add New News Form -->
            <div class="bg-white rounded-3xl shadow-xl p-6 sm:p-8 mb-8 border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="bg-blue-100 p-3 rounded-full mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">নতুন সংবাদ যোগ করুন</h2>
                        <p class="text-gray-600">সংবাদের শিরোনাম, বিস্তারিত এবং ছবি যোগ করুন।</p>
                    </div>
                </div>

                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" id="newsForm"
                    class="space-y-8">
                    @csrf

                    <!-- Title and Image Row -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Left Column - Form Fields -->
                        <div class="space-y-6">
                            <!-- News Title -->
                            <div class="space-y-2">
                                <label for="title" class="block text-sm font-medium text-gray-700">
                                    সংবাদের শিরোনাম <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="title" id="title" required value="{{ old('title') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                    placeholder="সংবাদের শিরোনাম লিখুন...">
                                @error('title')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Publication Date -->
                            <div class="space-y-2">
                                <label for="published_at" class="block text-sm font-medium text-gray-700">
                                    প্রকাশের তারিখ (ঐচ্ছিক)
                                </label>
                                <input type="datetime-local" name="published_at" id="published_at"
                                    value="{{ old('published_at') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                @error('published_at')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <p class="text-sm text-gray-500">খালি রাখলে বর্তমান সময় ব্যবহার হবে।</p>
                            </div>
                        </div>

                        <!-- Right Column - Image Upload -->
                        <div class="space-y-4">
                            <label class="block text-sm font-medium text-gray-700">সংবাদের ছবি (ঐচ্ছিক)</label>

                            <!-- Drag & Drop Area -->
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-blue-400 transition-colors duration-200"
                                id="dropZone">
                                <div id="defaultContent">
                                    <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <p class="text-lg font-medium text-gray-900 mb-2">ছবি ড্র্যাগ করুন অথবা ক্লিক করুন</p>
                                    <p class="text-gray-500">PNG, JPG, JPEG ফাইল সাপোর্ট করে (সর্বোচ্চ 10MB)</p>
                                </div>

                                <!-- Preview Area -->
                                <div id="previewArea" class="hidden">
                                    <img id="imagePreview" class="mx-auto max-h-48 rounded-lg shadow-lg" alt="Preview">
                                    <p class="mt-2 text-sm text-gray-600">ছবি প্রিভিউ</p>
                                    <button type="button" onclick="clearPreview()"
                                        class="mt-2 text-red-500 hover:text-red-700 text-sm">
                                        ছবি সরান
                                    </button>
                                </div>

                                <input type="file" name="image" id="fileInput" accept="image/*" class="hidden">
                            </div>

                            @error('image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Content Area -->
                    <div class="space-y-2">
                        <label for="content" class="block text-sm font-medium text-gray-700">
                            সংবাদের বিস্তারিত <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <textarea name="content" id="content" rows="8" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none"
                                placeholder="সংবাদের বিস্তারিত লিখুন..." maxlength="5000" oninput="updateCharCount()">{{ old('content') }}</textarea>

                            <!-- Character Counter -->
                            <div class="absolute bottom-3 right-3 text-sm text-gray-400">
                                <span id="char-count">0</span>/5000
                            </div>
                        </div>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end pt-4">
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 font-medium">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            সংবাদ প্রকাশ করুন
                        </button>
                    </div>
                </form>
            </div>

            <!-- News List -->
            <div class="bg-white rounded-3xl shadow-xl p-6 sm:p-8 border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <div class="bg-purple-100 p-3 rounded-full mr-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">প্রকাশিত সংবাদ</h3>
                            <p class="text-gray-600">{{ count($news) }} টি সংবাদ প্রকাশিত হয়েছে</p>
                        </div>
                    </div>
                </div>

                @if (count($news) > 0)
                    <div class="space-y-6">
                        @foreach ($news as $article)
                            <div class="bg-gray-50 rounded-2xl p-6 hover:shadow-md transition-all duration-300">
                                <div class="flex flex-col lg:flex-row gap-6">
                                    <!-- News Image -->
                                    <div class="lg:w-48 flex-shrink-0">
                                        @if ($article->image_url)
                                            <img src="{{ asset('storage/' . $article->image_url) }}"
                                                alt="{{ $article->title }}"
                                                class="w-full lg:w-48 h-32 object-cover rounded-lg">
                                        @else
                                            <div
                                                class="w-full lg:w-48 h-32 bg-gray-200 rounded-lg flex items-center justify-center">
                                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                                    </path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- News Content -->
                                    <div class="flex-1">
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1">
                                                <h4 class="text-xl font-bold text-gray-900 mb-2">{{ $article->title }}
                                                </h4>
                                                <p class="text-gray-600 mb-3 line-clamp-3">
                                                    {{ Str::limit($article->content, 200) }}</p>

                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                                                        <span>
                                                            <svg class="w-4 h-4 inline mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                                </path>
                                                            </svg>
                                                            {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d M Y') : \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}
                                                        </span>
                                                        <span>
                                                            <svg class="w-4 h-4 inline mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                                                </path>
                                                            </svg>
                                                            /news/{{ $article->slug }}
                                                        </span>
                                                    </div>

                                                    <div class="flex items-center space-x-2">
                                                        <!-- View News -->
                                                        <a href="/news/{{ $article->slug }}"
                                                            class="text-blue-500 hover:text-blue-700 p-1 rounded transition-colors duration-200"
                                                            title="সংবাদ দেখুন">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                                </path>
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                                </path>
                                                            </svg>
                                                        </a>

                                                        <!-- Delete Button -->
                                                        <form action="{{ route('admin.news.delete', $article->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('এই সংবাদটি মুছে ফেলার বিষয়ে আপনি কি নিশ্চিত?')"
                                                            class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="text-red-500 hover:text-red-700 p-1 rounded transition-colors duration-200"
                                                                title="সংবাদ মুছুন">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12 text-gray-500">
                        <svg class="mx-auto h-24 w-24 text-gray-300 mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                        <h4 class="text-lg font-medium mb-2">এখনো কোনো সংবাদ প্রকাশ করা হয়নি</h4>
                        <p>উপরের ফর্ম ব্যবহার করে প্রথম সংবাদ প্রকাশ করুন।</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropZone = document.getElementById('dropZone');
            const fileInput = document.getElementById('fileInput');
            const defaultContent = document.getElementById('defaultContent');
            const previewArea = document.getElementById('previewArea');
            const imagePreview = document.getElementById('imagePreview');

            // Click to select file
            dropZone.addEventListener('click', () => {
                fileInput.click();
            });

            // File input change
            fileInput.addEventListener('change', handleFileSelect);

            // Drag and drop functionality
            dropZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropZone.classList.add('border-blue-500', 'bg-blue-50');
            });

            dropZone.addEventListener('dragleave', (e) => {
                e.preventDefault();
                dropZone.classList.remove('border-blue-500', 'bg-blue-50');
            });

            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('border-blue-500', 'bg-blue-50');

                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    fileInput.files = files;
                    handleFileSelect();
                }
            });

            function handleFileSelect() {
                const file = fileInput.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        imagePreview.src = e.target.result;
                        defaultContent.classList.add('hidden');
                        previewArea.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            }

            window.clearPreview = function() {
                fileInput.value = '';
                defaultContent.classList.remove('hidden');
                previewArea.classList.add('hidden');
            }

            // Character counter for content
            window.updateCharCount = function() {
                const textarea = document.getElementById('content');
                const counter = document.getElementById('char-count');
                counter.textContent = textarea.value.length;

                // Change color when approaching limit
                if (textarea.value.length > 4500) {
                    counter.classList.add('text-red-500');
                    counter.classList.remove('text-gray-400');
                } else {
                    counter.classList.remove('text-red-500');
                    counter.classList.add('text-gray-400');
                }
            }

            // Initialize character counter
            updateCharCount();
        });
    </script>

    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection
