<div class="group relative animate-fadeInUp" style="animation-delay: {{ $index * 0.1 }}s;">
    <a href="{{ $client->url }}" target="_blank">
        <!-- Card -->
        <div
            class="bg-white rounded-2xl shadow-lg flex flex-col items-center text-center h-full transform transition-all duration-500 hover:scale-105 hover:shadow-2xl group-hover:shadow-blue-200/50 border border-gray-100 hover:border-blue-200">

            <!-- Logo Container with Animated Border -->

            <div class="bg-white rounded-full p-4">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex items-center justify-center">
                    <img src="{{ asset('storage/' . $client->image_url) }}" alt="{{ $client->name }}"
                        class="max-w-full max-h-full object-contain filter group-hover:brightness-110 transition-all duration-300 animate-float transform group-hover:scale-110">
                </div>
            </div>


            <!-- Content -->
            <div class="flex-1 flex flex-col">
                <h2
                    class="px-2 text-sm font-bold text-primary mb-3 group-hover:text-blue-600 transition-colors duration-300 leading-tight min-h-[3rem] flex items-center justify-center text-center opacity-100 z-10 relative">
                    {{ $client->name }}
                </h2>
            </div>
        </div>
    </a>
</div>
