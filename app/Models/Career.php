<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Career extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];

    protected $casts = [
        'closing_date' => 'date',
    ];

    public $translatable = ['title', 'location', 'description', 'requirements'];

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
