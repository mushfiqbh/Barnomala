@extends('layout.app')

@section('content')
    <div class="container mx-auto py-12 px-4 mt-10">
        <!-- Page Header -->
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-primary mb-4">যোগাযোগ করুন</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                আমাদের সাথে যোগাযোগ করুন এবং আপনার প্রতিষ্ঠানের জন্য সেরা সমাধান খুঁজে নিন।
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div class="space-y-8">
                <h2 class="text-2xl font-semibold text-primary mb-6">যোগাযোগের তথ্য</h2>

                <div class="space-y-6">
                    <!-- Address -->
                    <div
                        class="flex items-start space-x-4 p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">যোগাযোগ:</h3>
                            <p class="text-gray-600">আল-মারজান শপিং সিটি(৩য় তলা), জিন্দাবাজার, সিলেট।
                            </p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div
                        class="flex items-start space-x-4 p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">ইমেইল এড্রেস:</h3>
                            <p class="text-gray-600">
                                <a href="mailto:teambornomala@gmail.com"
                                    class="text-blue-600 hover:text-blue-800 transition-colors">
                                    teambornomala@gmail.com
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div
                        class="flex items-start space-x-4 p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">মোবাইল নাম্বার:</h3>
                            <p class="text-gray-600">
                                <a href="tel:+8801744221385" class="text-blue-600 hover:text-blue-800 transition-colors">
                                    +88 01744-221385
                                </a>,
                                <a href="tel:+8801842485222" class="text-blue-600 hover:text-blue-800 transition-colors">
                                    +88 01633-516400
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold text-primary mb-6">আমাদের সাথে যোগাযোগ করুন</h2>

                <form class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">নাম *</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">ইমেইল এড্রেস
                                *</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">ফোন নাম্বার *</label>
                            <input type="text" id="phone" name="phone" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        </div>
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">ঠিকানা</label>
                        <input type="text" id="address" name="address"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">বার্তা *</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors resize-vertical"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 text-white cursor-pointer py-2 px-6 rounded-lg font-semibold hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        বার্তা পাঠান
                    </button>
                </form>
            </div>
        </div>

        <!-- Map Section -->
        <div class="mt-16" id="map">
            <h2 class="text-2xl font-semibold text-primary mb-6 text-center">আমাদের অবস্থান</h2>
            <h3 class="text-lg font-semibold text-gray-700 text-center mb-6">এমএসথ্রি টেকনোলজি বিডি,
                আল-মারজান শপিং সিটি(৩য় তলা)
                জিন্দাবাজার, সিলেট।
            </h3>

            <!-- Responsive Map Container -->
            <div class="w-full max-w-4xl mx-auto">
                <div class="relative w-full h-0 pb-[68.29%] rounded-lg overflow-hidden shadow-lg">
                    <iframe class="absolute top-0 left-0 w-full h-full"
                        src="https://maps.google.com/maps?q=MS3+Technology+BD&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allowfullscreen loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
