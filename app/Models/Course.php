<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'pathway_category_id', 'title', 'description',
        'thumbnail', 'platform_name', 'platform_url',
    ];

    public function category()
    {
        return $this->belongsTo(PathwayCategory::class, 'pathway_category_id');
    }
}
