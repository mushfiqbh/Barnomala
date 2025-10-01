@extends('layout.app')

@section('title', 'গ্রাহক ম্যানেজমেন্ট')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 p-4">
        <div class="max-w-6xl mx-auto">
            <!-- Compact Header -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">গ্রাহক ম্যানেজমেন্ট</h1>
                        <p class="text-sm text-gray-600">{{ count($clients) }} জন গ্রাহক</p>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <a href="/admin"
                        class="inline-flex items-center px-3 py-2 bg-white/70 backdrop-blur-xl border border-white/20 rounded-xl text-sm font-medium text-gray-700 hover:bg-white/90 transition-all duration-300">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        Back
                    </a>

                    <a href="/clients"
                        class="inline-flex items-center px-3 py-2 bg-white/70 backdrop-blur-xl border border-white/20 rounded-xl text-sm font-medium text-gray-700 hover:bg-white/90 transition-all duration-300">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                        দেখুন
                    </a>
                </div>
            </div>

            <!-- Compact Messages -->
            @if (session('success'))
                <div class="mb-4 bg-green-50/80 backdrop-blur-xl border border-green-200 text-green-800 px-4 py-2 rounded-xl text-sm"
                    role="alert">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 bg-red-50/80 backdrop-blur-xl border border-red-200 text-red-800 px-4 py-2 rounded-xl text-sm"
                    role="alert">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <!-- Compact Add Form -->
            <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-lg p-5 mb-6 border border-white/20">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-6 h-6 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-900">নতুন গ্রাহক যোগ করুন</h2>
                </div>

                <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data"
                    id="clientForm" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf

                    <div class="col-span-1 space-y-4">
                        <!-- client Name -->
                        <div class="space-y-1">
                            <label for="name" class="block text-xs font-medium text-gray-700">
                                গ্রাহকের নাম <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name" required value="{{ old('name') }}"
                                class="w-full px-3 py-2 bg-white/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 text-sm"
                                placeholder="গ্রাহকের নাম">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- client URL -->
                        <div class="space-y-1">
                            <label for="url" class="block text-xs font-medium text-gray-700">
                                ওয়েবসাইট URL
                            </label>
                            <input type="url" name="url" id="url" value="{{ old('url') }}"
                                class="w-full px-3 py-2 bg-white/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 text-sm"
                                placeholder="https://example.com">
                            @error('url')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Featured Client Checkbox -->
                        <div class="space-y-1">
                            <label class="flex items-center space-x-2 cursor-pointer group">
                                <div class="relative">
                                    <input type="checkbox" name="featured" id="featured" value="1"
                                        {{ old('featured') ? 'checked' : '' }} class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-yellow-400 peer-checked:to-orange-500">
                                    </div>
                                </div>
                                <span class="text-xs font-medium text-gray-700 group-hover:text-gray-900">
                                    ফিচার্ড গ্রাহক
                                    <svg class="w-3 h-3 inline text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                </span>
                            </label>
                            <p class="text-xs text-gray-500 ml-13">হোমপেজে প্রদর্শন করা হবে</p>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-end">
                            <button type="submit"
                                class="w-full px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-sm font-medium rounded-xl hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                যোগ করুন
                            </button>
                        </div>
                    </div>

                    <!-- Compact Image Upload -->
                    <div class="space-y-1">
                        <label class="block text-xs font-medium text-gray-700">লোগো</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-blue-400 transition-colors duration-200 cursor-pointer"
                            id="dropZone">
                            <div id="defaultContent">
                                <svg class="mx-auto h-20 w-20 text-gray-400 mb-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="text-xs text-gray-600">ক্লিক করুন বা ড্র্যাগ করুন</p>
                            </div>
                            <div id="previewArea" class="hidden">
                                <img id="imagePreview" class="mx-auto max-h-16 rounded-lg" alt="Preview">
                                <button type="button" onclick="clearPreview()"
                                    class="mt-1 text-red-500 hover:text-red-700 text-xs">সরান</button>
                            </div>
                            <input type="file" name="image" id="fileInput" accept="image/*" class="hidden">
                        </div>
                        @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </form>
            </div>

            <!-- Compact Clients List -->
            <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-lg border border-white/20 overflow-hidden">
                <div class="px-5 py-3 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                    <div class="flex items-center space-x-2">
                        <div class="w-5 h-5 bg-purple-100 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">গ্রাহক তালিকা</h3>
                        <span
                            class="px-2 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">{{ count($clients) }}</span>
                    </div>
                </div>

                @if (count($clients) > 0)
                    <div class="p-4">
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                            @foreach ($clients as $client)
                                <div
                                    class="group relative bg-gray-50/50 rounded-xl p-3 hover:bg-blue-50/50 hover:shadow-md transition-all duration-300 border {{ $client->featured ? 'border-yellow-300 bg-gradient-to-br from-yellow-50/50 to-orange-50/30' : 'border-gray-100' }}">

                                    <!-- Featured Badge -->
                                    @if ($client->featured)
                                        <div class="absolute -top-2 -right-2 z-10">
                                            <div
                                                class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white text-xs px-2 py-1 rounded-full flex items-center space-x-1 shadow-lg">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg>
                                                <span class="font-medium">ফিচার্ড</span>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- client Logo -->
                                    <div class="flex justify-center mb-2">
                                        @if ($client->image_url)
                                            <img src="{{ asset('storage/' . $client->image_url) }}"
                                                alt="{{ $client->name }}" class="h-10 w-10 object-contain rounded-lg">
                                        @else
                                            <div class="h-10 w-10 bg-gray-200 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-2m-2 0H7m5 0v-5a2 2 0 012-2h2a2 2 0 012 2v5m-6 0v-7.5a2 2 0 00-2-2h-2a2 2 0 00-2 2V21">
                                                    </path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- client Info -->
                                    <div class="text-center">
                                        <h4 class="text-sm font-medium text-gray-900 mb-1 truncate"
                                            title="{{ $client->name }}">{{ $client->name }}</h4>

                                        <div class="flex items-center justify-between">
                                            @if ($client->url)
                                                <a href="{{ $client->url }}" target="_blank"
                                                    class="text-blue-500 hover:text-blue-700 p-1 rounded transition-colors duration-200">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                        </path>
                                                    </svg>
                                                </a>
                                            @else
                                                <span></span>
                                            @endif

                                            <!-- Delete Button -->
                                            <form action="{{ route('admin.clients.delete', $client->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('এই গ্রাহকের তথ্য মুছে ফেলার বিষয়ে আপনি কি নিশ্চিত?')"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-400 hover:text-red-600 p-1 rounded transition-colors duration-200">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor"
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
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="p-8 text-center text-gray-500">
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-base font-medium mb-1">কোনো গ্রাহক নেই</h4>
                        <p class="text-sm">উপরের ফর্ম ব্যবহার করে গ্রাহক যোগ করুন।</p>
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
        });
    </script>
@endsection
