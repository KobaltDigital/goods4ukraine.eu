<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ad extends Model implements Auditable
{
    use HasFactory;
    use HasSlug;
    use SoftDeletes;
    use SpatialTrait;
    use \OwenIt\Auditing\Auditable;
    use HasTranslations;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'type',
        'street',
        'postcode',
        'city',
        'country',
        'translated_title',
        'translated_description',
    ];

    public $translatable = ['translated_title', 'translated_description'];

    protected $spatialFields = ['location'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
