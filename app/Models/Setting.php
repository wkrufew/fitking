<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'banco', 
        'shipping_charge', 
        'shopname', 
        'email', 
        'phone', 
        'adderss', 
        'cuenta',
        'tipocuenta',
        'beneficiario',
        'cedula'
    ];
}
