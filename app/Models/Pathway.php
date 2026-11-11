<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pathway extends Model
{
    protected $fillable = ['name', 'age_range'];

    public function categories()
    {
        return $this->hasMany(PathwayCategory::class);
    }
}
