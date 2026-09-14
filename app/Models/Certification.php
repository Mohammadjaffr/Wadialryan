<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Concerns\HasStoredImages;

class Certification extends Model
{
    use HasFactory, HasTranslations, HasStoredImages;

    protected $guarded = [];

    protected $casts = [
        'issue_date' => 'date',
        'expiry_date' => 'date',
    ];

    public $translatable = ['name', 'description'];
}
