@extends('layout.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50">
        <div class="container mx-auto py-8 px-4">

            <!-- Header -->
            <div class="text-center mb-12 relative">
                <!-- Logout Button -->
                <div class="absolute top-0 right-0">
                    <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            লগআউট
                        </button>
                    </form>
                </div>

                <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4">
                    অ্যাডমিন <span class="text-blue-600">প্যানেল</span>
                </h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    ওয়েবসাইটের সকল কন্টেন্ট পরিচালনা করুন এবং আপডেট করুন
                </p>

                <!-- Welcome Message -->
                <div class="mt-4">
                    <p class="text-sm text-gray-500">
                        স্বাগতম, <span class="font-medium text-gray-700">{{ Auth::user()->name ?? 'অ্যাডমিন' }}</span>
                    </p>
                </div>
            </div>

            <!-- Stats Cards -->
            @if (isset($stats))
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                    <!-- Gallery Stats -->
                    <div
                        class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">গ্যালারী</p>
                                <p class="text-3xl font-bold text-purple-600">{{ $stats['galleries'] ?? 0 }}</p>
                            </div>
                            <div class="bg-purple-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Customers Stats -->
                    <div
                        class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">গ্রাহক</p>
                                <p class="text-3xl font-bold text-blue-600">{{ $stats['customers'] ?? 0 }}</p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- News Stats -->
                    <div
                        class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">সংবাদ</p>
                                <p class="text-3xl font-bold text-green-600">{{ $stats['news'] ?? 0 }}</p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Features Stats -->
                    <div
                        class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">ফিচার</p>
                                <p class="text-3xl font-bold text-orange-600">{{ $stats['features'] ?? 0 }}</p>
                            </div>
                            <div class="bg-orange-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Compact Management Cards -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                <!-- Gallery Management -->
                <a href="{{ route('admin.galleries') }}" class="group relative bg-white/70 backdrop-blur-xl rounded-2xl p-5 border border-white/20 hover:shadow-lg hover:shadow-purple-200/25 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-1">
                    <!-- Background Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-pink-500/5 rounded-2xl transition-opacity duration-300"></div>
                    
                    <div class="relative z-10 text-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-100 to-pink-100 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:from-purple-500 group-hover:to-pink-500 transition-all duration-300 group-hover:scale-110">
                            <svg class="w-6 h-6 text-purple-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-900 mb-1 group-hover:text-purple-700 transition-colors duration-300">গ্যালারী</h3>
                        <p class="text-xs text-gray-600 mb-3 group-hover:text-gray-700 transition-colors duration-300">ছবি পরিচালনা</p>
                        <p class="inline-flex items-center text-xs font-medium text-purple-600 hover:text-purple-700 transition-colors duration-300">
                            পরিচালনা
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </p>
                    </div>
                </a>

                <!-- Customer Management -->
                <a href="{{ route('admin.customers') }}" class="group relative bg-white/70 backdrop-blur-xl rounded-2xl p-5 border border-white/20 hover:shadow-lg hover:shadow-blue-200/25 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-1">
                    <!-- Background Gradient -->
                    <div href="{{ route('admin.customers') }}" class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-cyan-500/5 rounded-2xl transition-opacity duration-300"></div>
                    
                    <div class="relative z-10 text-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-cyan-100 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:from-blue-500 group-hover:to-cyan-500 transition-all duration-300 group-hover:scale-110">
                            <svg class="w-6 h-6 text-blue-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-900 mb-1 group-hover:text-blue-700 transition-colors duration-300">গ্রাহক</h3>
                        <p class="text-xs text-gray-600 mb-3 group-hover:text-gray-700 transition-colors duration-300">গ্রাহক তালিকা</p>
                        <p class="inline-flex items-center text-xs font-medium text-blue-600 hover:text-blue-700 transition-colors duration-300">
                            পরিচালনা
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </p>
                    </div>
                </a>

                <!-- News Management -->
                <a href="{{ route('admin.news') }}" class="group relative bg-white/70 backdrop-blur-xl rounded-2xl p-5 border border-white/20 hover:shadow-lg hover:shadow-green-200/25 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-1">
                    <!-- Background Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-teal-500/5 rounded-2xl transition-opacity duration-300"></div>
                    
                    <div class="relative z-10 text-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-teal-100 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:from-green-500 group-hover:to-teal-500 transition-all duration-300 group-hover:scale-110">
                            <svg class="w-6 h-6 text-green-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-900 mb-1 group-hover:text-green-700 transition-colors duration-300">সংবাদ</h3>
                        <p class="text-xs text-gray-600 mb-3 group-hover:text-gray-700 transition-colors duration-300">সংবাদ প্রকাশ</p>
                        <p class="inline-flex items-center text-xs font-medium text-green-600 hover:text-green-700 transition-colors duration-300">
                            পরিচালনা
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </p>
                    </div>
                </a>

                <!-- Feature Management -->
                <a href="{{ route('admin.features') }}" class="group relative bg-white/70 backdrop-blur-xl rounded-2xl p-5 border border-white/20 hover:shadow-lg hover:shadow-orange-200/25 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-1">
                    <!-- Background Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-red-500/5 rounded-2xl transition-opacity duration-300"></div>
                    
                    <div class="relative z-10 text-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-100 to-red-100 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:from-orange-500 group-hover:to-red-500 transition-all duration-300 group-hover:scale-110">
                            <svg class="w-6 h-6 text-orange-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-900 mb-1 group-hover:text-orange-700 transition-colors duration-300">ফিচার</h3>
                        <p class="text-xs text-gray-600 mb-3 group-hover:text-gray-700 transition-colors duration-300">ফিচার সেটিং</p>
                        <p class="inline-flex items-center text-xs font-medium text-orange-600 hover:text-orange-700 transition-colors duration-300">
                            পরিচালনা
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
