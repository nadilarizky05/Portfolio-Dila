<?php

namespace Database\Seeders;

use App\Models\PtmDocumentation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PtmDocumentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documentations = [
            [
                'image' => 'ptm/5.jpeg',
                'title' => 'PTM Level AIML - Class DT 12B ID',
                'description' => 'Discussion of student progress between teacher and parents.',
            ],
            [
                'image' => 'ptm/2.jpeg',
                'title' => 'PTM Teens AI Machine Learning',
                'description' => 'Successfully completed the final project presentation.',
            ],
            [
                'image' => 'ptm/3.jpeg',
                'title' => 'PTM Junior Website Designer',
                'description' => 'Successfully presented a website they built themselves.',
            ],
            [
                'image' => 'ptm/4.jpeg',
                'title' => 'PTM Junior Game Coders',
                'description' => 'Successfully presented a game project made with Construct 3.',
            ],
            [
                'image' => 'ptm/1.jpeg',
                'title' => 'PTM Kids Website Developer',
                'description' => 'Successfully presented their published website project.',
            ],
        ];

        foreach ($documentations as $i => $doc) {
            PtmDocumentation::create([
                'image' => $doc['image'],
                'title' => $doc['title'],
                'description' => $doc['description'],
                'order' => $i + 1,
            ]);
        }
    }
}
