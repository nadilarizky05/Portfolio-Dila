<?php

namespace Database\Seeders;

use App\Models\Publication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Publication::create([
            'title' => 'Empowerment of Inter-Student Achievements as a Form of Manifestation "Mapres Copy Mapres" Sustainable',
            'publisher' => 'Atlantis Press',
            'published_at' => '2024-01-10',
        ]);
    }
}
