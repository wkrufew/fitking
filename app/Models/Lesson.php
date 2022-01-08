<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = ['id'];
    
    use HasFactory;

    public function getCompletedAttribute()
    {
        return $this->users->contains(auth()->user()->id);
    }

    //relacion uno a uno

    public function description()
    {
        return $this->hasOne('App\Models\Description');
    }
 
    //relacion uno a muchos inversa

    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }

    public function platform()
    {
        return $this->belongsTo('App\Models\Platform');
    }

    //relacion muchos a muchos

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    //relacion uno a uno polimorfica

    public function resource()
    {
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }

    //relacion uno a muchos polimorfica

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions()
    {
        return $this->morphOne('App\Models\Reaction', 'reactionable');
    }
}
