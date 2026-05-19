@extends('layout.admin')

@section('title', 'গ্রাহক ম্যানেজমেন্ট')

@section('content')

    <div class="flex items-center justify-center p-6">
        <div
            class="max-w-xl w-full bg-white/80 backdrop-blur-xl rounded-2xl shadow-lg p-8 text-center">
            <svg class="mx-auto mb-4 w-12 h-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">গ্রাহক ম্যানেজমেন্ট এখন Barnomala Cloud-এ</h2>
            <p class="text-gray-700 text-base mb-4">
                গ্রাহক (Clients) বা স্কুলের তথ্য ব্যবস্থাপনা এখন <span class="font-semibold text-blue-600">Barnomala
                    Cloud</span>-এ স্থানান্তরিত হয়েছে।<br>
             ক্লায়েন্ট বা স্কুলের তথ্য আপডেট করতে নিচের লিঙ্কে যান:
            </p>
            <a href="https://cloud.barnomala.com/schools" target="_blank"
                class="inline-block px-5 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                cloud.barnomala.com/schools
            </a>
        </div>
    </div>
@endsection
