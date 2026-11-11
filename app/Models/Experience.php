<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'parent_id',
        'title',
        'company',
        'logo',
        'start_date',
        'end_date',
        'description'
    ];

    // hasMany: aku punya banyak anak
    public function children()
    {
        return $this->hasMany(Experience::class, 'parent_id');
    }

    // aku milik 1 induk
    public function parent()
    {
        return $this->belongsTo(Experience::class, 'parent_id');
    }
}
