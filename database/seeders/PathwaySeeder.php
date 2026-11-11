<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Pathway;
use App\Models\PathwayCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PathwaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createPathway('Junior Pathways', '5 - 7 years old', [
            '3D Animator',
            'Web Designer',
            'Virtual World Maker',
            'Little Programmer',
            'Game Coders',
        ], [
            'Web Designer' => 'courses/junior/web_designer',
        ], [
            // Ganti title dan description di bawah ini sesuai foto masing-masing.
            // Urutannya sudah mengikuti nama file 1.png sampai 9.png di folder
            // public/images/courses/junior/3d_animator/.
            '3D Animator' => [
                ['title' => 'Aquarium', 'description' => 'Short description of project 1.', 'thumbnail' => 'courses/junior/3d_animator/1.png'],
                ['title' => 'Racing Animation', 'description' => 'Short description of project 2.', 'thumbnail' => 'courses/junior/3d_animator/2.png'],
                ['title' => 'Rocket to The Moon', 'description' => 'Short description of project 3.', 'thumbnail' => 'courses/junior/3d_animator/3.png'],
                ['title' => 'Basketball', 'description' => 'Short description of project 4.', 'thumbnail' => 'courses/junior/3d_animator/4.png'],
                ['title' => 'My Class', 'description' => 'Short description of project 5.', 'thumbnail' => 'courses/junior/3d_animator/5.png'],
                ['title' => 'My First 3D Game', 'description' => 'Short description of project 6.', 'thumbnail' => 'courses/junior/3d_animator/6.png'],
                ['title' => 'Underwater Game', 'description' => 'Short description of project 7.', 'thumbnail' => 'courses/junior/3d_animator/7.png'],
                ['title' => 'Cycle Race', 'description' => 'Short description of project 8.', 'thumbnail' => 'courses/junior/3d_animator/8.png'],
                ['title' => 'The Ground is Lava', 'description' => 'Short description of project 9.', 'thumbnail' => 'courses/junior/3d_animator/9.png'],
            ],
        ]);

        $this->createPathway('Kids Pathways', '8 - 12 years old', [
            'Coding Xplorer',
            'Tech Xplorer',
            'Game Developer',
            'Roblox Xplorer',
            'Roblox Designer',
            'Roblox Coder',
            'Python Coder',
            'Python Game Developer',
            'Python AI Developer',
        ]);

        $this->createPathway('Teens Pathways', '12 - 18 years old', [
            'Teens Programmer',
            'Teens Javascript',
            'Teens Game Developer',
            'Teens Web Developer',
            'Teens App Developer',
            'Data Science',
            'AI Machine Learning',
            'AI Computer Vision',
        ]);

        $this->createPathway('Pro Pathways', '> 18 years old', [
            'Front-End Developer',
            'Back-End Developer',
        ]);
    }

    /**
     * @param  string[]  $categoryNames
     * @param  array<string, string>  $thumbnailFolders  Nama kategori => folder thumbnail (relatif ke public/images), dipakai untuk kategori dummy
     * @param  array<string, array<int, array{title: string, description?: string, thumbnail?: string, platform_name?: string}>>  $explicitCourses  Nama kategori => daftar course asli yang mau ditulis manual
     */
    private function createPathway(string $name, string $ageRange, array $categoryNames, array $thumbnailFolders = [], array $explicitCourses = []): void
    {
        $pathway = Pathway::create([
            'name' => $name,
            'age_range' => $ageRange,
        ]);

        foreach ($categoryNames as $categoryName) {
            $category = PathwayCategory::create([
                'pathway_id' => $pathway->id,
                'name' => $categoryName,
            ]);

            if (isset($explicitCourses[$categoryName])) {
                $this->createCourses($category, $explicitCourses[$categoryName]);
            } else {
                $this->createDummyCourses($category, thumbnailFolder: $thumbnailFolders[$categoryName] ?? null);
            }
        }
    }

    /**
     * Bikin course dari daftar yang ditulis manual (judul & deskripsi asli, bukan hasil perulangan).
     *
     * @param  array<int, array{title: string, description?: string, thumbnail?: string, platform_name?: string}>  $courses
     */
    private function createCourses(PathwayCategory $category, array $courses): void
    {
        foreach ($courses as $course) {
            Course::create([
                'pathway_category_id' => $category->id,
                'title' => $course['title'],
                'description' => $course['description'] ?? null,
                'thumbnail' => $course['thumbnail'] ?? null,
                'platform_name' => $course['platform_name'] ?? 'Scratch',
            ]);
        }
    }

    /**
     * Bikin 10 course dummy per kategori, biar course-scroll-nya beneran butuh di-scroll
     * (bukan cuma 1 card ngambang di tengah container kosong).
     */
    private function createDummyCourses(PathwayCategory $category, int $count = 10, ?string $thumbnailFolder = null): void
    {
        for ($i = 1; $i <= $count; $i++) {
            Course::create([
                'pathway_category_id' => $category->id,
                'title' => "Weather Survival Game #$i",
                'description' => 'Choose the right costume to survive extreme weather.',
                'thumbnail' => $thumbnailFolder ? "$thumbnailFolder/$i.png" : null,
                'platform_name' => 'Scratch',
            ]);
        }
    }
}
