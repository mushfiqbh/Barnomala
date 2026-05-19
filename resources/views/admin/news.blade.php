@extends('layout.admin')

@section('title', 'সংবাদ ম্যানেজমেন্ট')

@section('content')
    <div class="min-h-screen p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto">
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
            <div class="bg-white rounded-2xl shadow-xl p-5 mb-8 border border-gray-100">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex items-center mb-6">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center space-x-3">
                                <h2 id="formTitle" class="text-2xl font-bold text-gray-900">নতুন সংবাদ যোগ করুন</h2>
                                <span id="editingBadge"
                                    class="hidden px-2 py-1 text-xs font-semibold text-orange-600 bg-orange-100 rounded-full">
                                    সম্পাদনা মোড
                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="flex-shrink-0">
                        <a href="{{ route('news.index') }}" target="_blank"
                            class="inline-flex items-center space-x-1.5 px-3 py-1.5 bg-gradient-to-r from-blue-50 to-indigo-50 hover:from-blue-100 hover:to-indigo-100 text-blue-700 font-medium rounded-lg border border-blue-200 transition-all duration-300 hover:shadow-md group">
                            <svg class="w-3.5 h-3.5 group-hover:scale-110 transition-transform duration-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            <span>ওয়েবে দেখুন</span>
                            <svg class="w-3 h-3 group-hover:translate-x-0.5 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <form action="{{ old('news_id') ? route('admin.news.update', ['id' => old('news_id')]) : route('admin.news.store') }}"
                    method="POST" enctype="multipart/form-data" id="newsForm" class="space-y-8"
                    data-store-action="{{ route('admin.news.store') }}"
                    data-update-template="{{ route('admin.news.update', ['id' => '__ID__']) }}">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="{{ old('news_id') ? 'PUT' : 'POST' }}">
                    <input type="hidden" name="news_id" id="newsId" value="{{ old('news_id') }}">

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

                                <input type="file" name="image" id="fileInput" accept="image/*" class="hidden"
                                    @unless(old('news_id')) required @endunless>
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
                        <div
                            class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                            <div class="flex items-center border-b border-gray-200 bg-gray-50">
                                <button type="button" data-tab-target="editor"
                                    class="tab-button flex-1 px-4 py-2 text-sm font-medium">
                                    মার্কডাউন টেক্সট এডিটর
                                </button>
                                <button type="button" data-tab-target="preview"
                                    class="tab-button flex-1 px-4 py-2 text-sm font-medium">
                                    প্রিভিউ
                                </button>
                            </div>
                            <div id="editorPane" class="p-4 space-y-2">
                                <div id="editorToolbar" class="flex flex-wrap items-center gap-2">
                                    <button type="button" class="editor-toolbar-btn" data-editor-action="bold"
                                        title="Bold (**টেক্সট**)">
                                        <span aria-hidden="true" class="editor-toolbar-label font-semibold">B</span>
                                        <span class="sr-only">বোল্ড</span>
                                    </button>
                                    <button type="button" class="editor-toolbar-btn" data-editor-action="italic"
                                        title="Italic (_টেক্সট_)">
                                        <span aria-hidden="true" class="editor-toolbar-label italic">I</span>
                                        <span class="sr-only">ইটালিক</span>
                                    </button>
                                    <button type="button" class="editor-toolbar-btn" data-editor-action="heading"
                                        title="Heading (# শিরোনাম)">
                                        <span aria-hidden="true" class="editor-toolbar-label font-semibold">H1</span>
                                        <span class="sr-only">শিরোনাম</span>
                                    </button>
                                    <button type="button" class="editor-toolbar-btn" data-editor-action="subheading"
                                        title="Subheading (## শিরোনাম)">
                                        <span aria-hidden="true" class="editor-toolbar-label font-semibold">H2</span>
                                        <span class="sr-only">সাব-শিরোনাম</span>
                                    </button>
                                    <button type="button" class="editor-toolbar-btn" data-editor-action="quote"
                                        title="Quote (> উদ্ধৃতি)">
                                        <span aria-hidden="true" class="editor-toolbar-label">“”</span>
                                        <span class="sr-only">উদ্ধৃতি</span>
                                    </button>
                                    <button type="button" class="editor-toolbar-btn" data-editor-action="unordered-list"
                                        title="List (- তালিকা)">
                                        <span aria-hidden="true" class="editor-toolbar-label">•</span>
                                        <span class="sr-only">বুলেট তালিকা</span>
                                    </button>
                                    <button type="button" class="editor-toolbar-btn" data-editor-action="ordered-list"
                                        title="Numbered list (1. তালিকা)">
                                        <span aria-hidden="true" class="editor-toolbar-label">1.</span>
                                        <span class="sr-only">সংখ্যা তালিকা</span>
                                    </button>
                                    <button type="button" class="editor-toolbar-btn" data-editor-action="link"
                                        title="Link [টেক্সট](লিংক)">
                                        <svg aria-hidden="true" class="h-4 w-4 editor-toolbar-icon" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.828 10.172a4 4 0 010 5.656l-3 3a4 4 0 11-5.656-5.656l1.172-1.172" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10.172 13.828a4 4 0 010-5.656l3-3a4 4 0 115.656 5.656l-1.172 1.172" />
                                        </svg>
                                        <span class="sr-only">লিংক</span>
                                    </button>
                                    <button type="button" class="editor-toolbar-btn" data-editor-action="code"
                                        title="Inline code (`code`)">
                                        <span aria-hidden="true" class="editor-toolbar-label">`</span>
                                        <span class="sr-only">ইনলাইন কোড</span>
                                    </button>
                                    <button type="button" class="editor-toolbar-btn" data-editor-action="codeblock"
                                        title="Code block (```)">
                                        <span aria-hidden="true" class="editor-toolbar-label">{ }</span>
                                        <span class="sr-only">কোড ব্লক</span>
                                    </button>
                                    <button type="button" class="editor-toolbar-btn" data-editor-action="hr"
                                        title="Divider (---)">
                                        <span aria-hidden="true" class="editor-toolbar-label">―</span>
                                        <span class="sr-only">বিভাজক</span>
                                    </button>
                                </div>
                                <textarea name="content" id="content" rows="10" required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-y min-h-[240px]"
                                    placeholder="Markdown ফরম্যাটে সংবাদ লিখুন..." maxlength="5000">{{ old('content') }}</textarea>
                                <div class="text-right text-sm text-gray-400">
                                    <span id="char-count" class="text-gray-400">0</span>/5000
                                </div>
                            </div>
                            
                            <x-markdown-content
                                id="previewPane"
                                class="hidden p-6 bg-white min-h-[240px] overflow-y-auto"
                                preview-id="markdownPreview"
                                preview-class="markdown-preview text-gray-700"
                                :render="false"
                            />

                        </div>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end pt-4 space-x-3">
                        <button type="button" id="cancelEditBtn"
                            class="hidden items-center px-5 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 transition-all duration-200 font-medium">
                            বাতিল করুন
                        </button>
                        <button type="submit" id="formSubmitButton"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 font-medium">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span id="submitButtonText">সংবাদ প্রকাশ করুন</span>
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
                            <div class="bg-gray-50 rounded-2xl p-6 hover:shadow-md transition-all duration-300 news-card"
                                data-news-card
                                data-news-id="{{ $article->id }}"
                                data-title="{{ e($article->title) }}"
                                data-content="{{ e($article->content) }}"
                                    data-published="{{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('Y-m-d\TH:i') : '' }}"
                                data-image-url="{{ $article->image_url ? asset('storage/' . $article->image_url) : '' }}"
                                data-image-name="{{ $article->image_url ? basename($article->image_url) : '' }}">
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
                                                        <!-- Edit Button -->
                                                        <button type="button" class="text-emerald-600 hover:text-emerald-700 p-1 rounded transition-colors duration-200 start-edit-btn"
                                                            title="সংবাদ সম্পাদনা করুন">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                            </svg>
                                                        </button>
                                                        <!-- View News -->
                                                        <a href="/news/{{ $article->slug }}" target="_blank"
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

    <script src="https://cdn.jsdelivr.net/npm/marked@12.0.2/marked.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dompurify@3.1.5/dist/purify.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropZone = document.getElementById('dropZone');
            const fileInput = document.getElementById('fileInput');
            const defaultContent = document.getElementById('defaultContent');
            const previewArea = document.getElementById('previewArea');
            const imagePreview = document.getElementById('imagePreview');

            const tabButtons = document.querySelectorAll('.tab-button');
            const editorPane = document.getElementById('editorPane');
            const previewPane = document.getElementById('previewPane');
            const markdownPreview = document.getElementById('markdownPreview');
            const contentTextarea = document.getElementById('content');
            const charCount = document.getElementById('char-count');

            const form = document.getElementById('newsForm');
            const formTitle = document.getElementById('formTitle');
            const submitButtonText = document.getElementById('submitButtonText');
            const editingBadge = document.getElementById('editingBadge');
            const cancelEditBtn = document.getElementById('cancelEditBtn');
            const newsIdField = document.getElementById('newsId');
            const formMethodInput = document.getElementById('formMethod');
            const titleInput = document.getElementById('title');
            const publishedAtInput = document.getElementById('published_at');
            const newsCards = document.querySelectorAll('[data-news-card]');
            const startEditButtons = document.querySelectorAll('.start-edit-btn');
            const toolbarButtons = document.querySelectorAll('[data-editor-action]');

            if (!form) {
                return;
            }

            const storeAction = form.dataset.storeAction || form.getAttribute('action');
            const updateTemplate = form.dataset.updateTemplate || '';

            const initialState = {
                editingId: newsIdField ? newsIdField.value : '',
                method: formMethodInput ? formMethodInput.value : 'POST',
                title: titleInput ? titleInput.value : '',
                content: contentTextarea ? contentTextarea.value : '',
                published: publishedAtInput ? publishedAtInput.value : ''
            };

            let activeCard = null;
            let existingImageUrl = null;

            function setFormTitle(text) {
                if (formTitle) {
                    formTitle.textContent = text;
                }
            }

            function showEditingBadge() {
                if (editingBadge) {
                    editingBadge.classList.remove('hidden');
                }
            }

            function hideEditingBadge() {
                if (editingBadge) {
                    editingBadge.classList.add('hidden');
                }
            }

            if (window.marked) {
                window.marked.setOptions({
                    breaks: true,
                    gfm: true
                });
            }

            function setActiveTab(target) {
                if (!editorPane || !previewPane) {
                    return;
                }

                tabButtons.forEach((button) => {
                    const isActive = button.dataset.tabTarget === target;
                    button.classList.toggle('tab-active', isActive);
                });

                if (target === 'editor') {
                    editorPane.classList.remove('hidden');
                    previewPane.classList.add('hidden');
                } else {
                    editorPane.classList.add('hidden');
                    previewPane.classList.remove('hidden');
                    renderPreview();
                }
            }

            function renderPreview() {
                if (!markdownPreview || !contentTextarea) {
                    return;
                }

                const rawContent = contentTextarea.value || '';
                if (!rawContent.trim()) {
                    markdownPreview.innerHTML = '<p class="text-gray-400">প্রিভিউ দেখতে কন্টেন্ট যুক্ত করুন।</p>';
                    return;
                }

                let html = rawContent.replace(/\n/g, '<br>');

                if (window.marked && typeof window.marked.parse === 'function') {
                    html = window.marked.parse(rawContent);
                }

                if (window.DOMPurify && typeof window.DOMPurify.sanitize === 'function') {
                    html = window.DOMPurify.sanitize(html, { USE_PROFILES: { html: true } });
                }

                markdownPreview.innerHTML = html;
            }

            function updateCharCount() {
                if (!charCount || !contentTextarea) {
                    return;
                }

                const length = contentTextarea.value.length;
                charCount.textContent = length;

                if (length > 4500) {
                    charCount.classList.add('text-red-500');
                    charCount.classList.remove('text-gray-400');
                } else {
                    charCount.classList.remove('text-red-500');
                    charCount.classList.add('text-gray-400');
                }

                if (editorPane && editorPane.classList.contains('hidden')) {
                    renderPreview();
                }
            }

            function getTrimmedSelectionRange() {
                if (!contentTextarea) {
                    return { start: 0, end: 0 };
                }

                const value = contentTextarea.value;
                const originalStart = contentTextarea.selectionStart ?? 0;
                const originalEnd = contentTextarea.selectionEnd ?? 0;

                if (originalStart === originalEnd) {
                    return { start: originalStart, end: originalEnd };
                }

                const selectedText = value.slice(originalStart, originalEnd);
                const leadingMatch = selectedText.match(/^\s*/);
                const trailingMatch = selectedText.match(/\s*$/);
                const leading = leadingMatch ? leadingMatch[0].length : 0;
                const trailing = trailingMatch ? trailingMatch[0].length : 0;

                let start = originalStart + leading;
                let end = originalEnd - trailing;

                if (start >= end) {
                    return { start: originalStart, end: originalStart };
                }

                return { start, end };
            }

            function ensureNewlinesAroundSelection(rangeStart, rangeEnd) {
                if (!contentTextarea) {
                    return { start: rangeStart, end: rangeEnd };
                }

                let value = contentTextarea.value;
                let start = Math.max(0, rangeStart);
                let end = Math.max(start, rangeEnd);

                if (start > 0) {
                    const beforeChar = value[start - 1];
                    if (beforeChar !== '\n') {
                        value = value.slice(0, start) + '\n' + value.slice(start);
                        start += 1;
                        end += 1;
                    }
                }

                if (end < value.length) {
                    const afterChar = value[end];
                    if (afterChar !== '\n') {
                        value = value.slice(0, end) + '\n' + value.slice(end);
                        end += 1;
                    }
                } else if (!value.endsWith('\n')) {
                    value += '\n';
                    end += 1;
                }

                contentTextarea.value = value;
                return { start, end };
            }

            function surroundSelection(prefix, suffix, placeholder = '') {
                if (!contentTextarea) {
                    return;
                }

                const value = contentTextarea.value;
                const { start, end } = getTrimmedSelectionRange();
                const hasSelection = start !== end;
                const before = value.slice(0, start);
                const after = value.slice(end);
                const selectedText = value.slice(start, end);
                const usePlaceholder = !hasSelection && placeholder;

                const prefixStart = Math.max(0, start - prefix.length);
                const beforeSelected = value.slice(prefixStart, start);
                const afterSelected = value.slice(end, end + suffix.length);

                if (hasSelection && beforeSelected === prefix && afterSelected === suffix) {
                    const unwrapped = value.slice(0, prefixStart) + selectedText + value.slice(end + suffix.length);
                    contentTextarea.value = unwrapped;

                    const newStart = prefixStart;
                    const newEnd = newStart + selectedText.length;

                    contentTextarea.focus();
                    contentTextarea.selectionStart = newStart;
                    contentTextarea.selectionEnd = newEnd;
                    updateCharCount();
                    renderPreview();
                    return;
                }

                const wrappedContent = hasSelection ? selectedText : (usePlaceholder ? placeholder : '');
                const insertion = prefix + wrappedContent + suffix;
                contentTextarea.value = before + insertion + after;

                const selectionStart = start + prefix.length;
                const selectionEnd = selectionStart + wrappedContent.length;

                contentTextarea.focus();
                contentTextarea.selectionStart = selectionStart;
                contentTextarea.selectionEnd = selectionEnd;

                updateCharCount();
                renderPreview();
            }

            function applyLinePrefix(prefix) {
                if (!contentTextarea) {
                    return;
                }

                const value = contentTextarea.value;
                const { start, end } = getTrimmedSelectionRange();
                const selectionEmpty = start === end;

                if (selectionEmpty) {
                    const caret = contentTextarea.selectionStart ?? 0;
                    const lineStart = value.lastIndexOf('\n', caret - 1) + 1;
                    let lineEnd = value.indexOf('\n', caret);
                    if (lineEnd === -1) {
                        lineEnd = value.length;
                    }

                    const line = value.slice(lineStart, lineEnd);
                    let updatedLine = line;
                    let addedPrefix = false;
                    if (line.startsWith(prefix)) {
                        updatedLine = line.slice(prefix.length);
                    } else {
                        updatedLine = prefix + line.trimStart();
                        addedPrefix = true;
                    }

                    contentTextarea.value = value.slice(0, lineStart) + updatedLine + value.slice(lineEnd);

                    let rangeStart = lineStart;
                    let rangeEnd = rangeStart + updatedLine.length;
                    if (addedPrefix) {
                        ({ start: rangeStart, end: rangeEnd } = ensureNewlinesAroundSelection(rangeStart, rangeEnd));
                    }

                    const cursor = rangeEnd;
                    contentTextarea.focus();
                    contentTextarea.selectionStart = cursor;
                    contentTextarea.selectionEnd = cursor;
                } else {
                    const selectedText = value.slice(start, end);
                    const lines = selectedText.split(/\n/);
                    let addedPrefix = false;
                    const updatedLines = lines.map((line) => {
                        if (!line.trim().length) {
                            return line;
                        }

                        if (line.startsWith(prefix)) {
                            return line.slice(prefix.length);
                        }

                        addedPrefix = true;
                        return prefix + line.trimStart();
                    });

                    const newSelection = updatedLines.join('\n');
                    contentTextarea.value = value.slice(0, start) + newSelection + value.slice(end);

                    let newStart = start;
                    let newEnd = start + newSelection.length;
                    if (addedPrefix) {
                        ({ start: newStart, end: newEnd } = ensureNewlinesAroundSelection(newStart, newEnd));
                    }

                    contentTextarea.focus();
                    contentTextarea.selectionStart = newStart;
                    contentTextarea.selectionEnd = newEnd;
                }

                updateCharCount();
                renderPreview();
            }

            function applyOrderedList() {
                if (!contentTextarea) {
                    return;
                }

                const value = contentTextarea.value;
                const { start, end } = getTrimmedSelectionRange();
                const selectionEmpty = start === end;
                const orderedRegex = /^\d+\.\s+/;

                if (selectionEmpty) {
                    const caret = contentTextarea.selectionStart ?? 0;
                    const lineStart = value.lastIndexOf('\n', caret - 1) + 1;
                    let lineEnd = value.indexOf('\n', caret);
                    if (lineEnd === -1) {
                        lineEnd = value.length;
                    }

                    const line = value.slice(lineStart, lineEnd);
                    let updatedLine;
                    let addedNumbering = false;
                    if (orderedRegex.test(line)) {
                        updatedLine = line.replace(orderedRegex, '');
                    } else {
                        const cleaned = line.replace(orderedRegex, '').trim();
                        updatedLine = `1. ${cleaned}`;
                        addedNumbering = true;
                    }

                    contentTextarea.value = value.slice(0, lineStart) + updatedLine + value.slice(lineEnd);
                    let rangeStart = lineStart;
                    let rangeEnd = rangeStart + updatedLine.length;
                    if (addedNumbering) {
                        ({ start: rangeStart, end: rangeEnd } = ensureNewlinesAroundSelection(rangeStart, rangeEnd));
                    }

                    const cursor = rangeEnd;
                    contentTextarea.focus();
                    contentTextarea.selectionStart = cursor;
                    contentTextarea.selectionEnd = cursor;
                } else {
                    const selectedText = value.slice(start, end);
                    const lines = selectedText.split(/\n/);
                    let addedNumbering = false;
                    const updatedLines = lines.map((line, index) => {
                        if (!line.trim().length) {
                            return line;
                        }

                        if (orderedRegex.test(line)) {
                            return line.replace(orderedRegex, '').trimStart();
                        }

                        const cleaned = line.replace(orderedRegex, '').trim();
                        addedNumbering = true;
                        return `${index + 1}. ${cleaned}`;
                    });

                    const newSelection = updatedLines.join('\n');
                    contentTextarea.value = value.slice(0, start) + newSelection + value.slice(end);
                let newStart = start;
                let newEnd = start + newSelection.length;
                if (addedNumbering) {
                    ({ start: newStart, end: newEnd } = ensureNewlinesAroundSelection(newStart, newEnd));
                }

                contentTextarea.focus();
                contentTextarea.selectionStart = newStart;
                contentTextarea.selectionEnd = newEnd;
                }

                updateCharCount();
                renderPreview();
            }

            function insertLink() {
                if (!contentTextarea) {
                    return;
                }

                const value = contentTextarea.value;
                const { start, end } = getTrimmedSelectionRange();
                const selectedText = value.slice(start, end);
                const usedPlaceholder = !selectedText.length;
                const linkText = selectedText || 'লিংক টেক্সট';

                const urlInput = prompt('লিংকের ঠিকানা লিখুন (https:// সহ):', 'https://');
                if (urlInput === null) {
                    contentTextarea.focus();
                    return;
                }

                const url = urlInput.trim();
                if (!url.length) {
                    contentTextarea.focus();
                    return;
                }

                const before = value.slice(0, start);
                const after = value.slice(end);
                const markdown = `[${linkText}](${url})`;

                contentTextarea.value = before + markdown + after;

                if (usedPlaceholder) {
                    const textStart = start + 1;
                    const textEnd = textStart + linkText.length;
                    contentTextarea.selectionStart = textStart;
                    contentTextarea.selectionEnd = textEnd;
                } else {
                    const urlStart = start + 1 + linkText.length + 2; // [, text, ], (
                    const urlEnd = urlStart + url.length;
                    contentTextarea.selectionStart = urlStart;
                    contentTextarea.selectionEnd = urlEnd;
                }

                contentTextarea.focus();
                updateCharCount();
                renderPreview();
            }

            function insertHorizontalRule() {
                if (!contentTextarea) {
                    return;
                }

                const value = contentTextarea.value;
                const start = contentTextarea.selectionStart ?? 0;
                const end = contentTextarea.selectionEnd ?? 0;
                const before = value.slice(0, start);
                const after = value.slice(end);
                const insertion = `\n\n---\n\n`;

                const newValue = before + insertion + after;
                contentTextarea.value = newValue;

                const cursor = before.length + insertion.length;
                contentTextarea.focus();
                contentTextarea.selectionStart = cursor;
                contentTextarea.selectionEnd = cursor;

                updateCharCount();
                renderPreview();
            }

            function handleEditorAction(action) {
                if (!contentTextarea) {
                    return;
                }

                const currentStart = contentTextarea.selectionStart ?? 0;
                const currentEnd = contentTextarea.selectionEnd ?? 0;
                contentTextarea.focus({ preventScroll: true });
                contentTextarea.setSelectionRange(currentStart, currentEnd);

                switch (action) {
                    case 'bold':
                        surroundSelection('**', '**', 'গুরুত্বপূর্ণ টেক্সট');
                        break;
                    case 'italic':
                        surroundSelection('_', '_', 'জোর দেওয়া টেক্সট');
                        break;
                    case 'heading':
                        applyLinePrefix('# ');
                        break;
                    case 'subheading':
                        applyLinePrefix('## ');
                        break;
                    case 'quote':
                        applyLinePrefix('> ');
                        break;
                    case 'unordered-list':
                        applyLinePrefix('- ');
                        break;
                    case 'ordered-list':
                        applyOrderedList();
                        break;
                    case 'link':
                        insertLink();
                        break;
                    case 'code':
                        surroundSelection('`', '`', 'কোড');
                        break;
                    case 'codeblock':
                        surroundSelection('```\n', '\n```', 'কোড ব্লক', { block: true });
                        break;
                    case 'hr':
                        insertHorizontalRule();
                        break;
                    default:
                        break;
                }

                setActiveTab('editor');
            }

            function highlightCard(card) {
                if (activeCard && activeCard !== card) {
                    activeCard.classList.remove('ring-2', 'ring-offset-2', 'ring-blue-500', 'bg-white');
                    activeCard.classList.add('bg-gray-50');
                }

                if (card) {
                    card.classList.add('ring-2', 'ring-offset-2', 'ring-blue-500', 'bg-white');
                    card.classList.remove('bg-gray-50');
                }

                if (!card) {
                    activeCard = null;
                    return;
                }

                activeCard = card;
            }

            function showExistingImage(url) {
                if (!imagePreview || !defaultContent || !previewArea) {
                    return;
                }

                if (!url) {
                    clearPreviewHandler();
                    return;
                }

                imagePreview.src = url;
                defaultContent.classList.add('hidden');
                previewArea.classList.remove('hidden');
                existingImageUrl = url;
            }

            function clearPreviewHandler() {
                if (fileInput) {
                    fileInput.value = '';
                }

                existingImageUrl = null;

                if (defaultContent) {
                    defaultContent.classList.remove('hidden');
                }

                if (previewArea) {
                    previewArea.classList.add('hidden');
                }
            }

            function startEditFromCard(card) {
                if (!card || !form) {
                    return;
                }

                const id = card.dataset.newsId;
                const title = card.dataset.title || '';
                const content = card.dataset.content || '';
                const published = card.dataset.published || '';
                const imageUrl = card.dataset.imageUrl || '';

                if (formMethodInput) {
                    formMethodInput.value = 'PUT';
                }

                if (form && updateTemplate) {
                    form.action = updateTemplate.replace('__ID__', id);
                }

                if (newsIdField) {
                    newsIdField.value = id;
                }

                setFormTitle('সংবাদ সম্পাদনা করুন');

                if (submitButtonText) {
                    submitButtonText.textContent = 'সংবাদ আপডেট করুন';
                }

                showEditingBadge();

                if (cancelEditBtn) {
                    cancelEditBtn.classList.remove('hidden');
                    cancelEditBtn.classList.add('inline-flex');
                }

                if (titleInput) {
                    titleInput.value = title;
                }

                if (publishedAtInput) {
                    publishedAtInput.value = published;
                }

                if (contentTextarea) {
                    contentTextarea.value = content.replace(/\r?\n/g, '\n');
                }

                if (fileInput) {
                    fileInput.value = '';
                    fileInput.required = false;
                }

                if (imageUrl) {
                    showExistingImage(imageUrl);
                } else {
                    clearPreviewHandler();
                }

                updateCharCount();
                renderPreview();
                setActiveTab('editor');

                highlightCard(card);

                if (form) {
                    form.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }

            function resetFormToCreate() {
                if (!form) {
                    return;
                }

                if (formMethodInput) {
                    formMethodInput.value = 'POST';
                }

                if (form && storeAction) {
                    form.action = storeAction;
                }

                if (newsIdField) {
                    newsIdField.value = '';
                }

                setFormTitle('নতুন সংবাদ যোগ করুন');

                if (submitButtonText) {
                    submitButtonText.textContent = 'সংবাদ প্রকাশ করুন';
                }

                hideEditingBadge();

                if (cancelEditBtn) {
                    cancelEditBtn.classList.add('hidden');
                    cancelEditBtn.classList.remove('inline-flex');
                }

                if (titleInput) {
                    titleInput.value = '';
                }

                if (publishedAtInput) {
                    publishedAtInput.value = '';
                }

                if (contentTextarea) {
                    contentTextarea.value = '';
                }

                if (fileInput) {
                    fileInput.value = '';
                    fileInput.required = true;
                }

                clearPreviewHandler();
                highlightCard(null);
                updateCharCount();
                renderPreview();
                setActiveTab('editor');
            }

            function handleFileSelect() {
                if (!fileInput) {
                    return;
                }

                const file = fileInput.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        if (!imagePreview) {
                            return;
                        }
                        imagePreview.src = event.target.result;
                        if (defaultContent) {
                            defaultContent.classList.add('hidden');
                        }
                        if (previewArea) {
                            previewArea.classList.remove('hidden');
                        }
                        existingImageUrl = null;
                    };
                    reader.readAsDataURL(file);
                }
            }

            tabButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    setActiveTab(button.dataset.tabTarget);
                });
            });

            if (contentTextarea) {
                contentTextarea.addEventListener('input', updateCharCount);
            }

            if (toolbarButtons.length) {
                toolbarButtons.forEach((button) => {
                    button.addEventListener('mousedown', (event) => {
                        event.preventDefault();
                        if (contentTextarea) {
                            contentTextarea.focus({ preventScroll: true });
                        }
                    });

                    button.addEventListener('click', () => {
                        handleEditorAction(button.dataset.editorAction);
                    });
                });
            }

            if (dropZone) {
                dropZone.addEventListener('click', () => {
                    if (fileInput) {
                        fileInput.click();
                    }
                });

                dropZone.addEventListener('dragover', (event) => {
                    event.preventDefault();
                    dropZone.classList.add('border-blue-500', 'bg-blue-50');
                });

                dropZone.addEventListener('dragleave', (event) => {
                    event.preventDefault();
                    dropZone.classList.remove('border-blue-500', 'bg-blue-50');
                });

                dropZone.addEventListener('drop', (event) => {
                    event.preventDefault();
                    dropZone.classList.remove('border-blue-500', 'bg-blue-50');

                    const files = event.dataTransfer.files;
                    if (files.length > 0 && fileInput) {
                        fileInput.files = files;
                        handleFileSelect();
                    }
                });
            }

            if (fileInput) {
                fileInput.addEventListener('change', handleFileSelect);
            }

            startEditButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const card = button.closest('[data-news-card]');
                    startEditFromCard(card);
                });
            });

            if (cancelEditBtn) {
                cancelEditBtn.addEventListener('click', () => {
                    resetFormToCreate();
                });
            }

            window.clearPreview = clearPreviewHandler;

            if (tabButtons.length) {
                setActiveTab('editor');
            }

            const initialEditingCardId = initialState.method === 'PUT' && initialState.editingId ? initialState.editingId : '';
            if (initialEditingCardId) {
                const matchingCard = Array.from(newsCards).find((card) => card.dataset.newsId === initialEditingCardId);
                if (matchingCard) {
                    startEditFromCard(matchingCard);

                    if (titleInput && initialState.title) {
                        titleInput.value = initialState.title;
                    }

                    if (contentTextarea && initialState.content) {
                        contentTextarea.value = initialState.content;
                    }

                    if (publishedAtInput && initialState.published) {
                        publishedAtInput.value = initialState.published;
                    }

                    updateCharCount();
                    renderPreview();
                } else {
                    resetFormToCreate();
                }
            } else {
                updateCharCount();
                renderPreview();
            }
        });
    </script>

    <style>
        .editor-toolbar-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.25rem;
            padding: 0.4rem 0.55rem;
            border-radius: 0.75rem;
            border: 1px solid #e5e7eb;
            background-color: #ffffff;
            color: #1f2937;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .editor-toolbar-btn:hover {
            background-color: #eff6ff;
            color: #2563eb;
            border-color: #bfdbfe;
        }

        .editor-toolbar-btn:focus-visible {
            outline: 2px solid #2563eb;
            outline-offset: 2px;
        }

        .editor-toolbar-icon {
            width: 1rem;
            height: 1rem;
        }

        .editor-toolbar-label {
            line-height: 1;
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .tab-button {
            border: none;
            border-right: 1px solid #e5e7eb;
            outline: none;
            background-color: #f9fafb;
            color: #4b5563;
            transition: all 0.2s ease;
        }

        .tab-button:last-child {
            border-right: 0;
        }

        .tab-button:hover {
            background-color: #eff6ff;
            color: #2563eb;
        }

        .tab-button.tab-active {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: #ffffff;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.25);
        }
    </style>
@endsection
