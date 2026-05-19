<div id="news" class="w-full mx-auto mb-10 px-4 overflow-hidden">
    <!-- Enhanced News Heading -->
    <div class="text-center my-16 scroll-animate" data-animation="fade-in-up">
        <!-- Main Heading -->
        <h1 class="text-4xl lg:text-5xl text-slate-800 font-bold mb-4 leading-tight">
            সাম্প্রতিক খবর
        </h1>

        <!-- Decorative Elements -->
        <div class="relative">
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-8">
                <div
                    class="w-6 h-6 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full blur-lg opacity-30 animate-bounce">
                </div>
            </div>
            <div class="h-1 w-20 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full mx-auto"></div>
        </div>
    </div>

    <!-- News Slider Container -->
    <div class="relative max-w-6xl mx-auto scroll-animate" data-animation="fade-in-up" data-delay="300">
        <!-- Slider Wrapper -->
        <div class="news-slider-wrapper overflow-hidden">
            <div class="news-slider flex transition-transform duration-500 ease-out" id="newsSlider">
                @foreach ($news as $article)
                    <div class="news-slide flex-shrink-0 w-full md:w-1/3 px-3">
                        <article
                            class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden h-full">
                            <!-- News Image -->
                            <div class="aspect-video overflow-hidden">
                    @if ($article->image_url)
                        <img src="{{ asset('storage/' . $article->image_url) }}" alt="{{ $article->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <div
                            class="w-full h-full bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                </path>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- News Content -->
                <div class="p-6">
                    <a href="/news/{{ $article->slug }}">
                        <!-- Publication Date -->
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d F Y') : \Carbon\Carbon::parse($article->created_at)->format('d F Y') }}
                        </div>

                        <!-- News Title -->
                        <h2
                            class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-200">
                            {{ $article->title }}
                        </h2>

                        <!-- News Excerpt -->
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ Str::limit($article->content, 150) }}
                        </p>

                        <!-- Read More Button -->
                        <p
                            class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors duration-200">
                            বিস্তারিত পড়ুন
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </p>
                    </a>
                </div>
            </article>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Navigation Buttons -->
        <button id="prevBtn"
            class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-12 lg:-translate-x-16 bg-white/95 backdrop-blur-sm hover:bg-white shadow-xl rounded-full p-4 transition-all duration-300 hover:scale-110 z-50 group items-center justify-center border-2 border-gray-100">
            <svg class="w-6 h-6 text-gray-700 group-hover:text-blue-600" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <button id="nextBtn"
            class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-12 lg:translate-x-16 bg-white/95 backdrop-blur-sm hover:bg-white shadow-xl rounded-full p-4 transition-all duration-300 hover:scale-110 z-50 group items-center justify-center border-2 border-gray-100">
            <svg class="w-6 h-6 text-gray-700 group-hover:text-blue-600" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        <!-- Dots Indicator -->
        <div class="flex justify-center space-x-2 mt-6" id="dotsContainer">
            <!-- Dots will be generated by JavaScript -->
        </div>
    </div>

    <div class="w-full mx-auto text-center mt-8 scroll-animate" data-animation="fade-in-up" data-delay="600">
        <a href="/news" class="btn btn-primary inline-block px-8 py-3">সকল খবর</a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.getElementById('newsSlider');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const dotsContainer = document.getElementById('dotsContainer');
        const slides = document.querySelectorAll('.news-slide');
        
        if (!slider || slides.length === 0) return;

        let currentIndex = 0;
        let slidesToShow = window.innerWidth >= 768 ? 3 : 1;
        const totalSlides = slides.length;
        const maxIndex = Math.max(0, totalSlides - slidesToShow);

        // Create dots
        function createDots() {
            dotsContainer.innerHTML = '';
            const dotsCount = Math.ceil(totalSlides / slidesToShow);
            
            for (let i = 0; i < dotsCount; i++) {
                const dot = document.createElement('button');
                dot.className = 'w-2 h-2 rounded-full transition-all duration-300 ' + 
                    (i === 0 ? 'bg-blue-600 w-8' : 'bg-gray-300 hover:bg-gray-400');
                dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
                dot.addEventListener('click', () => goToSlide(i * slidesToShow));
                dotsContainer.appendChild(dot);
            }
        }

        // Update dots
        function updateDots() {
            const dots = dotsContainer.querySelectorAll('button');
            const activeDotIndex = Math.floor(currentIndex / slidesToShow);
            
            dots.forEach((dot, index) => {
                if (index === activeDotIndex) {
                    dot.className = 'w-8 h-2 rounded-full transition-all duration-300 bg-blue-600';
                } else {
                    dot.className = 'w-2 h-2 rounded-full transition-all duration-300 bg-gray-300 hover:bg-gray-400';
                }
            });
        }

        // Update slider position
        function updateSlider() {
            const slideWidth = 100 / slidesToShow;
            const offset = -currentIndex * slideWidth;
            slider.style.transform = `translateX(${offset}%)`;
            updateDots();
            
            // Update button states
            prevBtn.style.opacity = currentIndex === 0 ? '0.5' : '1';
            prevBtn.style.cursor = currentIndex === 0 ? 'not-allowed' : 'pointer';
            nextBtn.style.opacity = currentIndex >= maxIndex ? '0.5' : '1';
            nextBtn.style.cursor = currentIndex >= maxIndex ? 'not-allowed' : 'pointer';
        }

        // Go to specific slide
        function goToSlide(index) {
            currentIndex = Math.max(0, Math.min(index, maxIndex));
            updateSlider();
        }

        // Next slide
        function nextSlide() {
            if (currentIndex < maxIndex) {
                currentIndex++;
                updateSlider();
            }
        }

        // Previous slide
        function prevSlide() {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        }

        // Event listeners
        nextBtn.addEventListener('click', nextSlide);
        prevBtn.addEventListener('click', prevSlide);

        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                const newSlidesToShow = window.innerWidth >= 768 ? 3 : 1;
                if (newSlidesToShow !== slidesToShow) {
                    slidesToShow = newSlidesToShow;
                    currentIndex = 0;
                    createDots();
                    updateSlider();
                }
            }, 250);
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') prevSlide();
            if (e.key === 'ArrowRight') nextSlide();
        });

        // Touch/swipe support
        let touchStartX = 0;
        let touchEndX = 0;

        slider.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        slider.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        }, { passive: true });

        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;
            
            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
            }
        }

        // Auto-play
        let autoplayInterval;
        function startAutoplay() {
            autoplayInterval = setInterval(() => {
                if (currentIndex >= maxIndex) {
                    currentIndex = 0;
                } else {
                    currentIndex++;
                }
                updateSlider();
            }, 3000); // Change slide every 3 seconds
        }

        function stopAutoplay() {
            clearInterval(autoplayInterval);
        }

        // Initialize
        createDots();
        updateSlider();
        startAutoplay(); // Start autoplay
    });
</script>

<style>
    .news-slider-wrapper {
        position: relative;
    }

    .news-slide {
        transition: opacity 0.3s ease;
    }

    /* Smooth sliding animation */
    .news-slider {
        will-change: transform;
    }

    /* Hide scrollbar */
    .news-slider-wrapper::-webkit-scrollbar {
        display: none;
    }

    .news-slider-wrapper {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
