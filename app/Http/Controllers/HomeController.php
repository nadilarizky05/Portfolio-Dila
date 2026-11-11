<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'name' => 'Nadila Amelia',
            'roles' => ['Programming Teacher', 'Junior iOS Developer', 'Website Developer', 'Curriculum Maker'],
            'intro' => 'My name is Nadila and I am an iOS Developer Learner at Apple Developer Academy and currently working as a Programming Teacher at Timedoor Academy.',
            'cvUrl' => 'https://drive.google.com/file/d/1rE9VyVes2onhZLShqTv1wHWFjAIUIr-W/view?usp=sharing',
            'stats' => [
                ['value' => '3+', 'label' => 'Years in Tech Field'],
                ['value' => '15+', 'label' => 'Projects Done'],
                ['value' => '50+', 'label' => 'Students Taught'],
            ],
            'heroPhotos' => [
                'home/1.jpeg',
                'home/2.JPG',
                'home/3.jpeg',
                'home/4.JPG',
            ],
            'techStack' => [
                ['icon' => 'bxs-cat', 'label' => 'Scratch'],
                ['icon' => 'bx-bot', 'label' => 'PictoBlox'],
                ['icon' => 'bx-cube-alt', 'label' => 'Construct 3'],
                ['icon' => 'bx-joystick', 'label' => 'Pygame'],
                ['icon' => 'bx-game', 'label' => 'Phaser'],
                ['icon' => 'bxl-apple', 'label' => 'Swift'],
                ['icon' => 'bx-layout', 'label' => 'SwiftUI'],
                ['icon' => 'bxl-react', 'label' => 'React Native'],
                ['icon' => 'bxl-html5', 'label' => 'HTML5'],
                ['icon' => 'bxl-css3', 'label' => 'CSS3'],
                ['icon' => 'bxl-javascript', 'label' => 'Javascript'],
                ['icon' => 'bxl-python', 'label' => 'Python'],
                ['icon' => 'bxl-php', 'label' => 'PHP'],
                ['icon' => 'bxl-react', 'label' => 'React JS'],
                ['icon' => 'bx-server', 'label' => 'Laravel'],
                
                
            ],
        ]);
    }
}
