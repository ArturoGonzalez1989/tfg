<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Punto_has_Ruta extends Model
{
    protected $table = 'puntos_has_rutas';

    //protected $fillable = ['nombre'];

    public function ruta()
    {
        // con esta función definimos la relación del usuario con el rol
        return $this->belongsTo(Ruta::class);
        //return $this->hasOne('App\Role', 'rol_id');
    }
    //protected $fillable = ['nombre', 'descripcion', 'bandera'];

}
