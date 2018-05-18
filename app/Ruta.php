<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    //protected $table = 'rutas';
    protected $fillable = ['nombre', 'ciudad_id', 'descripcion', 'creador_id'];

    public function ciudad()
    {
        // con esta función definimos la relación del usuario con el rol
        //return $this->belongsTo(Ciudad::class);
        return $this->belongsTo(Ciudad::class);

        //return $this->hasOne('App\Role', 'rol_id');
    }

    public function creador()
    {
        return $this->belongsTo(User::class);
    }

    public function tematicas()
    {
        // con esta función definimos la relación del usuario con el rol
        return $this->belongsToMany(Tematica::class, 'rutas_has_tematicas');
        //return $this->hasOne('App\Role', 'rol_id');
    }

    public function puntos()
    {
        // con esta función definimos la relación del usuario con el rol
        return $this->belongsToMany(Punto::class, 'puntos_has_rutas');
        //return $this->hasOne('App\Role', 'rol_id');
    }

    public function mensajes()
    {
        return $this->hasMany(Mensaje_Ruta::class);
    }
}
