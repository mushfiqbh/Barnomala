<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PublicPageController extends Controller
{
    public function features()
    {
        $features = DB::table('features')->get();
        return view('pages.features', compact('features'));
    }

    public function gallery()
    {
        $galleries = DB::table('galleries')->get();
        return view('pages.gallery', compact('galleries'));
    }

    public function news()
    {
        $news = DB::table('news')->get();
        return view('news.index', compact('news'));
    }

    public function showNews($slug)
    {
        $newsItem = DB::table('news')->where('slug', $slug)->first();
        return view('news.show', compact('newsItem'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function clients()
    {
        // Exclude null urls, null image urls, school_id=1
        $clients = DB::table('clients')
            ->where('school_id', '!=', 1)
            ->where(function ($query) {
                $query->whereNotNull('url')
                    ->orWhereNotNull('image_url');
            })
            ->orderBy('featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(25);

        return view('pages.clients', compact('clients'));
    }
}
