@extends('layout.admin')

@section('title', 'Feature Management')

@section('content')
    <div class="min-h-screen p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Add Feature Form -->
            <div class="bg-white/70 backdrop-blur-xl rounded-2xl p-5 shadow-lg border border-white/20 mb-8">
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
                                <h2 id="formTitle" class="text-2xl font-bold text-gray-900">নতুন ফিচার যোগ করুন</h2>
                                <span id="editingBadge"
                                    class="hidden px-2 py-1 text-xs font-semibold text-orange-600 bg-orange-100 rounded-full">
                                    সম্পাদনা মোড
                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="flex-shrink-0">
                        <a href="{{ route('features') }}" target="_blank"
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

                <form action="{{ old('feature_id') ? route('admin.features.update', ['id' => old('feature_id')]) : route('admin.features.store') }}"
                    method="POST" enctype="multipart/form-data" id="featureForm" class="space-y-6"
                    data-store-action="{{ route('admin.features.store') }}"
                    data-update-template="{{ route('admin.features.update', ['id' => '__ID__']) }}">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="{{ old('feature_id') ? 'PUT' : 'POST' }}">
                    <input type="hidden" name="feature_id" id="featureId" value="{{ old('feature_id') }}">
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
                            <input type="text" name="title" id="title" required value="{{ old('title') }}"
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
                                <input type="file" name="icon" id="icon-upload" accept=".png,.jpg,.jpeg,.gif"
                                    @unless(old('feature_id')) required @endunless class="hidden"
                                    onchange="handleFilePreview(this)">
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
                            @error('icon')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end items-center space-x-2">
                        <button type="button" id="cancelEditBtn"
                            class="hidden px-5 py-2.5 bg-gray-100 text-gray-700 text-sm font-medium rounded-xl hover:bg-gray-200 transition-all duration-200">
                            বাতিল করুন
                        </button>
                        <button type="submit" id="formSubmitButton"
                            class="px-6 py-2.5 bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-sm font-medium rounded-xl hover:from-blue-600 hover:to-indigo-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <span class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span id="submitButtonText">ফিচার যোগ করুন</span>
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
                    <div class="divide-y divide-gray-100 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($features as $index => $feature)
                            <div class="p-4 hover:bg-blue-50/50 transition-colors duration-200 group rounded-xl"
                                data-feature-row="{{ $feature->id }}">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4 flex-1">
                                        <!-- Feature Icon -->
                                        <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center overflow-hidden">
                                            @if ($feature->icon)
                                                <img src="{{ asset('storage/' . $feature->icon) }}"
                                                    alt="{{ $feature->title }}"
                                                    class="w-12 h-12 object-contain">
                                            @else
                                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                                    </path>
                                                </svg>
                                            @endif
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
                                        <button type="button"
                                            class="edit-feature-btn p-2 text-sm text-blue-500 hover:text-blue-700 hover:bg-blue-100 rounded-lg transition-all duration-200"
                                            title="ফিচার সম্পাদনা করুন"
                                            data-id="{{ $feature->id }}"
                                            data-title="{{ e($feature->title) }}"
                                            data-icon-url="{{ $feature->icon ? asset('storage/' . $feature->icon) : '' }}"
                                            data-icon-name="{{ $feature->icon ? basename($feature->icon) : '' }}">
                                            সম্পাদনা
                                        </button>
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
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('featureForm');
            if (!form) {
                return;
            }

            const formTitle = document.getElementById('formTitle');
            const editingBadge = document.getElementById('editingBadge');
            const submitButtonText = document.getElementById('submitButtonText');
            const cancelEditBtn = document.getElementById('cancelEditBtn');
            const formMethodInput = document.getElementById('formMethod');
            const featureIdInput = document.getElementById('featureId');
            const titleInput = document.getElementById('title');
            const fileInput = document.getElementById('icon-upload');
            const storeAction = form.dataset.storeAction || form.getAttribute('action');
            const updateTemplate = form.dataset.updateTemplate || '';

            const uploadArea = document.querySelector('label[for="icon-upload"]');
            const uploadContent = document.getElementById('upload-content');
            const previewContent = document.getElementById('preview-content');
            const previewImage = document.getElementById('preview-image');
            const previewName = document.getElementById('preview-name');

            let activeRow = null;

            const addMode = {
                title: 'নতুন ফিচার যোগ করুন',
                button: 'ফিচার যোগ করুন'
            };

            const editMode = {
                title: 'ফিচার আপডেট করুন',
                button: 'ফিচার আপডেট করুন'
            };

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

            function setFileRequired(isRequired) {
                fileInput.required = Boolean(isRequired);
            }

            function clearPreview(resetFileInput = true) {
                if (resetFileInput) {
                    fileInput.value = '';
                }

                previewImage.src = '';
                previewName.textContent = '';
                previewContent.classList.add('hidden');
                uploadContent.classList.remove('hidden');
            }

            function showPreviewFromSource(src, name = '') {
                if (!src) {
                    clearPreview(false);
                    return;
                }

                previewImage.src = src;
                previewName.textContent = name || 'বর্তমান আইকন';
                uploadContent.classList.add('hidden');
                previewContent.classList.remove('hidden');
            }

            function removeActiveRowHighlight() {
                if (activeRow) {
                    activeRow.classList.remove('ring-2', 'ring-blue-400', 'ring-offset-2');
                    activeRow = null;
                }
            }

            function highlightRow(id) {
                removeActiveRowHighlight();
                const row = document.querySelector(`[data-feature-row="${id}"]`);
                if (row) {
                    row.classList.add('ring-2', 'ring-blue-400', 'ring-offset-2');
                    activeRow = row;
                }
            }

            function setAddMode({ resetTitle = true } = {}) {
                form.action = storeAction;
                formMethodInput.value = 'POST';
                featureIdInput.value = '';

                if (resetTitle) {
                    titleInput.value = '';
                }

                submitButtonText.textContent = addMode.button;
                setFormTitle(addMode.title);
                hideEditingBadge();
                cancelEditBtn.classList.add('hidden');

                setFileRequired(true);
                clearPreview();
                removeActiveRowHighlight();
            }

            function startEdit(button, options = {}) {
                if (!updateTemplate) {
                    return;
                }

                const id = button.dataset.id;
                const title = button.dataset.title || '';
                const iconUrl = button.dataset.iconUrl || '';
                const iconName = button.dataset.iconName || '';

                form.action = updateTemplate.replace('__ID__', id);
                formMethodInput.value = 'PUT';
                featureIdInput.value = id;

                if (options.preserveTitleValue) {
                    titleInput.value = options.preserveTitleValue;
                } else {
                    titleInput.value = title;
                }

                submitButtonText.textContent = editMode.button;
                setFormTitle(editMode.title);
                showEditingBadge();
                cancelEditBtn.classList.remove('hidden');

                setFileRequired(false);
                fileInput.value = '';

                if (iconUrl) {
                    showPreviewFromSource(iconUrl, iconName);
                } else {
                    clearPreview(false);
                }

                highlightRow(id);

                window.scrollTo({
                    top: form.offsetTop - 120,
                    behavior: 'smooth'
                });

                setTimeout(() => {
                    titleInput.focus();
                }, 300);
            }

            function validateFile(file) {
                const allowedTypes = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Please select a valid image file (PNG, JPG, or GIF)');
                    return false;
                }

                if (file.size > 3 * 1024 * 1024) {
                    alert('File size must be less than 3MB');
                    return false;
                }

                return true;
            }

            function previewFile(file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    showPreviewFromSource(event.target.result, file.name);
                };
                reader.readAsDataURL(file);
            }

            window.handleFilePreview = function(input) {
                if (!input || !input.files || !input.files.length) {
                    clearPreview(false);
                    return;
                }

                const file = input.files[0];
                if (!validateFile(file)) {
                    input.value = '';
                    clearPreview();
                    return;
                }

                previewFile(file);
            };

            if (fileInput) {
                fileInput.addEventListener('change', function() {
                    window.handleFilePreview(fileInput);
                });
            }

            if (uploadArea) {
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    uploadArea.addEventListener(eventName, function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                    }, false);
                });

                ['dragenter', 'dragover'].forEach(eventName => {
                    uploadArea.addEventListener(eventName, () => uploadArea.classList.add('dragover'), false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    uploadArea.addEventListener(eventName, () => uploadArea.classList.remove('dragover'), false);
                });

                uploadArea.addEventListener('drop', function(e) {
                    const dt = e.dataTransfer;
                    const files = dt.files;

                    if (files.length > 0) {
                        fileInput.files = files;
                        window.handleFilePreview(fileInput);
                    }
                }, false);
            }

            const editButtons = document.querySelectorAll('.edit-feature-btn');
            editButtons.forEach(button => {
                button.addEventListener('click', () => startEdit(button));
            });

            cancelEditBtn.addEventListener('click', () => setAddMode());

            const previousTitleValue = titleInput.value;
            if (featureIdInput.value) {
                const relatedButton = document.querySelector(`.edit-feature-btn[data-id="${featureIdInput.value}"]`);
                if (relatedButton) {
                    startEdit(relatedButton, {
                        preserveTitleValue: previousTitleValue
                    });
                } else {
                    submitButtonText.textContent = editMode.button;
                    setFormTitle(editMode.title);
                    showEditingBadge();
                    cancelEditBtn.classList.remove('hidden');
                    setFileRequired(false);
                }
            } else {
                setFileRequired(true);
                clearPreview(false);
            }
        });
    </script>
@endsection
