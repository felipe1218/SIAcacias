<?php

namespace lasAcaciasCoffeeFarm;

use Illuminate\Database\Eloquent\Model;

class PublicacionIngles extends Model
{
    protected $table = 'publicacion_ingles';

    protected $fillable = ['titulo', 'resumen', 'texto'];
}
