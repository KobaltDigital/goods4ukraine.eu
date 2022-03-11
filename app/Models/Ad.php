<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ad extends Model
{
    use HasFactory, SoftDeletes, SpatialTrait;
    protected $fillable = [];
    protected $spatialFields = ['location'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
