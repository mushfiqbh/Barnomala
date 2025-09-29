@extends('layout.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 relative overflow-hidden">
        <!-- Floating Background Elements -->
        <div class="absolute top-10 right-10 w-40 h-40 bg-blue-200 rounded-full blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-32 left-10 w-32 h-32 bg-purple-200 rounded-full blur-3xl opacity-40 animate-pulse" style="animation-delay: 1.5s;"></div>
        <div class="absolute top-1/3 left-1/2 w-24 h-24 bg-indigo-200 rounded-full blur-2xl opacity-25 animate-pulse" style="animation-delay: 3s;"></div>

        <!-- Hero Section -->
        <section class="relative py-20 lg:pt-16">
            <div class="container mx-auto px-4">
                <div class="text-center">
                    <!-- Badge -->
                    <div class="inline-flex items-center px-6 py-3 bg-white/80 backdrop-blur-sm rounded-full shadow-lg border border-blue-100 mb-8">
                        <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="text-sm font-medium text-gray-700">আমাদের সম্পর্কে</span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl sm:text-5xl lg:text-7xl font-bold text-gray-900 mb-8 leading-tight">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600">বর্ণমালা</span> 
                        <br class="sm:hidden">
                        শিক্ষা ব্যবস্থাপনা
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-xl sm:text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed mb-12">
                        আধুনিক প্রযুক্তির সাহায্যে শিক্ষা প্রতিষ্ঠানের সম্পূর্ণ ব্যবস্থাপনার জন্য একটি সমন্বিত সমাধান
                    </p>

                    <!-- Key Stats -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
                        <div class="stat-card bg-white/60 backdrop-blur-xl rounded-2xl p-6 border border-white/20 shadow-lg">
                            <div class="text-3xl font-bold text-blue-600 mb-2">১০০+</div>
                            <div class="text-sm text-gray-600">শিক্ষা প্রতিষ্ঠান</div>
                        </div>
                        <div class="stat-card bg-white/60 backdrop-blur-xl rounded-2xl p-6 border border-white/20 shadow-lg">
                            <div class="text-3xl font-bold text-purple-600 mb-2">৫০০০+</div>
                            <div class="text-sm text-gray-600">শিক্ষার্থী</div>
                        </div>
                        <div class="stat-card bg-white/60 backdrop-blur-xl rounded-2xl p-6 border border-white/20 shadow-lg">
                            <div class="text-3xl font-bold text-indigo-600 mb-2">২৪/৭</div>
                            <div class="text-sm text-gray-600">সাপোর্ট</div>
                        </div>
                        <div class="stat-card bg-white/60 backdrop-blur-xl rounded-2xl p-6 border border-white/20 shadow-lg">
                            <div class="text-3xl font-bold text-green-600 mb-2">৯৯%</div>
                            <div class="text-sm text-gray-600">আপটাইম</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mission & Vision Section -->
        <section class="py-20">
            <div class="container mx-auto px-4">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <!-- Mission -->
                    <div class="mission-card">
                        <div class="bg-white/70 backdrop-blur-xl rounded-3xl p-8 lg:p-12 border border-white/20 shadow-2xl">
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-2xl flex items-center justify-center mr-4">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-3xl font-bold text-gray-900">আমাদের লক্ষ্য</h2>
                            </div>
                            <p class="text-lg text-gray-700 leading-relaxed mb-6">
                                শিক্ষা প্রতিষ্ঠানগুলোর দৈনন্দিন কার্যক্রম সহজ ও কার্যকর করে তোলা। আমরা চাই প্রতিটি শিক্ষা প্রতিষ্ঠান তাদের প্রশাসনিক কাজে আধুনিক প্রযুক্তির সুবিধা নিতে পারুক।
                            </p>
                            <ul class="space-y-3">
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">ডিজিটাল শিক্ষা ব্যবস্থাপনা</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">সময় ও খরচ সাশ্রয়</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">শিক্ষার মান উন্নয়ন</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Vision -->
                    <div class="vision-card">
                        <div class="bg-white/70 backdrop-blur-xl rounded-3xl p-8 lg:p-12 border border-white/20 shadow-2xl">
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl flex items-center justify-center mr-4">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-3xl font-bold text-gray-900">আমাদের দৃষ্টিভঙ্গি</h2>
                            </div>
                            <p class="text-lg text-gray-700 leading-relaxed mb-6">
                                বাংলাদেশের প্রতিটি শিক্ষা প্রতিষ্ঠানে আধুনিক ব্যবস্থাপনা সিস্টেম পৌঁছে দেওয়া এবং শিক্ষাক্ষেত্রে একটি ডিজিটাল বিপ্লব আনয়ন করা।
                            </p>
                            <ul class="space-y-3">
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    <span class="text-gray-700">প্রযুক্তিগত উৎকর্ষতা</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    <span class="text-gray-700">ব্যাপক সেবা বিস্তার</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    <span class="text-gray-700">টেকসই উন্নয়ন</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Overview -->
        <section class="py-20 bg-gradient-to-r from-blue-50 to-purple-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                        কেন <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">বর্ণমালা</span>?
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        আমাদের সিস্টেম শিক্ষা প্রতিষ্ঠানের সকল প্রয়োজন মাথায় রেখে তৈরি
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="feature-highlight group">
                        <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 border border-white/20 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center mb-6 group-hover:from-blue-500 group-hover:to-blue-600 transition-all duration-300">
                                <svg class="w-8 h-8 text-blue-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-4">সহজ ব্যবহার</h3>
                            <p class="text-gray-600 leading-relaxed">
                                যে কেউ সহজেই ব্যবহার করতে পারবেন। কোনো প্রযুক্তিগত জ্ঞানের প্রয়োজন নেই।
                            </p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="feature-highlight group">
                        <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 border border-white/20 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-100 to-purple-200 rounded-xl flex items-center justify-center mb-6 group-hover:from-purple-500 group-hover:to-purple-600 transition-all duration-300">
                                <svg class="w-8 h-8 text-purple-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-4">নিরাপত্তা</h3>
                            <p class="text-gray-600 leading-relaxed">
                                আপনার সকল তথ্য সম্পূর্ণ নিরাপদ। আধুনিক এনক্রিপশন ও সিকিউরিটি ব্যবস্থা।
                            </p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="feature-highlight group">
                        <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 border border-white/20 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-100 to-green-200 rounded-xl flex items-center justify-center mb-6 group-hover:from-green-500 group-hover:to-green-600 transition-all duration-300">
                                <svg class="w-8 h-8 text-green-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-4">দ্রুত সেবা</h3>
                            <p class="text-gray-600 leading-relaxed">
                                মিনিটেই সব কাজ শেষ। রিপোর্ট, নোটিশ, ফলাফল সবকিছু এক ক্লিকে।
                            </p>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="feature-highlight group">
                        <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 border border-white/20 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                            <div class="w-16 h-16 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-xl flex items-center justify-center mb-6 group-hover:from-indigo-500 group-hover:to-indigo-600 transition-all duration-300">
                                <svg class="w-8 h-8 text-indigo-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-4">২৪/৭ সাপোর্ট</h3>
                            <p class="text-gray-600 leading-relaxed">
                                যেকোনো সমস্যায় আমাদের টিম সবসময় আপনার পাশে। দিন-রাত সেবা।
                            </p>
                        </div>
                    </div>

                    <!-- Feature 5 -->
                    <div class="feature-highlight group">
                        <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 border border-white/20 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                            <div class="w-16 h-16 bg-gradient-to-br from-red-100 to-red-200 rounded-xl flex items-center justify-center mb-6 group-hover:from-red-500 group-hover:to-red-600 transition-all duration-300">
                                <svg class="w-8 h-8 text-red-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-4">সাশ্রয়ী মূল্য</h3>
                            <p class="text-gray-600 leading-relaxed">
                                খুবই কম খরচে পাবেন পূর্ণাঙ্গ সেবা। আলাদা কোনো হার্ডওয়্যার কিনতে হবে না।
                            </p>
                        </div>
                    </div>

                    <!-- Feature 6 -->
                    <div class="feature-highlight group">
                        <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-8 border border-white/20 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                            <div class="w-16 h-16 bg-gradient-to-br from-yellow-100 to-yellow-200 rounded-xl flex items-center justify-center mb-6 group-hover:from-yellow-500 group-hover:to-yellow-600 transition-all duration-300">
                                <svg class="w-8 h-8 text-yellow-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-4">নিয়মিত আপডেট</h3>
                            <p class="text-gray-600 leading-relaxed">
                                নতুন ফিচার ও উন্নতি নিয়মিত আসে। আপনার মতামতের ভিত্তিতে উন্নয়ন।
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="py-20">
            <div class="container mx-auto px-4">
                <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 rounded-3xl p-12 lg:p-16 text-center text-white shadow-2xl">
                    <h2 class="text-3xl lg:text-5xl font-bold mb-6">
                        আজই শুরু করুন
                    </h2>
                    <p class="text-xl lg:text-2xl text-blue-100 mb-8 max-w-3xl mx-auto">
                        আপনার শিক্ষা প্রতিষ্ঠানের ডিজিটাল যাত্রা শুরু করুন বর্ণমালার সাথে
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/contact" class="inline-flex items-center px-8 py-4 bg-white text-gray-900 font-semibold rounded-full hover:bg-gray-100 transform hover:scale-105 transition-all duration-300 shadow-lg">
                            যোগাযোগ করুন
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        <a href="/features" class="inline-flex items-center px-8 py-4 bg-transparent text-white font-semibold rounded-full border-2 border-white hover:bg-white hover:text-gray-900 transform hover:scale-105 transition-all duration-300">
                            বৈশিষ্ট্য দেখুন
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Enhanced CSS Animations -->
    <style>
        .stat-card {
            animation: slideInUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }

        .mission-card {
            animation: slideInLeft 1s ease-out forwards;
            opacity: 0;
            transform: translateX(-50px);
        }

        .vision-card {
            animation: slideInRight 1s ease-out forwards;
            animation-delay: 0.3s;
            opacity: 0;
            transform: translateX(50px);
        }

        .feature-highlight {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        .feature-highlight:nth-child(1) { animation-delay: 0.1s; }
        .feature-highlight:nth-child(2) { animation-delay: 0.2s; }
        .feature-highlight:nth-child(3) { animation-delay: 0.3s; }
        .feature-highlight:nth-child(4) { animation-delay: 0.4s; }
        .feature-highlight:nth-child(5) { animation-delay: 0.5s; }
        .feature-highlight:nth-child(6) { animation-delay: 0.6s; }

        @keyframes slideInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Floating background elements animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-15px) rotate(2deg); }
            66% { transform: translateY(10px) rotate(-1deg); }
        }

        /* Glass morphism enhancement */
        .backdrop-blur-xl {
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
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

        /* Mobile optimizations */
        @media (max-width: 640px) {
            .stat-card, .feature-highlight {
                transform: none;
            }
            
            .stat-card:hover, .feature-highlight:hover {
                transform: scale(1.02);
            }
        }
    </style>
@endsection
