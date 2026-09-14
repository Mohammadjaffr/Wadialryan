<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Concerns\HasStoredImages;

class Industry extends Model
{
    use HasFactory, HasTranslations, HasStoredImages;

    protected $guarded = [];

    public $translatable = ['name', 'description', 'meta_title', 'meta_description'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
