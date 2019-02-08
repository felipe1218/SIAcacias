<?php

namespace lasAcaciasCoffeeFarm;

use Illuminate\Database\Eloquent\Model;

class tipo_producto extends Model
{
    protected $table = 'tipo_producto';

    protected $fillable = ['descripcion'];

     public function producto()
    {
        return $this->hasMany('lasAcaciasCoffeeFarm\producto', 'foreign_key');
    }
}
