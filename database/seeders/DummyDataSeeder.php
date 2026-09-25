<?php

namespace Database\Seeders;

use App\Models\TrendingTrek;
use App\Models\Type;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        $type = Type::firstOrCreate(['name' => 'Trekking', 'slug' => 'trekking'], ['description' => 'Trekking in Gilgit-Baltistan']);
        $user = User::first();

        // Seed Treks with Advanced Details
        TrendingTrek::firstOrCreate([
            'slug' => 'k2-base-camp-trek'
        ], [
            'type_id' => $type->id,
            'title' => 'K2 Base Camp Trek',
            'location' => 'Karakoram Range',
            'duration_days' => 14,
            'difficulty_level' => 4,
            'is_trending' => true,
            'is_active' => true,
            'height_meters' => 5150,
            'min_age' => 16,
            'max_guests' => 12,
            'distance' => '90 km',
            'best_season' => 'June to September',
            'overview' => 'Experience the ultimate trekking adventure to the base of the world\'s second-highest mountain.',
            'included' => ['Professional guide', 'All meals during trek', 'Camping equipment', 'Transport to/from Skardu'],
            'excluded' => ['International flights', 'Personal insurance', 'Tips for staff', 'Sleeping bag'],
            'packing_list' => ['Down jacket', 'Trekking boots', '4-season sleeping bag', 'Sunscreen', 'Headlamp'],
            'itinerary' => [
                ['day' => 1, 'title' => 'Arrival in Skardu', 'description' => 'Arrive in Skardu, rest and preparation.'],
                ['day' => 2, 'title' => 'Drive to Askole', 'description' => 'Jeep drive to the roadhead at Askole.'],
                ['day' => 3, 'title' => 'Trek to Jhola', 'description' => 'Begin the trek along the Braldu River.'],
            ],
            'faqs' => [
                ['question' => 'How fit do I need to be?', 'answer' => 'You need to be in excellent physical condition with prior trekking experience.'],
                ['question' => 'Is it safe?', 'answer' => 'Yes, our experienced guides ensure maximum safety protocols.'],
            ]
        ]);

        // Seed Blog Categories
        $cat = BlogCategory::firstOrCreate(['slug' => 'travel-guides'], ['name' => 'Travel Guides', 'description' => 'Guides for travelers']);
        
        // Seed Blog Tags
        $tag = BlogTag::firstOrCreate(['slug' => 'k2'], ['name' => 'K2']);

        // Seed Blog Post
        $post = BlogPost::firstOrCreate([
            'slug' => 'ultimate-guide-k2-base-camp'
        ], [
            'title' => 'The Ultimate Guide to K2 Base Camp',
            'category_id' => $cat->id,
            'author_id' => $user->id ?? 1,
            'content' => '<p>Trekking to K2 Base Camp is one of the most rewarding experiences...</p>',
            'status' => 'published',
            'published_at' => now(),
            'meta_title' => 'K2 Base Camp Trekking Guide',
            'meta_description' => 'Everything you need to know about trekking to K2 Base Camp.',
        ]);

        $post->tags()->sync([$tag->id]);
    }
}
