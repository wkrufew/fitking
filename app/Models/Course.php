<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $guarded = ['id','status'];

    /* protected $withCount = ['students','reviews']; */

    use HasFactory;

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    /* public function getRatingAttribute()
    {
        if($this->reviews_count)
        {
            return round($this->reviews->avg('rating'),1);
        }else{
            return 5;
        }  
    } */
    /* return $query->whereIn('category_id', $categorias); */
    public function scopeCategorias($query, $categorias)
    {
        if ($categorias) {
            return $query->where('category_id', $categorias);
        }
        
        return $query;
    }

    public function scopeNiveles($query, $niveles)
    {
        if ($niveles) {
            return $query->where('level_id', $niveles);
        }
        
        return $query;
    }

    public function getRouteKeyName()
    {
       return "slug"; 
    }

    //relacion uno a muchos

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function requirements()
    {
        return $this->hasMany('App\Models\Requirement');
    }
     
    public function goals()
    {
        return $this->hasMany('App\Models\Goal');
    }

    public function audiences()
    {
        return $this->hasMany('App\Models\Audience');
    }

    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }
    //relacion uno a muchos inversa

    public function teacher()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level'); 
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function price()
    {
        return $this->belongsTo('App\Models\Price');
    } 

    // realcion muchos  muchos 
    public function students()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }

    //relacion uno a uno polimorfica

    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function lessons()
    {
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }
    public function resource()
    {
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }
}
