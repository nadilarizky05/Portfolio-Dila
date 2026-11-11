<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Achievement::create([
            'title' => '1st Place in </ICPHACKATHON/>, Web3 Competition',
            'description' => 'With Moodyan project at national level.',
            'date' => '2025-05-01',
            'image' => 'achievements/achievements1.jpeg',
        ]);

        Achievement::create([
            'title' => 'Best Presenter',
            'description' => 'International Forum Group Discussion, Kuala Lumpur.',
            'date' => '2024-05-01',
            'image' => 'achievements/achievements2.png',
        ]);

        Achievement::create([
            'title' => 'Best Presenter',
            'description' => 'International Conference on Entrepreneurship, Leadership, and Business Innovation by Andalas University.',
            'date' => '2022-09-01',
            'image' => 'achievements/achievements3.jpg',
        ]);

        Achievement::create([
            'title' => '2nd Winner in Anatomy Physiology Medicine',
            'description' => 'Dhyana Pura University, Bali Province level.',
            'date' => '2018-05-01',
            'image' => 'achievements/achievements5.png',
        ]);

        Achievement::create([
            'title' => '3rd Winner in Nursing Skill Competitions',
            'description' => 'STIKES Wira Medika Bali, Bali Province level.',
            'date' => '2018-11-01',
            'image' => 'achievements/achievements4.png',
        ]);
    }
}
