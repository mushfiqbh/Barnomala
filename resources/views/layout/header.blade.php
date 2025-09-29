<header class="bg-white shadow-sm fixed w-full z-30">
    <div class="container py-4 flex justify-between items-center mx-auto">
        <a href="{{ url('/') }}" class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Pathshala Logo" class="h-10 md:h-12">
        </a>
        
        <!-- Mobile menu button -->
        <button class="md:hidden flex flex-col space-y-1 p-2" onclick="toggleMobileMenu()">
            <span class="w-6 h-0.5 bg-gray-700 transition-all"></span>
            <span class="w-6 h-0.5 bg-gray-700 transition-all"></span>
            <span class="w-6 h-0.5 bg-gray-700 transition-all"></span>
        </button>
        
        <!-- Desktop navigation -->
        <nav class="hidden md:flex space-x-6 lg:space-x-10">
            <a class="text-nav font-bold hover:text-blue-600 transition-colors" href="{{ url('/') }}">হোম</a>
            <a class="text-nav font-bold hover:text-blue-600 transition-colors" href="{{ url('/features') }}">বৈশিষ্ট্যসমূহ</a>
            <a class="text-nav font-bold hover:text-blue-600 transition-colors" href="{{ url('/gallery') }}">গ্যালারী</a>
            <a class="text-nav font-bold hover:text-blue-600 transition-colors" href="{{ url('/customers') }}">গ্রাহকগণ</a>
            <a class="text-nav font-bold hover:text-blue-600 transition-colors" href="{{ url('/news') }}">সংবাদ</a>
            <a class="text-nav font-bold hover:text-blue-600 transition-colors" href="{{ url('/contact') }}">যোগাযোগ</a>
        </nav>
    </div>
    
    <!-- Mobile navigation menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-white border-t shadow-lg">
        <nav class="container mx-auto py-4 flex flex-col space-y-4">
            <a class="text-nav font-bold hover:text-blue-600 transition-colors py-2" href="{{ url('/') }}">হোম</a>
            <a class="text-nav font-bold hover:text-blue-600 transition-colors py-2" href="{{ url('/features') }}">বৈশিষ্ট্যসমূহ</a>
            <a class="text-nav font-bold hover:text-blue-600 transition-colors py-2" href="{{ url('/gallery') }}">গ্যালারী</a>
            <a class="text-nav font-bold hover:text-blue-600 transition-colors py-2" href="{{ url('/customers') }}">গ্রাহকগণ</a>
            <a class="text-nav font-bold hover:text-blue-600 transition-colors py-2" href="{{ url('/news') }}">সংবাদ</a>
            <a class="text-nav font-bold hover:text-blue-600 transition-colors py-2" href="{{ url('/contact') }}">যোগাযোগ</a>
        </nav>
    </div>
    
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>
</header>
