<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    //protected $table = 'rutas';
    protected $fillable = ['nombre'];

    public function ciudad()
    {
        // con esta función definimos la relación del usuario con el rol
        //return $this->belongsTo(Ciudad::class);
        return $this->belongsTo(Ciudad::class);

        //return $this->hasOne('App\Role', 'rol_id');
    }
}
