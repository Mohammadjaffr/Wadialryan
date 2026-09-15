<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Concerns\HasStoredImages;

class Project extends Model
{
    use HasFactory, HasTranslations, HasStoredImages;

    protected $guarded = [];

    protected $casts = [
        'start_date' => 'date',
        'completion_date' => 'date',
        'gallery' => 'array',
        'before_gallery' => 'array',
        'after_gallery' => 'array',
        'images' => 'array', // Legacy
    ];

    public $translatable = [
        'title',
        'location',
        'short_description',
        'full_description',
        'description', // Legacy
        'scope_of_work',
        'challenges',
        'solutions',
        'results',
        'meta_title',
        'meta_description'
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    protected static function booted()
    {
        static::saving(function ($project) {
            $fullDesc = $project->getTranslations('full_description');
            if (empty($fullDesc)) {
                $project->setTranslations('description', ['ar' => '', 'en' => '']);
            } else {
                $project->setTranslations('description', $fullDesc);
            }
        });
    }
}
