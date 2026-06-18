<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            [
                'name' => 'Trending Treks',
                'slug' => 'trending-treks',
                'icon' => 'fas fa-hiking',
                'description' => 'Popular and trending trekking packages',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Expeditions',
                'slug' => 'expeditions',
                'icon' => 'fas fa-mountain',
                'description' => 'High altitude mountain expeditions',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Tours',
                'slug' => 'tours',
                'icon' => 'fas fa-suitcase',
                'description' => 'Cultural and sightseeing tours',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Rock Climbing',
                'slug' => 'rock-climbing',
                'icon' => 'fas fa-grip-vertical',
                'description' => 'Rock climbing and mountaineering',
                'is_active' => true,
                'order' => 4,
            ],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
