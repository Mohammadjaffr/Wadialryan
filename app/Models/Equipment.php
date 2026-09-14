<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Concerns\HasStoredImages;

class Equipment extends Model
{
    use HasFactory, HasTranslations, HasStoredImages;

    protected $guarded = [];

    protected $casts = [
        'gallery' => 'array',
    ];

    public $translatable = ['name', 'description', 'specifications', 'meta_title', 'meta_description'];

    public function category()
    {
        return $this->belongsTo(EquipmentCategory::class, 'category_id');
    }
}
