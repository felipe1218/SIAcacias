<?php

namespace lasAcaciasCoffeeFarm;

use Illuminate\Database\Eloquent\Model;

class hospedaje extends Model
{
    protected $table = 'hospedaje';

    protected $fillable = ['nombre'];

     public function granja()
    {
        return $this->hasOne('lasAcaciasCoffeeFarm\granja', 'foreign_key');
    }

    public function tiquete()
    {
        return $this->hasMany('lasAcaciasCoffeeFarm\tiquete', 'foreign_key');
    }
    
}
