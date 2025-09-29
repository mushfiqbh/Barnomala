@extends('layout.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-cyan-50 relative overflow-hidden">
        <!-- Floating Background Elements -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-blue-200 rounded-full blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 bg-cyan-200 rounded-full blur-3xl opacity-40 animate-pulse"
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
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    <span class="text-sm font-medium text-gray-700">আমাদের সহযোগী প্রতিষ্ঠান</span>
                </div>

                <!-- Title with Gradient -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                    বর্নমালা <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-cyan-600 to-indigo-600">গ্রাহকগণ</span>
                </h1>

                <!-- Description -->
                <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    যারা আমাদের সেবা নিয়ে সন্তুষ্ট এবং আমাদের সাথে দীর্ঘমেয়াদী অংশীদারিত্বে আছেন, তাদের সাফল্যই আমাদের
                    অনুপ্রেরণা।
                </p>
            </div>

            <!-- Modern Customers Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-8">
                @foreach ($customers as $index => $customer)
                    <div class="group relative animate-fadeInUp" style="animation-delay: {{ $index * 0.1 }}s;">
                        <!-- Card -->
                        <div
                            class="bg-white rounded-2xl shadow-lg p-6 sm:p-8 flex flex-col items-center text-center h-full transform transition-all duration-500 hover:scale-105 hover:shadow-2xl group-hover:shadow-blue-200/50 border border-gray-100 hover:border-blue-200">

                            <!-- Logo Container with Animated Border -->
                            <div class="relative mb-6">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full p-1 transform rotate-0 group-hover:rotate-180 transition-transform duration-700 animate-pulse-glow">
                                    <div class="bg-white rounded-full p-4">
                                        <div class="w-20 h-20 sm:w-24 sm:h-24 flex items-center justify-center">
                                            <img src="{{ asset('storage/' . $customer->image_url) }}"
                                                alt="{{ $customer->name }}"
                                                class="max-w-full max-h-full object-contain filter group-hover:brightness-110 transition-all duration-300 animate-float transform group-hover:scale-110">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="flex-1 flex flex-col">
                                <h2
                                    class="text-xl sm:text-2xl font-bold text-primary mb-3 group-hover:text-blue-600 transition-colors duration-300 leading-tight min-h-[3rem] flex items-center justify-center text-center opacity-100 z-10 relative">
                                    {{ $customer->name }}
                                </h2>

                                <a href="{{ $customer->url }}" target="_blank"
                                    class="text-sm text-blue-500 hover:underline opacity-100 z-10 relative">
                                    Visit Website
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Custom Animations for Moving Images -->
    <style>
        /* Enhanced floating animation for images */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            25% {
                transform: translateY(-8px) rotate(1deg);
            }

            50% {
                transform: translateY(-12px) rotate(0deg);
            }

            75% {
                transform: translateY(-4px) rotate(-1deg);
            }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        /* Pulse glow animation for borders */
        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 15px rgba(59, 130, 246, 0.3),
                    0 0 30px rgba(6, 182, 212, 0.2);
                transform: scale(1);
            }

            50% {
                box-shadow: 0 0 25px rgba(59, 130, 246, 0.5),
                    0 0 50px rgba(6, 182, 212, 0.3);
                transform: scale(1.02);
            }
        }

        .animate-pulse-glow {
            animation: pulse-glow 3s ease-in-out infinite;
        }

        /* Gentle rotation animation */
        @keyframes gentle-rotate {
            0% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(2deg);
            }

            50% {
                transform: rotate(0deg);
            }

            75% {
                transform: rotate(-2deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        .animate-gentle-rotate {
            animation: gentle-rotate 6s ease-in-out infinite;
        }

        /* Ensure text remains visible with high z-index */
        .text-always-visible {
            position: relative;
            z-index: 20;
            opacity: 1 !important;
            pointer-events: auto;
        }

        /* Smooth hover scale for images */
        .group:hover .animate-float {
            animation-duration: 2s;
        }

        /* Stagger animation delays for each card */
        .group:nth-child(odd) .animate-float {
            animation-delay: 0.5s;
        }

        .group:nth-child(even) .animate-pulse-glow {
            animation-delay: 1s;
        }
    </style>
@endsection
