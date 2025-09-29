<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard
     */
    public function index()
    {
        $stats = [
            'galleries' => DB::table('galleries')->count(),
            'customers' => DB::table('customers')->count(),
            'news' => DB::table('news')->count(),
            'features' => DB::table('features')->count(),
        ];

        return view('admin.index', compact('stats'));
    }

    // ==================== GALLERY MANAGEMENT ====================
    public function galleries()
    {
        $galleries = DB::table('galleries')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.galleries', compact('galleries'));
    }

    public function storeGallery(Request $request)
    {
        $request->validate([
            'file' => ['required', 'image', 'max:10240'], // 10MB max
            'caption' => ['required', 'string', 'max:500'],
        ], [
            'file.required' => 'অনুগ্রহ করে একটি ছবি নির্বাচন করুন।',
            'file.image' => 'শুধুমাত্র ছবি ফাইল আপলোড করা যায়।',
            'file.max' => 'ছবির আকার সর্বোচ্চ 10MB হতে পারে।',
            'caption.required' => 'ছবির ক্যাপশন অবশ্যই প্রয়োজন।',
            'caption.max' => 'ক্যাপশন সর্বোচ্চ 500 অক্ষর হতে পারে।',
        ]);

        try {
            // Store the image
            $path = $request->file('file')->store('galleries', 'public');
            $imageUrl = 'galleries/' . basename($path);

            // Insert into galleries table
            DB::table('galleries')->insert([
                'image_url' => $imageUrl,
                'caption' => $request->caption,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return back()->with('success', 'ছবি সফলভাবে আপলোড হয়েছে!');
        } catch (\Exception $e) {
            return back()->with('error', 'ছবি আপলোড করতে সমস্যা হয়েছে। আবার চেষ্টা করুন।');
        }
    }

    public function deleteGallery($id)
    {
        try {
            $gallery = DB::table('galleries')->where('id', $id)->first();
            
            if (!$gallery) {
                return back()->with('error', 'ছবি খুঁজে পাওয়া যায়নি।');
            }

            // Delete file from storage
            if (Storage::disk('public')->exists($gallery->image_url)) {
                Storage::disk('public')->delete($gallery->image_url);
            }

            // Delete from database
            DB::table('galleries')->where('id', $id)->delete();

            return back()->with('success', 'ছবি সফলভাবে মুছে ফেলা হয়েছে।');
        } catch (\Exception $e) {
            return back()->with('error', 'ছবি মুছতে সমস্যা হয়েছে।');
        }
    }

    // ==================== CUSTOMER MANAGEMENT ====================

    public function customers()
    {
        $customers = DB::table('customers')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.customers', compact('customers'));
    }

    public function storeCustomer(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'max:5120'], // 5MB max
            'url' => ['nullable', 'url', 'max:255'],
        ], [
            'name.required' => 'গ্রাহকের নাম অবশ্যই প্রয়োজন।',
            'name.max' => 'নাম সর্বোচ্চ 255 অক্ষর হতে পারে।',
            'image.required' => 'অনুগ্রহ করে একটি লোগো আপলোড করুন।',
            'image.image' => 'শুধুমাত্র ছবি ফাইল আপলোড করা যায়।',
            'image.max' => 'ছবির আকার সর্বোচ্চ 5MB হতে পারে।',
            'url.url' => 'সঠিক ওয়েবসাইট URL দিন।',
        ]);

        try {
            // Store the image
            $path = $request->file('image')->store('customers', 'public');
            $imageUrl = 'customers/' . basename($path);

            // Insert into customers table
            DB::table('customers')->insert([
                'name' => $request->name,
                'image_url' => $imageUrl,
                'url' => $request->url,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return back()->with('success', 'গ্রাহক সফলভাবে যোগ করা হয়েছে!');
        } catch (\Exception $e) {
            return back()->with('error', 'গ্রাহক যোগ করতে সমস্যা হয়েছে।');
        }
    }

    public function updateCustomer(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:5120'],
            'url' => ['nullable', 'url', 'max:255'],
        ]);

        try {
            $customer = DB::table('customers')->where('id', $id)->first();
            
            if (!$customer) {
                return back()->with('error', 'গ্রাহক খুঁজে পাওয়া যায়নি।');
            }

            $updateData = [
                'name' => $request->name,
                'url' => $request->url,
                'updated_at' => now(),
            ];

            // Handle image update
            if ($request->hasFile('image')) {
                // Delete old image
                if (Storage::disk('public')->exists($customer->image_url)) {
                    Storage::disk('public')->delete($customer->image_url);
                }

                // Store new image
                $path = $request->file('image')->store('customers', 'public');
                $updateData['image_url'] = 'customers/' . basename($path);
            }

            DB::table('customers')->where('id', $id)->update($updateData);

            return back()->with('success', 'গ্রাহকের তথ্য আপডেট হয়েছে!');
        } catch (\Exception $e) {
            return back()->with('error', 'আপডেট করতে সমস্যা হয়েছে।');
        }
    }

    public function deleteCustomer($id)
    {
        try {
            $customer = DB::table('customers')->where('id', $id)->first();
            
            if (!$customer) {
                return back()->with('error', 'গ্রাহক খুঁজে পাওয়া যায়নি।');
            }

            // Delete image from storage
            if (Storage::disk('public')->exists($customer->image_url)) {
                Storage::disk('public')->delete($customer->image_url);
            }

            // Delete from database
            DB::table('customers')->where('id', $id)->delete();

            return back()->with('success', 'গ্রাহক সফলভাবে মুছে ফেলা হয়েছে।');
        } catch (\Exception $e) {
            return back()->with('error', 'গ্রাহক মুছতে সমস্যা হয়েছে।');
        }
    }

    // ==================== NEWS MANAGEMENT ====================

    public function news()
    {
        $news = DB::table('news')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.news', compact('news'));
    }

    public function storeNews(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['required', 'image', 'max:5120'], // 5MB max
            'published_at' => ['nullable', 'date'],
        ], [
            'title.required' => 'সংবাদের শিরোনাম অবশ্যই প্রয়োজন।',
            'title.max' => 'শিরোনাম সর্বোচ্চ 255 অক্ষর হতে পারে।',
            'content.required' => 'সংবাদের বিষয়বস্তু অবশ্যই প্রয়োজন।',
            'image.required' => 'অনুগ্রহ করে একটি ছবি আপলোড করুন।',
            'image.image' => 'শুধুমাত্র ছবি ফাইল আপলোড করা যায়।',
            'image.max' => 'ছবির আকার সর্বোচ্চ 5MB হতে পারে।',
        ]);

        try {
            // Store the image
            $path = $request->file('image')->store('news', 'public');
            $imageUrl = 'news/' . basename($path);

            // Generate slug from title
            $slug = Str::slug($request->title);
            
            // Ensure unique slug
            $originalSlug = $slug;
            $counter = 1;
            while (DB::table('news')->where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            // Insert into news table
            DB::table('news')->insert([
                'title' => $request->title,
                'content' => $request->content,
                'image_url' => $imageUrl,
                'slug' => $slug,
                'published_at' => $request->published_at ?? now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return back()->with('success', 'সংবাদ সফলভাবে প্রকাশ করা হয়েছে!');
        } catch (\Exception $e) {
            return back()->with('error', 'সংবাদ প্রকাশ করতে সমস্যা হয়েছে।');
        }
    }

    public function updateNews(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
            'published_at' => ['nullable', 'date'],
        ]);

        try {
            $news = DB::table('news')->where('id', $id)->first();
            
            if (!$news) {
                return back()->with('error', 'সংবাদ খুঁজে পাওয়া যায়নি।');
            }

            // Generate new slug if title changed
            $slug = $news->slug;
            if ($request->title !== $news->title) {
                $slug = Str::slug($request->title);
                $originalSlug = $slug;
                $counter = 1;
                while (DB::table('news')->where('slug', $slug)->where('id', '!=', $id)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
            }

            $updateData = [
                'title' => $request->title,
                'content' => $request->content,
                'slug' => $slug,
                'published_at' => $request->published_at ?? $news->published_at,
                'updated_at' => now(),
            ];

            // Handle image update
            if ($request->hasFile('image')) {
                // Delete old image
                if (Storage::disk('public')->exists($news->image_url)) {
                    Storage::disk('public')->delete($news->image_url);
                }

                // Store new image
                $path = $request->file('image')->store('news', 'public');
                $updateData['image_url'] = 'news/' . basename($path);
            }

            DB::table('news')->where('id', $id)->update($updateData);

            return back()->with('success', 'সংবাদ আপডেট হয়েছে!');
        } catch (\Exception $e) {
            return back()->with('error', 'আপডেট করতে সমস্যা হয়েছে।');
        }
    }

    public function deleteNews($id)
    {
        try {
            $news = DB::table('news')->where('id', $id)->first();
            
            if (!$news) {
                return back()->with('error', 'সংবাদ খুঁজে পাওয়া যায়নি।');
            }

            // Delete image from storage
            if (Storage::disk('public')->exists($news->image_url)) {
                Storage::disk('public')->delete($news->image_url);
            }

            // Delete from database
            DB::table('news')->where('id', $id)->delete();

            return back()->with('success', 'সংবাদ সফলভাবে মুছে ফেলা হয়েছে।');
        } catch (\Exception $e) {
            return back()->with('error', 'সংবাদ মুছতে সমস্যা হয়েছে।');
        }
    }

    // ==================== FEATURE MANAGEMENT ====================
    public function features()
    {
        $features = DB::table('features')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.features', compact('features'));
    }

    public function storeFeature(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['nullable', 'string', 'max:1000'],
            'icon' => ['required', 'image', 'max:3072'],
        ], [
            'title.required' => 'বৈশিষ্ট্যের শিরোনাম অবশ্যই প্রয়োজন।',
            'title.max' => 'শিরোনাম সর্বোচ্চ 255 অক্ষর হতে পারে।',
            'url.max' => 'URL সর্বোচ্চ 1000 অক্ষর হতে পারে।',
            'icon.required' => 'অনুগ্রহ করে একটি আইকন আপলোড করুন।',
            'icon.max' => 'আইকন সর্বোচ্চ 3MB হতে পারে।',
        ]);

        try {
            // Store the icon
            $path = $request->file('icon')->store('features', 'public');
            $iconUrl = 'features/' . basename($path);

            // Insert into features table
            DB::table('features')->insert([
                'title' => $request->title,
                'url' => $request->url,
                'icon' => $iconUrl,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return back()->with('success', 'বৈশিষ্ট্য সফলভাবে যোগ করা হয়েছে!');
        } catch (\Exception $e) {
            return back()->with('error', 'বৈশিষ্ট্য যোগ করতে সমস্যা হয়েছে।');
        }
    }

    public function updateFeature(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['nullable', 'string', 'max:1000'],
            'icon' => ['required', 'image', 'max:3072'],
        ]);

        try {
            $feature = DB::table('features')->where('id', $id)->first();
            
            if (!$feature) {
                return back()->with('error', 'বৈশিষ্ট্য খুঁজে পাওয়া যায়নি।');
            }

            DB::table('features')->where('id', $id)->update([
                'title' => $request->title,
                'url' => $request->url,
                'icon' => $request->icon,
                'updated_at' => now(),
            ]);

            if ($request->hasFile('icon')) {
                // Delete old icon
                if (Storage::disk('public')->exists($feature->icon)) {
                    Storage::disk('public')->delete($feature->icon);
                }

                // Store new icon
                $path = $request->file('icon')->store('features', 'public');
                DB::table('features')->where('id', $id)->update([
                    'icon' => 'features/' . basename($path),
                ]);
            }

            return back()->with('success', 'বৈশিষ্ট্য আপডেট হয়েছে!');
        } catch (\Exception $e) {
            return back()->with('error', 'আপডেট করতে সমস্যা হয়েছে।');
        }
    }

    public function deleteFeature($id)
    {
        try {
            $feature = DB::table('features')->where('id', $id)->first();
            
            if (!$feature) {
                return back()->with('error', 'বৈশিষ্ট্য খুঁজে পাওয়া যায়নি।');
            }

            // Delete from database
            DB::table('features')->where('id', $id)->delete();

            return back()->with('success', 'বৈশিষ্ট্য সফলভাবে মুছে ফেলা হয়েছে।');
        } catch (\Exception $e) {
            return back()->with('error', 'বৈশিষ্ট্য মুছতে সমস্যা হয়েছে।');
        }
    }
    
    
    // ==================== UTILITY METHODS ====================

    public function getStats()
    {
        return [
            'galleries' => DB::table('galleries')->count(),
            'customers' => DB::table('customers')->count(),
            'news' => DB::table('news')->count(),
            'features' => DB::table('features')->count(),
            'recent_galleries' => DB::table('galleries')->orderBy('created_at', 'desc')->limit(5)->get(),
            'recent_news' => DB::table('news')->orderBy('created_at', 'desc')->limit(5)->get(),
        ];
    }

    public function bulkDeleteGalleries(Request $request)
    {
        $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['integer', 'exists:galleries,id'],
        ]);

        try {
            $galleries = DB::table('galleries')->whereIn('id', $request->ids)->get();
            
            // Delete files from storage
            foreach ($galleries as $gallery) {
                if (Storage::disk('public')->exists($gallery->image_url)) {
                    Storage::disk('public')->delete($gallery->image_url);
                }
            }

            // Delete from database
            DB::table('galleries')->whereIn('id', $request->ids)->delete();

            return back()->with('success', count($request->ids) . ' টি ছবি মুছে ফেলা হয়েছে।');
        } catch (\Exception $e) {
            return back()->with('error', 'ছবি মুছতে সমস্যা হয়েছে।');
        }
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $type = $request->get('type', 'all');

        $results = [];

        if ($type === 'all' || $type === 'galleries') {
            $results['galleries'] = DB::table('galleries')
                ->where('caption', 'like', "%{$query}%")
                ->limit(10)
                ->get();
        }

        if ($type === 'all' || $type === 'customers') {
            $results['customers'] = DB::table('customers')
                ->where('name', 'like', "%{$query}%")
                ->limit(10)
                ->get();
        }

        if ($type === 'all' || $type === 'news') {
            $results['news'] = DB::table('news')
                ->where('title', 'like', "%{$query}%")
                ->orWhere('content', 'like', "%{$query}%")
                ->limit(10)
                ->get();
        }

        return response()->json($results);
    }
}