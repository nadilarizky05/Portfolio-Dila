<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Publication;
use App\Models\Volunteering;

class AboutController extends Controller
{
    public function index()
    {
        $experiences = Experience::whereNull('parent_id')
            ->with(['children' => function ($query) {
                $query->orderByRaw('(end_date IS NULL) DESC')
                    ->orderByRaw('COALESCE(end_date, start_date) DESC');
            }])
            ->orderByRaw('(end_date IS NULL) DESC')
            ->orderByRaw('COALESCE(end_date, start_date) DESC')
            ->get();

        $educations = Education::orderByRaw('(end_date IS NULL) DESC')
            ->orderByRaw('COALESCE(end_date, start_date) DESC')
            ->get();

        $achievements = Achievement::orderByDesc('date')->get();

        $publications = Publication::orderByDesc('published_at')->get();

        $volunteerings = Volunteering::orderByDesc('start_date')->get();

        return view('about', [
            'experiences' => $experiences,
            'educations' => $educations,
            'achievements' => $achievements,
            'publications' => $publications,
            'volunteerings' => $volunteerings,
            'aboutText' => [
                "Hi, I'm Dila, an eighth-semester Information Systems student at Open University, an iOS Developer Learner at Apple Developer Academy Bali, and a Programming Teacher at Timedoor Academy.",
                "I'm passionate about IT education, both in teaching and learning processes. Beyond the classroom, I'm diving into the tech industry itself, gaining hands-on experience, tackling real-world problems, and learning what it takes to overcome challenges in the field. I'm open to every opportunity that pushes me to grow.",
                "Right now, I'm focusing on iOS and web development, and I'm actively seeking full-time roles in these areas. That said, I'm always open to exploring other paths where I can keep learning and make a real impact.",
            ],
        ]);
    }
}
