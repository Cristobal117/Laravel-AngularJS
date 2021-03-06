<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'id', 
        'nombre', 
        'email',
        'telefono',
        'direccion'
    ];
}
