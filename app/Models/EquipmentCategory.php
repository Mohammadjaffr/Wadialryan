<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class EquipmentCategory extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];

    public $translatable = ['name'];

    public function equipment()
    {
        return $this->hasMany(Equipment::class, 'category_id');
    }
}
