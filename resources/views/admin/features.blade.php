@extends('layout.app')

@section('title', 'Feature Management')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 p-4">
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex items-center space-x-3 mb-2">
                    <div
                        class="w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 011-1h1a2 2 0 100-4H7a1 1 0 01-1-1V7a1 1 0 011-1h3a1 1 0 001-1V4z">
                            </path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                        Feature Management</h1>
                </div>
                <p class="text-sm text-gray-600 ml-11">Manage your application features efficiently</p>
            </div>

            <!-- Add Feature Form -->
            <div class="bg-white/70 backdrop-blur-xl rounded-2xl p-6 shadow-lg border border-white/20 mb-8">
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-5 h-5 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-3 h-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800">Add New Feature</h2>
                </div>

                <form action="{{ route('admin.features.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="title" class="text-sm font-medium text-gray-700 flex items-center space-x-1">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                    </path>
                                </svg>
                                <span>Title</span>
                            </label>
                            <input type="text" name="title" id="title" required
                                class="w-full px-4 py-2.5 bg-white/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 text-sm placeholder-gray-400"
                                placeholder="Enter feature title">

                            <a href="https://www.flaticon.com/animated-icons" target="_blank"
                                class="mt-5 text-blue-500 hover:underline">Animated Icon Website
                                <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 3h7m0 0v7m0-7L10 14"></path>
                                </svg>
                                <p class="text-xs text-gray-500">Find icons, download as GIF and upload here</p>
                            </a>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 flex items-center space-x-1">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>Icon Upload</span>
                                <span class="text-xs text-gray-500">(PNG, JPG, GIF)</span>
                            </label>

                            <!-- File Upload Area -->
                            <div class="relative">
                                <input type="file" name="icon" id="icon-upload" accept=".png,.jpg,.jpeg,.gif" required
                                    class="hidden" onchange="handleFilePreview(this)">
                                <label for="icon-upload"
                                    class="w-full h-32 bg-white/50 border-2 border-dashed border-gray-300 rounded-xl flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 hover:bg-blue-50/50 transition-all duration-300 group">
                                    <div id="upload-content" class="text-center">
                                        <svg class="w-8 h-8 text-gray-400 group-hover:text-blue-500 mx-auto mb-2 transition-colors duration-300"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p
                                            class="text-sm text-gray-600 group-hover:text-blue-600 transition-colors duration-300">
                                            <span class="font-medium">Click to upload</span> or drag and drop
                                        </p>
                                        <p class="text-xs text-gray-400">PNG, JPG, GIF up to 3MB</p>
                                    </div>
                                    <div id="preview-content" class="hidden text-center">
                                        <img id="preview-image" class="w-16 h-16 object-contain mx-auto mb-2 rounded-lg">
                                        <p id="preview-name" class="text-sm text-gray-600 font-medium"></p>
                                        <p class="text-xs text-green-600">✓ Ready to upload</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-6 py-2.5 bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-sm font-medium rounded-xl hover:from-blue-600 hover:to-indigo-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <span class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span>Add Feature</span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Features List -->
            <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-lg border border-white/20 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                    <div class="flex items-center space-x-2">
                        <div class="w-5 h-5 bg-blue-100 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-gray-800">Existing Features</h2>
                        <span
                            class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">{{ count($features) }}</span>
                    </div>
                </div>

                @if ($features->count() > 0)
                    <div class="divide-y divide-gray-100">
                        @foreach ($features as $index => $feature)
                            <div class="p-4 hover:bg-blue-50/50 transition-colors duration-200 group">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4 flex-1">
                                        <!-- Feature Number -->
                                        <div
                                            class="w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center text-white text-sm font-bold shadow-md">
                                            {{ $index + 1 }}
                                        </div>

                                        <!-- Feature Info -->
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-3">
                                                <h3
                                                    class="font-semibold text-gray-900 group-hover:text-blue-700 transition-colors duration-200">
                                                    {{ $feature->title }}
                                                </h3>
                                            </div>
                                            <div class="flex items-center space-x-3 mt-2">
                                                <p class="text-sm text-gray-500">
                                                    Created:
                                                    @if ($feature->created_at)
                                                        {{ $feature->created_at }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="flex items-center space-x-2">
                                        <form action="{{ route('admin.features.delete', $feature->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this feature?')"
                                                class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-100 rounded-lg transition-all duration-200">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
                @else
                    <div class="p-12 text-center">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No features yet</h3>
                        <p class="text-gray-500 text-sm">Add your first feature using the form above.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        /* Enhanced form animations */
        input:focus {
            transform: translateY(-1px);
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.1), 0 10px 10px -5px rgba(59, 130, 246, 0.04);
        }

        /* Smooth hover transitions */
        .group:hover .opacity-0 {
            opacity: 1;
        }

        /* Staggered animations for feature items */
        .divide-y>div {
            animation: slideInFromLeft 0.3s ease-out forwards;
            opacity: 0;
            transform: translateX(-20px);
        }

        .divide-y>div:nth-child(1) {
            animation-delay: 0.1s;
        }

        .divide-y>div:nth-child(2) {
            animation-delay: 0.2s;
        }

        .divide-y>div:nth-child(3) {
            animation-delay: 0.3s;
        }

        .divide-y>div:nth-child(4) {
            animation-delay: 0.4s;
        }

        .divide-y>div:nth-child(5) {
            animation-delay: 0.5s;
        }

        @keyframes slideInFromLeft {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive enhancements */
        @media (max-width: 768px) {
            .grid-cols-1.md\\:grid-cols-2 {
                grid-template-columns: 1fr;
            }

            .px-6 {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        /* File upload styling */
        .upload-area {
            transition: all 0.3s ease;
        }

        .upload-area.dragover {
            border-color: #3b82f6;
            background-color: rgba(59, 130, 246, 0.1);
        }

        /* Preview image styling */
        #preview-image {
            border: 2px solid #e5e7eb;
            background: white;
        }
    </style>

    <script>
        function handleFilePreview(input) {
            const file = input.files[0];
            const uploadContent = document.getElementById('upload-content');
            const previewContent = document.getElementById('preview-content');
            const previewImage = document.getElementById('preview-image');
            const previewName = document.getElementById('preview-name');

            if (file) {
                // Validate file type
                const allowedTypes = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Please select a valid image file (PNG, JPG, or GIF)');
                    input.value = '';
                    return;
                }

                // Validate file size (3MB limit)
                if (file.size > 3 * 1024 * 1024) {
                    alert('File size must be less than 3MB');
                    input.value = '';
                    return;
                }

                // Show preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewName.textContent = file.name;
                    uploadContent.classList.add('hidden');
                    previewContent.classList.remove('hidden');
                };
                reader.readAsDataURL(file);

            }
        }

        // Drag and drop functionality
        document.addEventListener('DOMContentLoaded', function() {
            const uploadArea = document.querySelector('label[for="icon-upload"]');
            const fileInput = document.getElementById('icon-upload');

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
                uploadArea.classList.add('dragover');
            }

            function unhighlight(e) {
                uploadArea.classList.remove('dragover');
            }

            uploadArea.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;

                if (files.length > 0) {
                    fileInput.files = files;
                    handleFilePreview(fileInput);
                }
            }

            // Reset upload area when form is reset
            document.querySelector('form').addEventListener('reset', function() {
                document.getElementById('upload-content').classList.remove('hidden');
                document.getElementById('preview-content').classList.add('hidden');
            });
        });
    </script>
@endsection
