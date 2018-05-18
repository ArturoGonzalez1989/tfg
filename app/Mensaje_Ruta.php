<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje_Ruta extends Model
{
    protected $table = 'mensajes_rutas';
    // Para evitar la problemática de la protección masiva y evitar que los usuarios malintencionados introduzcan datos que no se deben en la bd se utiliza esto:
    protected $fillable = ['nombre', 'email', 'mensaje', 'ruta_id', 'user_id'];

    public function ruta()
    {
        // con esta función definimos la relación del usuario con el rol
        return $this->belongsTo(Ruta::class);
        //return $this->hasOne('App\Role', 'rol_id');
    }

    public function user()
    {
        // con esta función definimos la relación del usuario con el rol
        return $this->belongsTo(User::class);
        //return $this->hasOne('App\Role', 'rol_id');
    }
}
