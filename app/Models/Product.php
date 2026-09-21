<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Concerns\HasStoredImages;

class Product extends Model
{
    use HasFactory, HasTranslations, HasStoredImages;

    protected $guarded = [];

    protected $casts = [
        'gallery' => 'array',
    ];

    public $translatable = ['name', 'description', 'meta_title', 'meta_description'];
}
