<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

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
        $news = DB::table('news')->take(6)->get();
        $customers = DB::table('customers')->take(3)->get();

        return view('home.index', compact('features', 'news', 'customers'));
    }
}
