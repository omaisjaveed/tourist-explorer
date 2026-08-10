<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Service;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password123'),
        ]);

        // Seed Blogs
        Blog::create([
            'title' => 'Exploring the Northern Areas',
            'slug' => 'exploring-northern-areas',
            'content' => 'The northern areas of Pakistan are home to some of the most beautiful mountains and lakes in the world. From Hunza Valley to Skardu, every place has its own charm.',
            'is_published' => true,
        ]);

        Blog::create([
            'title' => 'The Hidden Gems of Hunza',
            'slug' => 'hidden-gems-hunza',
            'content' => 'Hunza Valley is not just about the views; it\'s about the people, the culture, and the ancient forts that stand tall against the test of time.',
            'is_published' => true,
        ]);

        // Seed Services
        Service::create([
            'title' => 'Custom Trip Planning',
            'description' => 'We create personalized itineraries based on your interests, budget, and travel style.',
            'icon' => 'fas fa-map-marked-alt',
        ]);

        Service::create([
            'title' => 'Luxury Transport',
            'description' => 'Travel in comfort with our fleet of luxury SUVs and professional drivers.',
            'icon' => 'fas fa-car-side',
        ]);
    }
}
