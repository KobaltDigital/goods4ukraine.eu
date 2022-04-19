<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Ad extends Model implements Auditable, HasMedia
{
    use HasFactory;
    use HasSlug;
    use SoftDeletes;
    use SpatialTrait;
    use \OwenIt\Auditing\Auditable;
    use HasTranslations;
    use Notifiable;
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

    public const PLACEHOLDER = '/img/beeldmerk-grijs.svg';

    public $translatable = ['translated_title', 'translated_description'];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function getCategoryAttribute()
    {
        return $this->categories()->first();
    }

    protected $spatialFields = ['location'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('images')
            ->singleFile()
            ->useFallbackUrl(self::PLACEHOLDER);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->crop('crop-center', 150, 150)
              ->sharpen(10);

        $this->addMediaConversion('medium')
              ->crop('crop-center', 350, 350)
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

    public function getHasPlaceholderAttribute()
    {
        return $this->getFirstMediaUrl('images', 'medium') && Str::contains($this->getFirstMediaUrl('images', 'medium'), self::PLACEHOLDER);
    }

    public function getLocationPairAttribute()
    {
        return optional($this->location)->toPair();
    }

    public function routeNotificationForSlack()
    {
        return env('SLACK_WEBHOOKS_TOKEN');
    }
}
