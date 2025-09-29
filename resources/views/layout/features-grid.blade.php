<div class="feature-card group" style="animation-delay: {{ $index * 0.1 }}s;">
    <!-- Modern Card Design -->
    <div
        class="relative p-8 transition-all duration-500 transform hover:scale-105 hover:-translate-y-2">

        <!-- Background Pattern -->
        <div
            class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
        </div>

        <!-- Icon Container -->
        <div class="relative z-10 mb-6">
            <div
                class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-100 to-purple-100 rounded-2xl flex items-center justify-center group-hover:from-blue-500 group-hover:to-purple-500 transition-all duration-500 group-hover:scale-110 group-hover:rotate-3">
                <img src="{{ asset('storage/' . $feature->icon) }}" alt="{{ $feature->title }} Icon"
                    class="h-16 w-16 rounded-4xl object-contain transition-all duration-500">
            </div>
        </div>

        <!-- Content -->
        <div class="relative z-10 text-center">
            <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-blue-700 transition-colors duration-300">
                {{ $feature->title }}
            </h3>

            <!-- Feature Number -->
            <div
                class="absolute -top-4 -right-4 w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white text-xs font-bold opacity-0 group-hover:opacity-100 transition-all duration-500 transform group-hover:scale-110">
                {{ $index + 1 }}
            </div>
        </div>

        <!-- Hover Effects -->
        <div
            class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
        </div>

        <!-- Floating Dots -->
        <div
            class="absolute top-4 left-4 w-2 h-2 bg-blue-400 rounded-full opacity-0 group-hover:opacity-60 transition-all duration-700 animate-pulse">
        </div>
        <div class="absolute bottom-4 right-4 w-3 h-3 bg-purple-400 rounded-full opacity-0 group-hover:opacity-60 transition-all duration-700 animate-pulse"
            style="animation-delay: 0.3s;"></div>
    </div>
</div>

<!-- Enhanced CSS Animations -->
<style>
    .feature-card {
        animation: fadeInUp 0.8s ease-out forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .line-clamp-3 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    /* Glass morphism enhancement */
    .feature-card:hover {
        backdrop-filter: blur(20px);
    }

    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
    }

    /* Additional modern animations */
    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        33% {
            transform: translateY(-10px) rotate(1deg);
        }

        66% {
            transform: translateY(5px) rotate(-1deg);
        }
    }

    .feature-card:nth-child(odd) {
        animation-duration: 0.9s;
    }

    .feature-card:nth-child(even) {
        animation-duration: 1.1s;
    }

    /* Glassmorphism effect */
    .glass-effect {
        backdrop-filter: blur(16px) saturate(180%);
        -webkit-backdrop-filter: blur(16px) saturate(180%);
        background-color: rgba(255, 255, 255, 0.75);
        border: 1px solid rgba(255, 255, 255, 0.125);
    }

    /* Gradient text animation */
    @keyframes gradient-shift {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .animated-gradient {
        background: linear-gradient(-45deg, #3b82f6, #8b5cf6, #6366f1, #3b82f6);
        background-size: 400% 400%;
        animation: gradient-shift 3s ease infinite;
    }

    /* Micro-interactions */
    .feature-card .absolute {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .feature-card:hover .absolute {
        transform: scale(1.05);
    }

    /* Mobile optimizations */
    @media (max-width: 640px) {
        .feature-card {
            transform: none;
        }

        .feature-card:hover {
            transform: scale(1.02);
        }
    }
</style>
