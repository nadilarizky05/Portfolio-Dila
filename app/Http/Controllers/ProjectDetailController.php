<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Response;

class ProjectDetailController extends Controller
{
    /** Sama seperti ProjectCategoryController, biar bentuk frame fotonya konsisten. */
    private const MEDIA_TYPES = [
        'ios-developer' => 'phone',
        'curriculum-maker' => 'square',
    ];

    public function show(ProjectCategory $projectCategory, Project $project)
    {
        if ($project->project_category_id !== $projectCategory->id) {
            abort(Response::HTTP_NOT_FOUND);
        }

        $project->load(['technologies', 'images' => fn ($query) => $query->orderBy('order')]);

        return view('projects.show', [
            'category' => $projectCategory,
            'project' => $project,
            'mediaType' => self::MEDIA_TYPES[$projectCategory->slug] ?? 'web',
        ]);
    }
}
