<?php

namespace lasAcaciasCoffeeFarm;

use Illuminate\Database\Eloquent\Model;

class tiquete extends Model
{
    protected $table = 'tiquete';

    protected $fillable = ['numero', 'precio', 'estado'];

     public function hospedaje()
    {
        return $this->belongsTo('lasAcaciasCoffeeFarm\hospedaje', 'foreign_key');
    }

    public function venta_tour()
    {
        return $this->belongsTo('lasAcaciasCoffeeFarm\venta_tour', 'foreign_key');
    }
}
