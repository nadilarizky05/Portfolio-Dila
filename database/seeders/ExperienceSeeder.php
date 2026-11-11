<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experience::create([
            'title' => 'Learner iOS Developer',
            'company' => 'Apple Developer Academy',
            'logo' => 'apple_logo.jpeg',
            'start_date' => '2026-02-01',
            'end_date' => null,
        ]);

        $teacher = Experience::create([
            'title' => 'Programming Teacher',
            'company' => 'Timedoor Academy',
            'logo' => 'timedoor_logo.jpeg',
            'start_date' => '2023-06-01',
            'end_date' => null,
        ]);
        Experience::create([
            'parent_id' => $teacher->id,
            'title' => 'Curriculum Maker',
            'company' => 'Timedoor Academy',
            'start_date' => '2025-10-01',
            'end_date' => '2026-04-01',
        ]);
        Experience::create([
            'parent_id' => $teacher->id,
            'title' => 'Marketing Administrative Intern',
            'company' => 'Timedoor Academy',
            'start_date' => '2023-02-01',
            'end_date' => '2023-05-01',
        ]);

        $fullstack = Experience::create([
            'title' => 'Full-Stack Developer',
            'company' => 'NIEC Indonesia',
            'logo' => 'niec_logo.jpeg',
            'start_date' => '2024-12-01',
            'end_date' => '2025-04-01',
        ]);
        Experience::create([
            'parent_id' => $fullstack->id,
            'title' => 'Back-End Developer Intern',
            'company' => 'NIEC Indonesia',
            'start_date' => '2024-08-01',
            'end_date' => '2024-11-01',
        ]);

        $dataMentor = Experience::create([
            'title' => 'Data Analyst Assistant Mentor',
            'company' => 'DQLab',
            'logo' => 'dqlab_logo.jpeg',
            'start_date' => '2024-01-01',
            'end_date' => '2024-04-01',
        ]);
        Experience::create([
            'parent_id' => $dataMentor->id,
            'title' => 'Professional Instructur',
            'company' => 'DQLab',
            'start_date' => '2024-01-01',
            'end_date' => '2024-01-31',
        ]);

        Experience::create([
            'title' => 'Data Analyst Intern',
            'company' => 'Harian Kompas',
            'logo' => 'hariankompas_logo.jpeg',
            'start_date' => '2023-06-01',
            'end_date' => '2023-07-01',
        ]);

        Experience::create([
            'title' => 'Data Entry and Collection Support Coordinator',
            'company' => 'Grab Bali',
            'logo' => 'grab_logo.jpeg',
            'start_date' => '2020-01-01',
            'end_date' => '2021-09-01',
        ]);
    }
}
