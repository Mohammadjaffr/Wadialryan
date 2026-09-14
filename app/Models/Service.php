<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Concerns\HasStoredImages;

class Service extends Model
{
    use HasFactory, HasTranslations, HasStoredImages;

    protected $guarded = [];

    protected $casts = [
        'gallery' => 'array',
    ];

    public $translatable = [
        'title', 
        'short_description', 
        'full_description', 
        'description', // Legacy
        'capabilities', 
        'scope_of_work', 
        'applications', 
        'meta_title', 
        'meta_description'
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
