<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $iosCategory = ProjectCategory::where('slug', 'ios-developer')->first();
        $webCategory = ProjectCategory::where('slug', 'web-developer')->first();
        $curriculumCategory = ProjectCategory::where('slug', 'curriculum-maker')->first();

        $this->createProjects($iosCategory, [
            [
                'title' => 'KeepFire',
                'description' => 'An App that helps me to aware if I am not alone to have big dream, goals and plan for my future or my hopes by show other anonymous dreams/plans/goals in my community.',
                'about_app' => 'KeepFire is a place to post your dreams and goals anonymously, then get quiet encouragement from a community of people chasing similar things — no profiles, no pressure, just support.',
                'primary_link_label' => 'TESTFLIGHT',
                'primary_link_url' => 'https://testflight.apple.com/join/dbma67e7',
                'secondary_link_label' => 'CODE',
                'secondary_link_url' => 'https://github.com/nadilarizky05/KeepFire',
                'technologies' => ['Swift', 'SwiftUI', 'MVVM architecture', 'Core Data', 'Combine', 'Realm', 'RxSwift', 'XCTest'],
                'images' => ['keepFire.png', 'keepFire1.png', 'keepFire2.png', 'keepFire3.png'],
                'cover_image' => 'keepFire_cover.png',
                'folder' => 'KeepFire',
                'features' => [
                    'Post anonymous dreams, goals, or hopes for others to see',
                    'Browse a feed of dreams shared by the community',
                    'Save or bookmark dreams that inspire you',
                    'Simple onboarding with no account details required',
                ],
                'my_role' => 'I designed and built the entire app solo, from the SwiftUI interface to the Core Data-backed storage layer, as part of my Apple Developer Academy coursework.',
                'challenges' => 'The trickiest part was keeping posts anonymous while still preventing spam, which I solved with a lightweight on-device rate limiter instead of requiring user accounts.',
                'impact' => 'Building KeepFire solo, end to end, was my first real taste of owning a full Apple Developer Academy project from interface to data layer, and it gave me the confidence to ship something a stranger could actually use.',
            ],
            [
                'title' => 'dropTo',
                'description' => 'An iOS photo app that lets users create albums before capturing photos, then automatically sorts new photos into the right album to keep the camera roll organized.',
                'about_app' => 'dropTo rethinks how camera roll organization works on iOS: instead of sorting photos after the fact, it lets you set up an album first so every new photo lands exactly where it belongs.',
                'primary_link_label' => 'TESTFLIGHT',
                'secondary_link_label' => 'CODE',
                'secondary_link_url' => 'https://github.com/nadilarizky05/dropTo',
                'technologies' => ['Swift', 'SwiftUI', 'Photos (PhotoKit)', 'Combine', 'AVKit', 'UIKit'],
                'images' => ['dropTo.png', 'dropTo1.png', 'dropTo2.png', 'dropTo3.png', 'dropTo4.png', 'dropTo5.png', 'dropTo6.png', 'dropTo7.png'],
                'cover_image' => 'dropTo_cover.png',
                'folder' => 'dropTo',
                'features' => [
                    'Create an album before you start taking photos',
                    'New photos are automatically sorted into the right album',
                    'Browse albums in a familiar grid view',
                    'Quick preview for photos and videos',
                ],
                'my_role' => 'I built the album creation flow and the automatic photo-sorting logic using PhotoKit.',
                'challenges' => 'Reliably detecting which album a new photo belongs to, especially with multiple albums open at once, took a few iterations with Combine to get right.',
                'impact' => "dropTo taught me how to work closely with PhotoKit and Combine to keep the whole experience feeling instant, and it's now the app I personally use to keep my own camera roll from turning into chaos.",
            ],
            [
                'title' => 'Homey',
                'description' => "An app that helps people who live together to manage their house chores by assigning tasks, routing reminders to the right person, and making every members contribution visible.",
                'about_app' => "Homey turns the usual roommate group-chat chaos over chores into a shared, visible system — tasks get assigned, reminders go to the right person, and everyone can see who's actually pulling their weight.",
                'primary_link_label' => 'TESTFLIGHT',
                'secondary_link_label' => 'CODE',
                'secondary_link_url' => 'https://github.com/vixniv/Homey',
                'technologies' => ['Swift', 'SwiftUI', 'Supabase', 'Swift Dependencies (DI)', 'Observation Framework', 'Sign in with Apple'],
                'images' => ['homey.png', 'homey1.png', 'homey2.png', 'homey3.png'],
                'cover_image' => 'homey_cover.png',
                'folder' => 'homey',
                'features' => [
                    "Assign chores to specific housemates",
                    'Reminders automatically routed to the right person',
                    "Shared dashboard showing everyone's contribution",
                    'Sign in with Apple for quick, secure access',
                ],
                'my_role' => 'I worked on the task-assignment and reminder-routing features, and integrated Supabase as the backend.',
                'challenges' => "Designing a fair way to visualize each person's contribution without singling anyone out took a few rounds of iteration on the dashboard.",
                'impact' => 'Working on Homey pushed me to think about fairness as a design problem, not just a technical one, and it shaped how I approach any feature that touches shared responsibility.',
            ],
            [
                'title' => 'CODELONIZED',
                'description' => 'Create a game that utilize RealityKit and ARKit and real-time host-client multiplayer syncing to deliver a competitive, hands-on way to learn programming through quiz-based area conquest',
                'about_app' => 'CODELONIZED turns solo coding practice into a live, competitive game — players answer programming questions to claim territory on a shared island map in real time.',
                'primary_link_label' => 'TESTFLIGHT',
                'secondary_link_label' => 'CODE',
                'secondary_link_url' => 'https://github.com/ArthazA/CODElonize',
                'technologies' => ['Swift', 'SwiftUI', 'ARKit', 'RealityKit', 'Combine', 'Network Framework'],
                'images' => ['codelonized.png', 'codelonized1.png', 'codelonized2.png', 'codelonized3.png'],
                'cover_image' => 'codelonized_cover.png',
                'folder' => 'codelonized',
                'features' => [
                    'Real-time multiplayer area-conquest gameplay',
                    'Answer coding quiz questions to claim territory',
                    'Augmented reality map rendered with RealityKit',
                    'Host or join a game with a simple room code',
                ],
                'my_role' => 'I implemented the ARKit/RealityKit map rendering and the host-client sync logic over the Network framework.',
                'challenges' => "Keeping every player's map in sync in real time without noticeable lag was the biggest challenge, especially over weaker classroom Wi-Fi.",
                'impact' => 'This project was my deepest dive yet into ARKit, RealityKit, and real-time networking, and seeing classmates actually compete over it made the sync-lag debugging worth it.',
            ],
            [
                'title' => 'Nookio',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga a aspernatur dolore corporis porro numquam voluptas! Unde vel doloremque odit!',
                'about_app' => 'Nookio is a reading app built around comfort and safety, with adjustable text and dark mode for easy reading, plus women-only reading rooms for a more private community space.',
                'primary_link_label' => 'LIVE',
                'secondary_link_label' => 'CODE',
                'technologies' => ['HTML', 'CSS', 'JavaScript'],
                'images' => ['nookio.png', 'nookio1.png'],
                'cover_image' => 'nookio_cover.png',
                'folder' => 'nookio',
                'features' => [
                    'Adjustable text size and dark interface for comfortable reading',
                    'Women-only reading rooms for a safer community space',
                    'Sign in with Apple for quick access',
                    'Available on TestFlight for early testers',
                ],
                'my_role' => 'I contributed to the reading interface and the accessibility settings, including text size and dark mode.',
                'challenges' => 'Balancing accessibility options with a clean, native-feeling UI took several rounds of design polish.',
                'impact' => 'Nookio helped me get more comfortable designing accessibility-first interfaces, balancing customization with a clean, native feel.',
            ],
            [
                'title' => 'HandsOn',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga a aspernatur dolore corporis porro numquam voluptas! Unde vel doloremque odit!',
                'about_app' => "HandsOn turns Swift theory into practice, walking beginners through bite-sized lessons and quizzes so they can test what they've just learned instead of only reading about it.",
                'primary_link_label' => 'LIVE',
                'secondary_link_label' => 'CODE',
                'technologies' => ['HTML', 'CSS', 'JavaScript'],
                'images' => ['handsOn.png', 'handsOn1.png'],
                'cover_image' => 'handsOn_cover.png',
                'folder' => 'handsOn',
                'features' => [
                    'Bite-sized Swift lessons for beginners',
                    'Interactive quizzes to test your understanding',
                    'Track your progress across topics',
                    'Practice variables, operators, and control flow',
                ],
                'my_role' => 'I built the quiz engine and progress tracking for this learning app.',
                'challenges' => 'Making quiz feedback feel encouraging rather than discouraging for total beginners required a few rounds of wording changes.',
                'impact' => 'Building the quiz engine for HandsOn taught me a lot about giving feedback that keeps beginners motivated instead of discouraged.',
            ],
            // [
            //     'title' => 'ChildSafety',
            //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga a aspernatur dolore corporis porro numquam voluptas! Unde vel doloremque odit!',
            //     'about_app' => 'ChildSafety gives parents peace of mind with simple location sharing, safe zone alerts, and quick access to emergency contacts, all wrapped in an interface simple enough for the whole family.',
            //     'primary_link_label' => 'LIVE',
            //     'secondary_link_label' => 'CODE',
            //     'technologies' => ['HTML', 'CSS', 'JavaScript'],
            //     'images' => ['final.png', 'final1.png'],
            //     'cover_image' => 'final_cover.png',
            //     'folder' => 'final',
            //     'features' => [
            //         'Quick access to emergency contacts',
            //         'Location sharing with trusted guardians',
            //         'Safe zone alerts when a child leaves a set area',
            //         'Simple, kid-friendly interface',
            //     ],
            //     'my_role' => 'I worked on the safe-zone alert logic and the guardian notification flow.',
            //     'challenges' => 'Getting location alerts to fire reliably in the background without draining the battery took some careful tuning.',
            //     'impact' => "This project pushed me to think carefully about reliability — an alert that fires late or drains the battery isn't good enough when it's about a child's safety.",
            // ],
        ]);

        $this->createProjects($webCategory, [
            [
                'title' => 'Education Festival Website',
                'description' => 'The World Education Festival (WEF) website by NIEC Indonesia offers registration forms and detailed information about international education exhibitions featuring over 300 universities from various countries. Participants can consult with campus representatives, join workshops, take free English tests, and win scholarships or prizes.',
                'about_app' => 'The WEF website is the front door for an international education expo, helping students discover 300+ universities, book consultations, and register for the event all in one place.',
                'primary_link_label' => 'LIVE',
                'secondary_link_label' => 'CODE',
                'technologies' => ['HTML', 'CSS', 'JavaScript'],
                'images' => ['wef.png', 'wef1.png', 'wef2.png', 'wef3.png', 'wef4.png', 'wef5.png'],
                'cover_image' => 'wef_cover.png',
                'folder' => 'wef',
                'features' => [
                    'Event registration form for the education festival',
                    'Detailed info on 300+ participating universities',
                    'Workshop and campus consultation booking',
                    'Free English test signup and prize/scholarship info',
                ],
                'my_role' => 'I built the front-end pages, including the countdown timer and the registration flow.',
                'challenges' => 'Keeping the page fast despite the heavy hero animation and imagery needed some careful asset optimization.',
                'impact' => "Shipping WEF's site under a real event deadline taught me to prioritize ruthlessly and optimize assets so the experience stayed fast despite heavy visuals.",
            ],
            [
                'title' => 'NIEC Psychotest',
                'description' => 'NIEC Online Assessment is a web-based platform designed to help prospective employees identify their potential, strengths, and weaknesses through various psychological tests. The platform aims to provide more accurate recommendations for career development and job placement',
                'about_app' => 'NIEC Psychotest guides prospective employees through a series of psychological assessments and turns the results into clear, actionable career recommendations.',
                'primary_link_label' => 'LIVE',
                'secondary_link_label' => 'CODE',
                'technologies' => [],
                'images' => ['psychotest1.png'],
                'cover_image' => 'psychotest_cover.png',
                'folder' => 'psychotest',
                'features' => [
                    'Multiple psychological assessments, including an MBTI-style test',
                    'Personalized career development recommendations',
                    'Simple, guided test-taking flow',
                    'Clear results summary for each assessment',
                ],
                'my_role' => 'I developed the assessment flow and the results pages.',
                'challenges' => 'Presenting test results in a way that felt encouraging and easy to understand, rather than clinical, took some UX iteration.',
                'impact' => 'This project taught me how much presentation matters — the same result can feel clinical or encouraging depending purely on how it is written and laid out.',
            ],
            [
                'title' => 'LMS Mathesia',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga a aspernatur dolore corporis porro numquam voluptas! Unde vel doloremque odit!',
                'about_app' => 'Mathesia is a learning platform where students log in with their student ID to work through interactive math materials and quizzes organized by grade level.',
                'primary_link_label' => 'LIVE',
                'secondary_link_label' => 'CODE',
                'technologies' => [],
                'images' => [
                    'mathesia.png', 'mathesia1.png', 'mathesia2.png', 'mathesia3.png', 'mathesia4.png',
                    'mathesia5.png', 'mathesia6.png', 'mathesia7.png', 'mathesia8.png', 'mathesia9.png',
                    'mathesia10.png', 'mathesia11.png', 'mathesia12.png', 'mathesia13.png',
                ],
                'cover_image' => 'mathesia_cover.png',
                'folder' => 'mathesia',
                'features' => [
                    'Student login with NIS and password',
                    'Interactive math learning materials by grade level',
                    'Practice quizzes for each topic',
                    'Simple, focused dashboard for students',
                ],
                'my_role' => 'I worked on the learning material pages and the login flow.',
                'challenges' => 'Structuring the material library so it stayed easy to navigate as more topics were added was an ongoing challenge.',
                'impact' => 'Working on Mathesia taught me to plan content structure early, since a learning platform only gets harder to navigate as more topics are added.',
            ],
            [
                'title' => 'Moodyan',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga a aspernatur dolore corporis porro numquam voluptas! Unde vel doloremque odit!',
                'about_app' => 'Otw is a gentle mood-tracking companion that uses AI-assisted check-ins and a simple journal to help people notice their own patterns over time.',
                'primary_link_label' => 'LIVE',
                'secondary_link_label' => 'CODE',
                'technologies' => [],
                'images' => ['moodyan1.png', 'moodyan2.png', 'moodyan3.png'],
                'cover_image' => 'moodyan_cover.png',
                'folder' => 'moodyan',
                'features' => [
                    'AI-assisted mood check-ins',
                    'Simple journal for tracking mood over time',
                    'Sign in with Internet Identity',
                    'Gentle prompts to encourage mindful habits',
                ],
                'my_role' => 'I built the mood check-in flow and the journal history view.',
                'challenges' => 'Designing prompts that felt supportive rather than repetitive was trickier than the technical side of the app.',
                'impact' => 'This project shifted how I think about UX copy — the technical side of mood tracking was easy compared to writing prompts that felt genuinely supportive.',
            ],
        ]);

        $this->createProjects($curriculumCategory, [
            [
                'title' => 'Tech Explorer',
                'description' => 'Tech Explorer started from a question parents at Timedoor kept asking: how do I get my child curious about tech without it feeling like homework?',
                'about_app' => 'Tech Explorer is a Junior-level curriculum that introduces coding through Scratch before easing students into AR/VR concepts, built for classroom or one-on-one teaching.',
                'who_its_for' => 'Designed for Junior-level students with little to no coding background. Students start with visual, block-based programming in Scratch, then progress toward understanding how AR and VR experiences are built.',
                'primary_link_label' => null,
                'secondary_link_label' => null,
                'technologies' => ['Scratch Basic', 'Scratch Advanced', 'AR', 'VR'],
                'images' => ['curriculum-maker1.png'],
                'cover_image' => 'techXplorer_cover.png',
                'folder' => 'techXplorer',
                'features' => [
                    'Hands-on coding activities using Scratch and AR/VR',
                    'Structured lesson plans for young learners',
                    'Progressive difficulty from basic to advanced Scratch',
                    'Designed for classroom or one-on-one teaching',
                ],
                'my_role' => 'I designed this curriculum from scratch for my Junior-level students at Timedoor Academy.',
                'challenges' => 'Keeping young students engaged while introducing AR/VR concepts took a lot of trial and error with the lesson pacing.',
                'impact' => 'Designing this curriculum taught me how much lesson pacing matters — the same AR/VR concept landed completely differently depending on how gradually I introduced it.',
            ],
            [
                'title' => 'I Believe I Can Code',
                'description' => "I Believe I Can Code came out of watching my students freeze up the moment their code did not work on the first try. I wanted a resource that met that fear head-on and replaced it with 'I can do this.'",
                'about_app' => 'I Believe I Can Code is a beginner-friendly book that walks first-time coders through Swift and SwiftUI step by step, with an encouraging tone throughout.',
                'who_its_for' => 'Written for students with zero coding experience. Readers learn Swift fundamentals and SwiftUI basics through small, achievable projects, building confidence one step at a time.',
                'primary_link_label' => null,
                'secondary_link_label' => null,
                'technologies' => ['Swift Basic', 'Swift Advance', 'SwiftUI'],
                'images' => [],
                'cover_image' => 'handbook_cover.png',
                'folder' => 'handbook',
                'features' => [
                    'Beginner-friendly introduction to Swift and SwiftUI',
                    'Step-by-step project walkthroughs',
                    'Written for students with no prior coding experience',
                    'Encouraging, confidence-building tone throughout',
                ],
                'my_role' => 'I wrote and illustrated this book to help my students build confidence in coding.',
                'challenges' => 'Simplifying Swift concepts without losing accuracy was the biggest writing challenge.',
                'impact' => "Writing this book taught me to explain code the way I would to a student sitting right in front of me — simple, patient, and honest about what's actually hard.",
            ],
        ]);
    }

    /**
     * @param  array<int, array{title: string, description: string, primary_link_label: string, secondary_link_label: string, technologies: string[], images: string[], folder: string}>  $projects
     */
    private function createProjects(ProjectCategory $category, array $projects): void
    {
        $mediaFolder = match ($category->slug) {
            'ios-developer' => 'ios',
            'curriculum-maker' => 'curriculum-maker',
            default => 'web',
        };

        foreach ($projects as $data) {
            $subfolder = $data['folder'] !== '' ? $data['folder'].'/' : '';

            $project = Project::create([
                'project_category_id' => $category->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'about_app' => $data['about_app'] ?? null,
                'who_its_for' => $data['who_its_for'] ?? null,
                'features' => $data['features'] ?? null,
                'my_role' => $data['my_role'] ?? null,
                'challenges' => $data['challenges'] ?? null,
                'impact' => $data['impact'] ?? null,
                'cover_image' => isset($data['cover_image']) ? "projects/$mediaFolder/{$subfolder}{$data['cover_image']}" : null,
                'primary_link_label' => $data['primary_link_label'],
                'primary_link_url' => $data['primary_link_label'] ? ($data['primary_link_url'] ?? '#') : null,
                'secondary_link_label' => $data['secondary_link_label'],
                'secondary_link_url' => $data['secondary_link_label'] ? ($data['secondary_link_url'] ?? '#') : null,
            ]);

            foreach ($data['technologies'] as $techName) {
                $tech = Technology::firstOrCreate(['name' => $techName]);
                $project->technologies()->attach($tech->id);
            }

            foreach ($data['images'] as $i => $fileName) {
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => "projects/$mediaFolder/{$subfolder}$fileName",
                    'order' => $i + 1,
                ]);
            }
        }
    }
}
