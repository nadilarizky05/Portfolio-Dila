<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            'SwiftUI', 'SwiftData', 'Lottie', 'iOS',
            '0G', 'Solidity', 'TEE', 'Next.js',
            'HTML', 'CSS', 'Bootstrap', 'Laravel', 'React JS',
        ];

        foreach ($technologies as $name) {
            Technology::create(['name' => $name]);
        }
    }
}
