<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje_Punto extends Model
{
    protected $table = 'mensajes_puntos';
    // Para evitar la problemática de la protección masiva y evitar que los usuarios malintencionados introduzcan datos que no se deben en la bd se utiliza esto:
    protected $fillable = ['nombre', 'email', 'mensaje', 'punto_id', 'user_id'];

    public function punto()
    {
        // con esta función definimos la relación del usuario con el rol
        return $this->belongsTo(Punto::class);
        //return $this->hasOne('App\Role', 'rol_id');
    }

    public function user()
    {
        // con esta función definimos la relación del usuario con el rol
        return $this->belongsTo(User::class);
        //return $this->hasOne('App\Role', 'rol_id');
    }
}
