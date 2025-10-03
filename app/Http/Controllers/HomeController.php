<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class HomeController extends Controller
{
    /**
     * Display the home page with features and news.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $features = DB::table('features')->take(6)->get();
        $news = DB::table('news')->orderBy('created_at', 'desc')->take(7)->get();
        $clients = DB::table('clients')->where('featured', true)->take(6)->get();

        return view('home.index', compact('features', 'news', 'clients'));
    }

    public function send(Request $request)
    {
        $details = $request->only(['name', 'email', 'phone', 'address', 'message']);

        Mail::to('mushfiqbh@gmail.com')->send(new ContactMail($details));

        return back()->with('success', 'Message sent successfully!');
    }
}
