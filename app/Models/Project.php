<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasTranslations;

    protected $guarded = [];

    public $translatable = ['title', 'description', 'location'];

    protected $casts = [
        'images' => 'array',
        'completion_date' => 'date',
    ];
}
