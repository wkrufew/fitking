<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprador extends Model
{
    protected $guarded = ['id','nombre_usuario','nombre_curso','id_usuario','id_plan'];
    use HasFactory;
}
