<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunidad extends Model
{
    protected $table = 'comunidades';

    public $timestamps = false;

    protected $fillable = ['nombre', 'descripcion', 'bandera'];

    // protected $fillable = ['nombre'];
    public function ciudad()
    {
        return $this->hasMany(Ciudad::class);
    }
}
