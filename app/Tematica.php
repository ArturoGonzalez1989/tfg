<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tematica extends Model
{
    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function users()
    {
        // con esta función definimos la relación del usuario con el rol
        return $this->belongsToMany(User::class, 'users_has_tematicas');
        //return $this->hasOne('App\Role', 'rol_id');
    }

    // public function rutas()
    // {
    //     // con esta función definimos la relación del usuario con el rol
    //     return $this->belongsToMany(Ruta::class, 'rutas_has_tematicas');
    //     //return $this->hasOne('App\Role', 'rol_id');
    // }
}
