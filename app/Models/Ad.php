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
    use HasTranslations;
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
        'location',
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

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->crop('crop-center', 150, 150)
              ->sharpen(10);

        $this->addMediaConversion('medium')
              ->crop('crop-center', 150, 150)
              ->sharpen(10);

              $this->addMediaConversion('single')
              ->width(750)
              ->height(750)
              ->sharpen(10);

              $this->addMediaConversion('large')
              ->width(2000)
              ->height(1500);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTitleTranslatedAttribute()
    {
        return $this->translated_title ?: $this->title;
    }

    public function getDescriptionTranslatedAttribute()
    {
        return $this->translated_description ?: $this->description;
    }
}
