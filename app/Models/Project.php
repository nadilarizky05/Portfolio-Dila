<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'project_category_id', 'title', 'slug', 'description', 'about_app', 'who_its_for', 'features', 'my_role', 'challenges', 'impact',
        'cover_image',
        'primary_link_label', 'primary_link_url',
        'secondary_link_label', 'secondary_link_url',
        'submitted_to_name', 'submitted_to_url',
    ];

    protected $casts = [
        'features' => 'array',
    ];

    protected static function booted(): void
    {
        static::creating(function (Project $project) {
            if (! $project->slug) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
