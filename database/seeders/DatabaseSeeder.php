<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ExperienceSeeder::class,
            EducationSeeder::class,
            AchievementSeeder::class,
            PublicationSeeder::class,
            VolunteeringSeeder::class,
            TeachingAchievementSeeder::class,
            PtmDocumentationSeeder::class,
            TeamMemberSeeder::class,
            PathwaySeeder::class,
            DocumentationClassPhotoSeeder::class,
            StudentPresentationVideoSeeder::class,
            TechnologySeeder::class,
            ProjectCategorySeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
