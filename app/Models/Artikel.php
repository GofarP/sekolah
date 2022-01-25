<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Artikel extends Model
{
    use HasFactory, Sluggable;
    protected $guarded=['id'];
    protected $table='artikel';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getrouteKeyName()
    {
        return 'slug';
    }  

    public function user()
    {
         return $this->belongsTo(Kategori::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'category_id');
    }

    
}
