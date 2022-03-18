<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Ad extends Model implements Auditable, HasMedia
{
    use HasFactory;
    use HasSlug;
    use SoftDeletes;
    use SpatialTrait;
    use \OwenIt\Auditing\Auditable;
    use InteractsWithMedia;

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

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->crop('crop-center', 150, 150);

        $this->addMediaConversion('medium')
              ->width(300)
              ->height(300)
              ->sharpen(10);

              $this->addMediaConversion('single')
              ->width(750)
              ->height(750)
              ->sharpen(10);

              $this->addMediaConversion('large')
              ->width(2000)
              ->height(1500)
              ->sharpen(10);
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
