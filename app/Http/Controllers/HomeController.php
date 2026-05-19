<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class HomeController extends Controller
{
    public function index()
    {
        $features = DB::table('features')->take(6)->get();
        $news = DB::table('news')->orderBy('created_at', 'desc')->take(7)->get();
        $clients = DB::table('clients')->where('featured', true)->take(9)->get();

        return view('home.index', compact('features', 'news', 'clients'));
    }

    // Handle contact form submission
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        try {
            $recipient = config('mail.from.address', 'teambornomala@gmail.com');
            Mail::to($recipient)->send(new ContactMail($validated));

            return back()->with('success', 'আপনার বার্তা সফলভাবে পাঠানো হয়েছে। দ্রুতই আমরা যোগাযোগ করব।');
        } catch (\Throwable $exception) {
            return back()
                ->withInput()
                ->with('error', 'দুঃখিত! বার্তা পাঠাতে সমস্যা হয়েছে। অনুগ্রহ করে কিছু সময় পর আবার চেষ্টা করুন।');
        }
    }
}
