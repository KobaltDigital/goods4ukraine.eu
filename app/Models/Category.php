<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];

    public $fillable = [
        'name',
        'icon',
        'color',
    ];

    public function ads()
    {
        return $this->belongsToMany(Ad::class)->withTimestamps();
    }
}
