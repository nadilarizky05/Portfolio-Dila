<?php

namespace Database\Seeders;

use App\Models\DocumentationClassPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentationClassPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nomor 8 memang tidak ada di folder public/images/documentation_class/.
        $photoNumbers = [1, 2, 3, 4, 5, 6, 7, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];

        foreach ($photoNumbers as $order => $i) {
            DocumentationClassPhoto::create([
                'image_path' => "documentation_class/$i.jpeg",
                'order' => $order + 1,
            ]);
        }
    }
}
