<?php

namespace App\Http\Controllers;

use App\Models\DocumentationClassPhoto;
use App\Models\Pathway;
use App\Models\PtmDocumentation;
use App\Models\StudentPresentationVideo;
use App\Models\TeachingAchievement;
use App\Models\TeamMember;

class CodingMentorController extends Controller
{
    public function index()
    {
        return view('projects.coding-mentor', [
            'whyTeacherParagraphs' => [
                "Being a teacher means I have the privilege to help someone become a little better than they were yesterday.",
                "I love knowing that my time can mean something to someone else. Maybe they go home with a new skill, a new way of thinking, or simply the courage to say <b>“I can do this”</b>. For me, teaching is not only about sharing knowledge. It is about helping someone believe in themselves and feel <b>“Yes, I can”</b>",
                "I have been teaching kids to code for almost 3 years, and I always try to find the best way for each student to learn. Sometimes, that means explaining coding in what I call “Kid Language”. I also encourage them to explain things in their own words or teach their friends, because I believe confidence grows when they realize “I actually understand this.”",
                'My favorite moment is seeing them present their projects and feel proud of what they created. Seeing how they grow, not only in their skills but also in how they believe in themselves, is what makes me want to keep teaching.',
                "Because maybe, I’m not only teaching them how to code.",
                "<b>I’m helping them believe “I can”.</b>",
            ],
            'achievements' => TeachingAchievement::orderBy('id')->get(),
            'achievementsIntro' => "Achievements from my students throughout their coding journey with me, from awards to competitions.",
            'ptmDocumentations' => PtmDocumentation::orderBy('order')->get(),
            'ptmIntro' => "PTM (Parents-Teacher Meeting) is when students present their Final Project to their parents, and also a chance for teachers and parents to discuss the student's progress in class.",
            'teamMembers' => TeamMember::orderBy('order')->get(),
            'teamIntro' => 'The Timedoor Academy Bali team who work with me to support the teaching and learning process.',
            'pathways' => Pathway::with(['categories.courses'])->orderBy('id')->get(),
            'teachIntro' => 'The pathways I teach at Timedoor Academy, grouped by student age from Junior to Pro.',
            'documentationPhotos' => DocumentationClassPhoto::orderBy('order')->get(),
            'documentationIntro' => 'Photos from the coding classroom, capturing the teaching and learning atmosphere with my students.',
            'presentationVideos' => StudentPresentationVideo::orderBy('order')->get(),
            'presentationIntro' => 'Videos of students presenting their Final Projects. Click a thumbnail to watch it on YouTube.',
        ]);
    }
}
