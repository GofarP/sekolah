<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory, Sluggable;
    protected $guarded=['id'];
    protected $table='kategori';

    public function sluggable():array
    {
        return[
            'slug' => [
                'source' => 'kategori'
            ]
        ];
    }

    public function getrouteKeyName()
    {
        return 'slug';
    }  


    public function user()
    {
       return $this->belongsTo(User::class);
    }


}
