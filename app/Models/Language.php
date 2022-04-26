<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'title',
        'select_language_title',
        'locale',
        'locale_long',
    ];
}
