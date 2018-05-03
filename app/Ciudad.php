<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';

    protected $fillable = ['nombre', 'descripcion', 'comunidad_id', 'portada'];
    public $timestamps  = false;

    public function comunidad()
    {
        // con esta función definimos la relación del usuario con el rol
        return $this->belongsTo(Comunidad::class);
        //return $this->hasOne('App\Role', 'rol_id');
    }

}
