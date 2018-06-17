<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $fillable = ['nombre', 'ciudad_id', 'descripcion', 'creador_id', 'votos', 'id'];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function creador()
    {
        return $this->belongsTo(User::class);
    }

    public function tematicas()
    {
        return $this->belongsToMany(Tematica::class, 'rutas_has_tematicas');
    }

    public function puntos()
    {
        return $this->belongsToMany(Punto::class, 'puntos_has_rutas');
    }

    public function mensajes()
    {
        return $this->hasMany(Mensaje_Ruta::class);
    }
}
