<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Replace each title and description below with the real name/role for that photo.
        $members = [
           ['image' => 'timedoor-team/1.jpeg', 'title' => 'New Year 2025', 'description' => 'Ringing in 2025 together as one big Timedoor family.'],
            ['image' => 'timedoor-team/2.jpeg', 'title' => 'New Year 2024', 'description' => 'Kicking off 2024 with the full Timedoor Bali team.'],
            ['image' => 'timedoor-team/3.jpeg', 'title' => 'Christmas 2024', 'description' => 'Santa hats, reindeer ears, and the whole Bali crew.'],
            ['image' => 'timedoor-team/4.jpeg', 'title' => 'Christmas 2025', 'description' => 'Gift exchange with the Gatsu branch team.'],
            ['image' => 'timedoor-team/5.png',  'title' => 'Halloween 2025', 'description' => 'The Renon branch team, in full costume.'],
            ['image' => 'timedoor-team/6.png',  'title' => 'Teacher Evaluatio 2025', 'description' => 'Reflecting, giving feedback, and growing together at Gatsu.'],
            ['image' => 'timedoor-team/7.jpeg', 'title' => 'Farewell Party 2026', 'description' => 'Sending off a teammate as they start a new chapter.'],
        ];

        foreach ($members as $i => $member) {
            TeamMember::create([
                'image' => $member['image'],
                'title' => $member['title'],
                'description' => $member['description'],
                'order' => $i + 1,
            ]);
        }
    }
}
