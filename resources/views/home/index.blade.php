@extends('layout.app')

@section('content')
    <div class="relative flex flex-col lg:flex-row items-center justify-between py-16 lg:py-10">
        <!-- Background image -->
        <div class="absolute inset-0 -z-10 -translate-y-10 overflow-hidden">
            <svg width="100%" height="100%" viewBox="0 0 1440 600" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                <defs>
                    <!-- Main soft gradient background -->
                    <linearGradient id="main-gradient" x1="0" y1="0" x2="1440" y2="600"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#f9fafb" />
                        <stop offset="1" stop-color="#eef2ff" />
                    </linearGradient>

                    <!-- Accent gradients -->
                    <radialGradient id="accent1" cx="20%" cy="20%" r="50%">
                        <stop offset="0%" stop-color="#a5b4fc" stop-opacity="0.25" />
                        <stop offset="100%" stop-color="transparent" />
                    </radialGradient>

                    <radialGradient id="accent2" cx="80%" cy="80%" r="50%">
                        <stop offset="0%" stop-color="#6ee7b7" stop-opacity="0.20" />
                        <stop offset="100%" stop-color="transparent" />
                    </radialGradient>

                    <radialGradient id="accent3" cx="70%" cy="10%" r="40%">
                        <stop offset="0%" stop-color="#f472b6" stop-opacity="0.15" />
                        <stop offset="100%" stop-color="transparent" />
                    </radialGradient>

                    <radialGradient id="accent4" cx="10%" cy="90%" r="35%">
                        <stop offset="0%" stop-color="#facc15" stop-opacity="0.15" />
                        <stop offset="100%" stop-color="transparent" />
                    </radialGradient>

                    <!-- Wave gradient -->
                    <linearGradient id="wave-gradient" x1="0" y1="500" x2="1440" y2="600"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#6366f1" stop-opacity="0.12" />
                        <stop offset="1" stop-color="#06b6d4" stop-opacity="0.08" />
                    </linearGradient>
                </defs>

                <!-- Background -->
                <rect width="1440" height="600" fill="url(#main-gradient)" />

                <!-- Light accents -->
                <circle cx="320" cy="140" r="160" fill="url(#accent1)" />
                <circle cx="1180" cy="460" r="140" fill="url(#accent2)" />
                <circle cx="1000" cy="80" r="80" fill="url(#accent3)" />
                <circle cx="180" cy="520" r="70" fill="url(#accent4)" />

                <!-- Subtle transparent ellipses -->
                <ellipse cx="900" cy="120" rx="120" ry="40" fill="#818cf8" fill-opacity="0.06" />
                <ellipse cx="400" cy="500" rx="100" ry="30" fill="#6ee7b7" fill-opacity="0.06" />
                <ellipse cx="1100" cy="250" rx="90" ry="30" fill="#a5b4fc" fill-opacity="0.07" />
            </svg>
        </div>


        <!-- Hero image with scroll animation -->
        <div class="relative z-10 w-full lg:w-[60%] mb-8 lg:mb-0 lg:-translate-x-14 px-4 lg:px-0 scroll-animate"
            data-animation="slide-in-left">
            <img src="{{ asset('images/hero.png') }}" alt="Pathshala Banner"
                class="w-full max-w-md lg:max-w-none mx-auto lg:mx-0">
        </div>

        <!-- Content -->
        <div class="relative z-10 w-full lg:w-[40%] flex flex-col gap-4 lg:gap-5 px-4 lg:pr-32 text-center lg:text-left scroll-animate"
            data-animation="slide-in-right">
            <!-- Enhanced Hero Heading -->
            <div class="relative">
                <h1 class="text-2xl sm:text-3xl lg:text-4xl leading-tight">
                    <!-- Main Brand with Gradient -->
                    <strong
                        class="text-5xl sm:text-6xl lg:text-7xl font-black bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent mb-2 block animate-gradient">
                        বর্ণমালা
                    </strong>
                    <!-- Subtitle with Enhanced Typography -->
                    <span class="text-gray-800 font-semibold">একটি পূর্ণাঙ্গ</span>
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-teal-600 font-bold">শিক্ষা
                        প্রতিষ্ঠান</span>
                    <span class="text-gray-700">ম্যানেজমেন্ট সিস্টেম</span>
                </h1>

                <!-- Decorative Element -->
                <div
                    class="absolute -top-4 -left-2 w-12 h-12 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full blur-xl opacity-20 animate-pulse">
                </div>
                <div class="absolute -bottom-2 -right-4 w-8 h-8 bg-gradient-to-r from-emerald-400 to-teal-500 rounded-full blur-lg opacity-30 animate-pulse"
                    style="animation-delay: 1s;"></div>
            </div>
            <p class="text-sm sm:text-base lg:text-lg text-slate-500 leading-relaxed">
                বর্ণমালা অটোমেশন ব্যবস্থাপনায় এক নতুন অধ্যায়, যা আপনার প্রতিষ্ঠানকে প্রযুক্তিনির্ভর করবে ও প্রশাসনিক কাজকে
                সহজ ও
                দ্রুততর করবে।
            </p>
            <div class="flex flex-col sm:flex-row gap-3 lg:gap-2 mt-2 lg:mt-3 justify-center lg:justify-start">
                <a href="/contact" class="btn btn-primary w-full sm:w-auto px-6 py-3">যোগাযোগ করুন</a>
                <a href="/about" class="btn btn-secondary w-full sm:w-auto px-6 py-3">বিস্তারিত জানুন</a>
            </div>
        </div>
    </div>

    <div class="w-5/6 mx-auto flex flex-col lg:flex-row items-center justify-center py-8 gap-8">
        <div class="scroll-animate" data-animation="slide-in-left">
            <img src="{{ asset('images/identity.png') }}" alt="Identity Image" class="max-w-70">
        </div>
        <div class="scroll-animate" data-animation="slide-in-right">
            <!-- Enhanced Question Heading -->
            <div class="relative mb-6">
                <h1 class="text-4xl lg:text-5xl font-bold leading-tight">
                    <span class="text-gray-800">কেন</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-600">
                        বর্ণমালা'ই</span>
                    <span class="text-gray-800"> বেছে নিবেন?</span>
                </h1>

                <!-- Decorative Elements -->
                <div class="absolute -top-2 -right-4 w-6 h-6 bg-gradient-to-r from-emerald-400 to-teal-500 rounded-full blur-sm opacity-40 animate-bounce"
                    style="animation-delay: 0.5s;"></div>
            </div>

            <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4 text-slate-600 text-sm">
                <ul class="list-disc list-inside">
                    <li>সরকার নিবন্ধিত প্রতিষ্ঠান</li>
                    <li>সবচেয়ে কম সময়ে সর্বাধিক চুক্তিবদ্ধ প্রতিষ্ঠান</li>
                    <li>প্রতিমাসে দুইবার প্রতিষ্ঠানে প্রতিনিধির সার্ভিস</li>
                </ul>
                <ul class="list-disc list-inside">
                    <li>প্রতিটি অঞ্চলে আঞ্চলিক সার্ভিস প্রতিনিধি</li>
                    <li>সাশ্রয়ী মূল্যে সম্পূর্ণ ডিজিটাল স্কুল</li>
                    <li>কোন প্রভাব নয়, গ্রাহক সন্তুষ্টই আমাদের সবচেয়ে বড় শক্তি</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="w-5/6 mx-auto flex flex-col lg:flex-row items-center justify-center py-10">
        <div class="w-1/2 md:w-1/4 p-4 flex flex-col items-center justify-center gap-5 scroll-animate"
            data-animation="fade-in-up" data-delay="0">
            <img src="{{ asset('icons/school.gif') }}" alt="School Image" class="w-30">
            <div class="text-center">
                <h2 class="text-4xl text-secondary counter" data-target="200" data-suffix="">0</h2>
                <p class="text-primary font-bold">শিক্ষা প্রতিষ্ঠান</p>
            </div>
        </div>

        <div class="w-1/2 md:w-1/4 p-4 flex flex-col items-center justify-center gap-5 scroll-animate"
            data-animation="fade-in-up" data-delay="200">
            <img src="{{ asset('icons/student.gif') }}" alt="Student Image" class="w-30">
            <div class="text-center">
                <h2 class="text-4xl text-secondary counter" data-target="20000" data-suffix="+">0</h2>
                <p class="text-primary font-bold">শিক্ষার্থী</p>
            </div>
        </div>

        <div class="w-1/2 md:w-1/4 p-4 flex flex-col items-center justify-center gap-5 scroll-animate"
            data-animation="fade-in-up" data-delay="400">
            <img src="{{ asset('icons/teacher.gif') }}" alt="Teacher Image" class="w-30 scale-150">
            <div class="text-center">
                <h2 class="text-4xl text-secondary counter" data-target="1500" data-suffix="+">0</h2>
                <p class="text-primary font-bold">শিক্ষক</p>
            </div>
        </div>


        <div class="w-1/2 md:w-1/4 p-4 flex flex-col items-center justify-center gap-5 scroll-animate"
            data-animation="fade-in-up" data-delay="600">
            <img src="{{ asset('icons/zila.gif') }}" alt="Zila Image" class="w-30 scale-150">
            <div class="text-center">
                <h2 class="text-4xl text-secondary counter" data-target="7" data-suffix="">0</h2>
                <p class="text-primary font-bold">জেলা</p>
            </div>
        </div>

        <div class="w-1/2 md:w-1/4 p-4 flex flex-col items-center justify-center gap-5 scroll-animate"
            data-animation="fade-in-up" data-delay="800">
            <img src="{{ asset('icons/upazila.gif') }}" alt="Upazila Image" class="w-30 scale-150">
            <div class="text-center">
                <h2 class="text-4xl text-secondary counter" data-target="15" data-suffix="">0</h2>
                <p class="text-primary font-bold">উপজেলা</p>
            </div>
        </div>

    </div>

    <!------------------------------
    |            Sections           |
    ------------------------------->
    @include('home.clients')

    @include('home.features')

    @include('home.news')

    <!-- Responsive Map Container -->
    <div class="w-full h-48 max-w-4xl mx-auto mt-20 mb-10 px-4 scroll-animate" data-animation="scale-in">
        <div class="relative w-full h-0 pb-[25%] rounded-lg overflow-hidden shadow-lg">
            <iframe class="absolute top-0 left-0 w-full h-48"
                src="https://maps.google.com/maps?q=MS3+Technology+BD&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                scrolling="no" marginheight="0" marginwidth="0" allowfullscreen loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>

    <!-- Enhanced Heading Styles & Scroll Animations -->
    <style>
        /* Gradient Animation */
        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 4s ease infinite;
        }

        @keyframes gradient {
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

        /* Enhanced hover effects for badges */
        .badge-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
        }

        /* Smooth text reveals */
        .text-reveal {
            opacity: 0;
            transform: translateY(20px);
            animation: reveal 0.8s ease-out forwards;
        }

        @keyframes reveal {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Scroll Animation Styles */
        .scroll-animate {
            opacity: 0;
            transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .scroll-animate.animate {
            opacity: 1;
        }

        /* Animation Types */
        .scroll-animate[data-animation="fade-in-up"] {
            transform: translateY(60px);
        }

        .scroll-animate[data-animation="fade-in-up"].animate {
            transform: translateY(0);
        }

        .scroll-animate[data-animation="slide-in-left"] {
            transform: translateX(-60px);
        }

        .scroll-animate[data-animation="slide-in-left"].animate {
            transform: translateX(0);
        }

        .scroll-animate[data-animation="slide-in-right"] {
            transform: translateX(60px);
        }

        .scroll-animate[data-animation="slide-in-right"].animate {
            transform: translateX(0);
        }

        .scroll-animate[data-animation="scale-in"] {
            transform: scale(0.8);
        }

        .scroll-animate[data-animation="scale-in"].animate {
            transform: scale(1);
        }

        /* Counter Animation */
        .counter {
            transition: all 0.3s ease;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intersection Observer for scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const element = entry.target;
                        const delay = element.dataset.delay || 0;

                        setTimeout(() => {
                            element.classList.add('animate');

                            // Trigger counter animation if element has counter class
                            if (element.querySelector('.counter')) {
                                animateCounter(element.querySelector('.counter'));
                            }
                        }, delay);

                        observer.unobserve(element);
                    }
                });
            }, observerOptions);

            // Observe all scroll-animate elements
            document.querySelectorAll('.scroll-animate').forEach(el => {
                observer.observe(el);
            });

            // Counter animation function
            function animateCounter(element) {
                const target = parseInt(element.dataset.target);
                const suffix = element.dataset.suffix || '';
                const duration = 2000; // 2 seconds
                const increment = target / (duration / 16); // 60fps
                let current = 0;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }

                    element.textContent = Math.floor(current).toLocaleString() + suffix;
                }, 16);
            }

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Parallax effect for hero background
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const heroBackground = document.querySelector('.absolute.inset-0.-z-1');
                if (heroBackground) {
                    heroBackground.style.transform = `translateY(${scrolled * 0.5}px)`;
                }
            });
        });
    </script>
@endsection
