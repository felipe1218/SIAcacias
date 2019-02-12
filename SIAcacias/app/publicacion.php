<?php

namespace lasAcaciasCoffeeFarm;

use Illuminate\Database\Eloquent\Model;

class publicacion extends Model
{
    protected $table = 'publicacion';

    protected $fillable = ['titulo', 'resumen', 'texto'];
}
