<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategory;

class ProjectCategoryController extends Controller
{
    /** Bentuk frame foto per kategori: 'phone' (portrait), 'square' (1:1), atau 'web' (landscape, default). */
    private const MEDIA_TYPES = [
        'ios-developer' => 'phone',
        'curriculum-maker' => 'square',
    ];

    public function show(ProjectCategory $projectCategory)
    {
        $projects = $projectCategory->projects()
            ->with(['technologies', 'images' => fn ($query) => $query->orderBy('order')])
            ->get();

        return view('projects.category', [
            'category' => $projectCategory,
            'projects' => $projects,
            'mediaType' => self::MEDIA_TYPES[$projectCategory->slug] ?? 'web',
        ]);
    }
}
