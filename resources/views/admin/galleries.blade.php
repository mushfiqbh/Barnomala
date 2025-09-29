@extends('layout.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50">
    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2">
                        গ্যালারী ম্যানেজমেন্ট
                    </h1>
                    <p class="text-gray-600 text-lg">
                        নতুন ছবি যোগ করুন এবং বিদ্যমান ছবিগুলো পরিচালনা করুন
                    </p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.index') }}" 
                       class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition-colors duration-200">
                        ← ড্যাশবোর্ড
                    </a>
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                        অ্যাডমিন প্যানেল
                    </span>
                </div>
            </div>
        </div>
        <!-- Upload Form -->
        <div class="bg-white rounded-3xl shadow-xl p-6 sm:p-8 lg:p-10 mb-8 border border-gray-100">
            <div class="flex items-center mb-6">
                <div class="bg-blue-100 p-3 rounded-full mr-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">নতুন ছবি আপলোড করুন</h2>
                    <p class="text-gray-600">একটি ছবি এবং ক্যাপশন যোগ করুন</p>
                </div>
            </div>

            <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data"
                class="w-full block lg:flex justify-between space-y-6 lg:space-y-0 gap-10">
                @csrf

                <!-- Image Upload Section -->
                <div class="w-full lg:w-1/2 space-y-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        ছবি নির্বাচন করুন *
                    </label>

                    <!-- Drag & Drop Upload Area -->
                    <div class="relative">
                        <input type="file" name="file" id="image-upload" accept="image/*" required
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                            onchange="handleFileSelect(this)">

                        <div id="upload-area"
                            class="border-2 border-dashed border-gray-300 rounded-2xl p-8 text-center hover:border-blue-500 hover:bg-blue-50 transition-all duration-300 bg-gray-50">
                            <div id="upload-content">
                                <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 48 48">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">ছবি আপলোড করুন</h3>
                                <p class="text-gray-500 mb-4">ড্র্যাগ অ্যান্ড ড্রপ করুন অথবা ক্লিক করে ছবি নির্বাচন করুন
                                </p>
                                <div class="flex items-center justify-center space-x-2">
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">JPG</span>
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">PNG</span>
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">GIF</span>
                                </div>
                            </div>

                            <!-- Preview Area (Hidden Initially) -->
                            <div id="preview-area" class="hidden">
                                <img id="image-preview" src="" alt="Preview"
                                    class="mx-auto max-h-48 rounded-lg shadow-lg mb-4">
                                <div class="flex items-center justify-center space-x-4">
                                    <span id="file-name" class="text-gray-700 font-medium"></span>
                                    <button type="button" onclick="clearPreview()"
                                        class="text-red-500 hover:text-red-700 transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @error('file')
                        <p class="text-red-500 text-sm mt-2 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="w-full lg:w-1/2 flex flex-col gap-5">
                    <!-- Caption Input -->
                    <div class="space-y-4">
                        <label for="caption" class="block text-sm font-medium text-gray-700">
                            ছবির ক্যাপশন *
                        </label>
                        <div class="relative">
                            <textarea name="caption" id="caption" rows="4" required placeholder="ছবির বিবরণ লিখুন..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 resize-none"
                                maxlength="500" oninput="updateCharCount()"></textarea>

                            <!-- Character Counter -->
                            <div class="absolute bottom-3 right-3 text-sm text-gray-400">
                                <span id="char-count">0</span>/500
                            </div>
                        </div>

                        @error('caption')
                            <p class="text-red-500 text-sm flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="text-sm text-gray-500">
                        <span class="font-medium">সমর্থিত ফরম্যাট:</span> JPG, PNG, GIF (সর্বোচ্চ 10MB)
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="group relative px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition-all duration-300 shadow-lg hover:shadow-xl">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2 group-hover:animate-bounce" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            আপলোড করুন
                        </span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Success/Error Messages -->
        @if (session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 rounded-xl p-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-green-800 font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 bg-red-50 border border-red-200 rounded-xl p-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-red-800 font-medium">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <!-- Gallery Preview Section -->
        <div class="bg-white rounded-3xl shadow-xl p-6 sm:p-8 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <div class="bg-purple-100 p-3 rounded-full mr-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">বর্তমান গ্যালারী</h3>
                        <p class="text-gray-600">{{ count($galleries) }} টি ছবি আপলোড করা হয়েছে</p>
                    </div>
                </div>
                <a href="/gallery" 
                   class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    গ্যালারী দেখুন
                </a>
            </div>

            @if(count($galleries) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($galleries as $item)
                        <div class="group relative bg-gray-50 rounded-2xl overflow-hidden hover:shadow-lg transition-all duration-300">
                            <!-- Image Container -->
                            <div class="aspect-square overflow-hidden">
                                <img src="{{ asset('storage/' . $item->image_url) }}" 
                                     alt="{{ $item->caption }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                            
                            <!-- Content -->
                            <div class="p-4">
                                <p class="text-sm text-gray-700 line-clamp-2 mb-3">{{ $item->caption }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-gray-500">
                                        {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                    </span>
                                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.galleries.delete', $item->id) }}" method="POST" 
                                          onsubmit="return confirm('এই ছবিটি মুছে ফেলার বিষয়ে আপনি কি নিশ্চিত?')"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-500 hover:text-red-700 p-1 rounded transition-colors duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 text-gray-500">
                    <svg class="mx-auto h-24 w-24 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h4 class="text-lg font-medium mb-2">এখনো কোনো ছবি আপলোড করা হয়নি</h4>
                    <p>উপরের ফর্ম ব্যবহার করে প্রথম ছবি আপলোড করুন।</p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- JavaScript for Enhanced UX -->
<script>
    // File upload handling
    function handleFileSelect(input) {
        const file = input.files[0];
        const uploadContent = document.getElementById('upload-content');
        const previewArea = document.getElementById('preview-area');
        const imagePreview = document.getElementById('image-preview');
        const fileName = document.getElementById('file-name');

        if (file) {
            // Validate file type
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                alert('দুঃখিত! শুধুমাত্র JPG, PNG এবং GIF ফাইল সমর্থিত।');
                input.value = '';
                return;
            }

            // Validate file size (10MB)
            if (file.size > 10 * 1024 * 1024) {
                alert('ফাইলের আকার অত্যধিক! সর্বোচ্চ 10MB পর্যন্ত ফাইল আপলোড করা যায়।');
                input.value = '';
                return;
            }

            // Show preview
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                fileName.textContent = file.name;
                uploadContent.classList.add('hidden');
                previewArea.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    }

    // Clear preview
    function clearPreview() {
        const input = document.getElementById('image-upload');
        const uploadContent = document.getElementById('upload-content');
        const previewArea = document.getElementById('preview-area');

        input.value = '';
        uploadContent.classList.remove('hidden');
        previewArea.classList.add('hidden');
    }

    // Character counter for caption
    function updateCharCount() {
        const textarea = document.getElementById('caption');
        const counter = document.getElementById('char-count');
        counter.textContent = textarea.value.length;

        // Change color when approaching limit
        if (textarea.value.length > 450) {
            counter.classList.add('text-red-500');
            counter.classList.remove('text-gray-400');
        } else {
            counter.classList.remove('text-red-500');
            counter.classList.add('text-gray-400');
        }
    }

    // Drag and drop functionality
    const uploadArea = document.getElementById('upload-area');
    const imageUpload = document.getElementById('image-upload');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        uploadArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight(e) {
        uploadArea.classList.add('border-blue-500', 'bg-blue-50');
    }

    function unhighlight(e) {
        uploadArea.classList.remove('border-blue-500', 'bg-blue-50');
    }

    uploadArea.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        if (files.length > 0) {
            imageUpload.files = files;
            handleFileSelect(imageUpload);
        }
    }

    // Form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const imageInput = document.getElementById('image-upload');
        const captionInput = document.getElementById('caption');

        if (!imageInput.files[0]) {
            e.preventDefault();
            alert('অনুগ্রহ করে একটি ছবি নির্বাচন করুন।');
            return;
        }

        if (!captionInput.value.trim()) {
            e.preventDefault();
            alert('অনুগ্রহ করে ছবির ক্যাপশন লিখুন।');
            captionInput.focus();
            return;
        }
    });

    // Initialize character counter
    updateCharCount();
</script>

<!-- Custom Styles -->
<style>
    .drag-over {
        border-color: #3b82f6 !important;
        background-color: #eff6ff !important;
    }

    /* Smooth transitions for all interactive elements */
    * {
        transition-property: color, background-color, border-color, transform, box-shadow;
        transition-duration: 200ms;
        transition-timing-function: ease-in-out;
    }
</style>
