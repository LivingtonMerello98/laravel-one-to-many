<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'url', 'image', 'title', 'description', 'languages'
    ];

    public function getLanguagesArrayAttribute()
    {
        return explode(',', $this->languages);
    }

    public function setLanguagesArrayAttribute($value)
    {
        $this->attributes['languages'] = implode(',', $value);
    }
}
