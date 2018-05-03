<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    // Para evitar la problemática de la protección masiva y evitar que los usuarios malintencionados introduzcan datos que no se deben en la bd se utiliza esto:
    protected $fillable = ['nombre', 'email', 'mensaje'];
}
