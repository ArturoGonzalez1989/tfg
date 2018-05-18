<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Punto extends Model
{
    protected $fillable = ['nombre', 'ciudad_id', 'descripcion', 'coste'];

    public function ciudad()
    {
        // con esta función definimos la relación del usuario con el rol
        return $this->belongsTo(Ciudad::class);
        //return $this->hasOne('App\Role', 'rol_id');
    }

    public function rutas()
    {
        // con esta función definimos la relación del usuario con el rol
        return $this->belongsToMany(Ruta::class, 'puntos_has_rutas');
        //return $this->hasOne('App\Role', 'rol_id');
    }

    public function mensajes()
    {
        return $this->hasMany(Mensaje_Punto::class);
    }
}
