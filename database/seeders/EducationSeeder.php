<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Education::create([
            'degree' => "Bachelor's Degree in Information Systems",
            'institution' => 'Open University',
            'logo' => 'ut_dps.jpeg',
            'start_date' => '2022-09-01',
            'end_date' => null,
        ]);

        Education::create([
            'degree' => 'Nursing',
            'institution' => 'Bali Dewata Health Vocational School',
            'logo' => 'smks_badewa.jpeg',
            'start_date' => '2016-07-01',
            'end_date' => '2019-06-01',
        ]);
    }
}
