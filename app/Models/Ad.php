<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Ad extends Model implements Auditable
{
    use HasFactory;
    use HasSlug;
    use SoftDeletes;
    use SpatialTrait;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'type',
        'street',
        'postcode',
        'city',
        'country',
    ];

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
