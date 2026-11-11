<?php

namespace Database\Seeders;

use App\Models\Volunteering;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VolunteeringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Volunteering::create([
            'role' => 'LO Medical | IESF 14th World E-Sports Championship',
            'organization' => 'Garudaku (PBESI)',
            'logo' => 'garudaku.jpeg',
            'start_date' => '2022-12-01',
            'end_date' => '2022-12-31',
        ]);

        Volunteering::create([
            'role' => 'Surveyor',
            'organization' => 'Unand Career and Counseling Development Center',
            'logo' => 'unand.jpeg',
            'start_date' => '2022-05-01',
            'end_date' => '2022-08-01',
        ]);

        Volunteering::create([
            'role' => 'Graphic Designer',
            'organization' => 'Beasiswa 10.000',
            'logo' => 'bea10k.jpeg',
            'start_date' => '2022-02-01',
            'end_date' => '2022-09-01',
        ]);
    }
}
