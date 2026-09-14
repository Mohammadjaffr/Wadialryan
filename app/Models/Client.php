<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasStoredImages;

class Client extends Model
{
    use HasFactory, HasStoredImages;

    protected $guarded = [];
}
