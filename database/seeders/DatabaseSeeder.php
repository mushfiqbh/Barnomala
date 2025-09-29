<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->seedNews();
        $this->seedFeatures();
        $this->seedGalleries();
        $this->seedCustomers();
    }

    private function seedNews()
    {
        DB::table('news')->insert([
            [
                'title' => 'Digital Transformation at Jagannathpur College',
                'slug' => Str::slug('Digital Transformation at Jagannathpur College'),
                'content' => 'Jagannathpur Govt. Degree College has adopted Pathshala EIMS for full automation.',
                'image_url' => 'news/jagannathpur.png',
                'published_at' => Carbon::now()->subDays(3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Partnership with Tajpur Degree College',
                'slug' => Str::slug('Partnership with Tajpur Degree College'),
                'content' => 'Pathshala EIMS signs agreement with Tajpur Degree College, Sylhet.',
                'image_url' => 'news/tajpur.png',
                'published_at' => Carbon::now()->subDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    private function seedFeatures()
    {
        DB::table('features')->insert([
            [
                'title' => 'Online Admission',
                'url' => 'online-admission',
                'icon' => 'fa-user-plus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Exam Management',
                'url' => 'exam-management',
                'icon' => 'fa-file-alt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Result Processing',
                'url' => 'result-processing',
                'icon' => 'fa-chart-line',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    private function seedGalleries()
    {
        DB::table('galleries')->insert([
            [
                'image_url' => 'gallery/event1.png',
                'caption' => 'Annual Science Fair 2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image_url' => 'gallery/event2.png',
                'caption' => 'Digital Classroom Launch',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    private function seedCustomers()
    {
        DB::table('customers')->insert([
            [
                'name' => 'Jagannathpur Govt. Degree College',
                'image_url' => 'customers/jagannathpur.png',
                'url' => 'https://jagannathpurcollege.edu.bd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tajpur Degree College',
                'image_url' => 'customers/tajpur.png',
                'url' => 'https://tajpurcollege.edu.bd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
