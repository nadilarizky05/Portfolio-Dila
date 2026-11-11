<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Coding Mentor', 'slug' => 'coding-mentor'],
            ['name' => 'iOS Developer', 'slug' => 'ios-developer'],
            ['name' => 'Web Developer', 'slug' => 'web-developer'],
            ['name' => 'Curriculum Maker', 'slug' => 'curriculum-maker'],
        ];

        foreach ($categories as $category) {
            ProjectCategory::firstOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
