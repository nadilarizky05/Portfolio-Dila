<?php

namespace Database\Seeders;

use App\Models\TeachingAchievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeachingAchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeachingAchievement::create([
            'title' => 'Best Technical Sophistication Award',
            'description' => 'At the 2025 International Scratch Olympiad and proudly represent Timedoor Academy as one of the two qualified delegates.',
            'image' => 'teacher_achievements/1.png',
            'more_link' => '#',
        ]);

        TeachingAchievement::create([
            'title' => 'Top 5 Finalist - Exhibition Game with Kodu',
            'description' => 'Timedoor Academy Tech Festival 2024 ',
            'image' => 'teacher_achievements/2.png',
            'more_link' => '#',
        ]);

        TeachingAchievement::create([
            'title' => 'Top 10 Special Award - Game with Kodu',
            'description' => 'Timedoor Academy Tech Festival 2024 ',
            'image' => 'teacher_achievements/2.png',
            'more_link' => '#',
        ]);
    }
}
