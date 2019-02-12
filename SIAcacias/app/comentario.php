<?php

namespace lasAcaciasCoffeeFarm;

use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    protected $table = 'comentario';

    protected $fillable = ['nombre_turista', 'texto'];
}
