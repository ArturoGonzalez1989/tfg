<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_has_Preferencia extends Model
{
    protected $table = 'users_has_preferencias';

    //protected $fillable = ['nombre'];

    public function preferencia()
    {
        // con esta función definimos la relación del usuario con el rol
        return $this->belongsTo(Preferencia::class);
        //return $this->hasOne('App\Role', 'rol_id');
    }
    //protected $fillable = ['nombre', 'descripcion', 'bandera'];

}
