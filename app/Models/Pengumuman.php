<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Pengumuman extends Model
{
    use HasFactory, Sluggable;

    protected $guarded=['id'];
    protected $table='pengumuman';

    public function sluggable():array
    {
        return['slug'=>['source'=>'pengumuman']];
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
