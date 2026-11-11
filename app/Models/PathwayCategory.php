<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PathwayCategory extends Model
{
    protected $fillable = ['pathway_id', 'name'];

    public function pathway()
    {
        return $this->belongsTo(Pathway::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
