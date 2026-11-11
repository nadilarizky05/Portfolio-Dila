<?php

namespace Database\Seeders;

use App\Models\StudentPresentationVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentPresentationVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Judul diambil otomatis dari YouTube oEmbed API, biar sesuai judul asli video-nya.
        $videos = [
            ['id' => 'K7q7JKJjW_U', 'title' => 'TechFest - Anand - Game with Scratch - Save The Fish'],
            ['id' => 'QLWFuw9Io9w', 'title' => 'TechFest - Cakra - Game with Kodu - Game Polusi Asik'],
            ['id' => 'qb2yCOfj0fM', 'title' => 'Demon Hunters Game by Nattaya - Final Project Construct 3'],
            ['id' => 'DI60GQAebWo', 'title' => 'Final Project Game Scratch Junior Kelas GJ 21A ID - Timedoor Gatsu'],
            ['id' => 'oMfAugjjuMk', 'title' => 'Final Project Scratch Junior - Kelas DJ 24A ID, Timedoor Branch Renon'],
            ['id' => 'WYn5BiwPeLQ', 'title' => 'Final Project Web Designer - Kelas Adaptive 10F by Abhi'],
            ['id' => '2O_n7UElbcI', 'title' => 'DK 9A ID - Presentasi Final Project Game Developer for Apps'],
            ['id' => 'zhnas9Taa6Y', 'title' => 'Final Project Kodu - Kelas GJ 21A ID (Timedoor Gatsu)'],
            ['id' => 'PeTuOI1hKEA', 'title' => 'TechFest - Ganendra - Game with Scratch - Save the Underwater'],
            ['id' => 'm8LBtm3rorI', 'title' => 'TechFest - Naka - Game with Kodu - Game Bebas Polusi'],
            ['id' => 'DCxwY53wtK0', 'title' => 'Final Project Web Designer by Adhy'],
            ['id' => 't1omwIi0U_A', 'title' => 'TechFest - Bumi - Game with Kodu - Game Kumpul Sampah'],
            ['id' => 'w2dPoGEMLZQ', 'title' => 'Final Project Scratch - Kelas DJ 19A ID (Timedoor Renon)'],
            ['id' => 'T-m2xps5yxg', 'title' => 'Final Project Game 3D Animation with Kodu - Kelas GJ 20A ID'],
            ['id' => 'ZgerR3fXmYY', 'title' => 'Game Petualangan di Kebun Apel by Zentan - Final Project Game 3D Animation with Kodu'],
            ['id' => 'd0TKDAl9a_M', 'title' => 'Final Project 3D Animator - Kelas DJ 24A ID (Timedoor Renon)'],
            ['id' => 'ZaLCppOz4n4', 'title' => 'Website Toko Mainan Sederhana - by Anand'],
            ['id' => '1dp3WapPXBs', 'title' => 'Final Project Scratch - Ghaisan'],
            ['id' => 'sO_0FrYDxeE', 'title' => 'Final Project Web Designer - Kelas GJ 20A ID (Timedoor Gatsu)'],
            ['id' => 'yxiuqHC7ISM', 'title' => 'DJ 19A ID - Presentasi Final Project Level Junior Boost - Timedoor Branch Renon'],
            ['id' => 'MNokENEjfdY', 'title' => 'Final Project Web Designer Detya dan Ziel'],
            ['id' => 'aV9z2G1wHs4', 'title' => 'Final Project Game Coders - Kelas DJ 14A ID (Timedoor Renon)'],
            ['id' => '1Usmrs4xi1E', 'title' => 'Buat Maze Game di Scratch by Andra'],
            ['id' => 'AWfQH6M7zhw', 'title' => 'Final Project Scratch - Labirin Lompat by Satya'],
            ['id' => 'U4wjQGNMTm4', 'title' => 'Kelas DJ 19A ID - Final Project Virtual Maker - Timedoor Branch Renon'],
            ['id' => 'THhOF51wdAg', 'title' => 'Final Project Roblox Explorer by Arjuna dan Krishna'],
            ['id' => 'gZUsiJ-xcns', 'title' => 'Final Project Enoch dan Abi - Kids Xplorer (Timedoor Academy Gatsu)'],
            ['id' => 'I0C-7rujhd8', 'title' => 'Gerakin Player Pakai Mouse Pointer - A Carp Life Game by Bima'],
            ['id' => 'N1w9O7kYuBk', 'title' => 'Final Project Web Designer Junior by Vero - Timedoor Renon'],
        ];

        foreach ($videos as $i => $video) {
            StudentPresentationVideo::create([
                'title' => $video['title'],
                'youtube_url' => 'https://www.youtube.com/watch?v='.$video['id'],
                'order' => $i + 1,
            ]);
        }
    }
}
