<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        // con esta función definimos la relación del usuario con el rol
        return $this->belongsTo(Role::class);
        //return $this->hasOne('App\Role', 'rol_id');
    }

    public function tematicas()
    {
        // con esta función definimos la relación del usuario con el rol
        return $this->belongsToMany(Tematica::class, 'users_has_tematicas');
        //return $this->hasOne('App\Role', 'rol_id');
    }

    public function mensajes()
    {
        return $this->hasMany(Mensaje::class);
    }
    // public function mensajes()
    // {
    //     // con esta función definimos la relación del usuario con el rol
    //     return $this->hasMany(Mensaje::class);
    //     //return $this->hasOne('App\Role', 'rol_id');
    // }
}
