<?php

namespace lasAcaciasCoffeeFarm;

use Illuminate\Database\Eloquent\Model;

class tipo_tour extends Model
{
    protected $table = 'tipo_tour';

    protected $fillable = ['descripcion'];

     public function tour()
    {
        return $this->hasMany('lasAcaciasCoffeeFarm\tour', 'foreign_key');
    }
}
