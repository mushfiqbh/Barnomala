@extends('layout.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 relative overflow-hidden">
        <!-- Floating Background Elements -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-blue-200 rounded-full blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 bg-purple-200 rounded-full blur-3xl opacity-40 animate-pulse"
            style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-indigo-200 rounded-full blur-2xl opacity-25 animate-pulse"
            style="animation-delay: 2s;"></div>

        <div class="container mx-auto px-4 py-10 lg:py-16">
            <!-- Enhanced Header Section -->
            <div class="text-center mb-16">
                <!-- Badge -->
                <div
                    class="inline-flex items-center px-6 py-3 bg-white/80 backdrop-blur-sm rounded-full shadow-lg border border-blue-100 mb-8">
                    <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    <span class="text-sm font-medium text-gray-700">আমাদের বৈশিষ্ট্যসমূহ</span>
                </div>

                <!-- Title with Gradient -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                    বর্নমালা <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600">বৈশিষ্ট্য</span>
                    এবং পরিসেবা
                </h1>

                <!-- Description -->
                <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    বর্নমালা তৈরি করা হয়েছে কিছু আকর্ষণীয় ও যুগপযোগি বৈশিষ্ট্যের সমন্বয়ে, যা আপনাকে
                    অটোমেশন সিস্টেমের মতো আপনার ইনস্টিটিউট পরিচালনা করতে সহায়তা করে।
                </p>
            </div>

            <!-- Modern Features Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($features as $index => $feature)
                    <x-feature-card :feature="$feature" :index="$index" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
