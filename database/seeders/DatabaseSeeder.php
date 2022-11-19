<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        

        // This code creates entires that should be present by default (in production)
        // Default product categories
        \App\Models\ProductCategory::factory()->create([
            'categoryName' => "Telescopes"
        ]);
        \App\Models\ProductCategory::factory()->create([
            'categoryName' => "Binoculars"
        ]);
        \App\Models\ProductCategory::factory()->create([
            'categoryName' => "Accessories"
        ]);

        // Default Recommendation tags
        \App\Models\RecommendationTag::factory()->create([
            'type' => 0,
            "value" => "low"
        ]);
        \App\Models\RecommendationTag::factory()->create([
            'type' => 0,
            "value" => "medium"
        ]);
        \App\Models\RecommendationTag::factory()->create([
            'type' => 0,
            "value" => "high"
        ]);
        \App\Models\RecommendationTag::factory()->create([
            'type' => 1,
            "value" => "telescope"
        ]);
        \App\Models\RecommendationTag::factory()->create([
            'type' => 1,
            "value" => "binoculars"
        ]);
        \App\Models\RecommendationTag::factory()->create([
            'type' => 1,
            "value" => "telescope-accessories"
        ]);
        \App\Models\RecommendationTag::factory()->create([
            'type' => 1,
            "value" => "binoculars-accessories"
        ]);
        \App\Models\RecommendationTag::factory()->create([
            'type' => 1,
            "value" => "universal-accessories"
        ]);
    }
}
