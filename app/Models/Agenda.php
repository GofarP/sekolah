<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Agenda extends Model
{
    use HasFactory, Sluggable;
    protected $guarded=['id'];
    protected $table='agenda';

    public function sluggable():array
    {
        return [
            'slug' =>['source' => 'agenda']
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
