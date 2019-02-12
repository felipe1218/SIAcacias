<?php

namespace lasAcaciasCoffeeFarm;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $table = 'producto';

    protected $fillable = ['nombre', 'precio', 'cantidad'];

     public function tipo_producto()
    {
        return $this->belongsTo('lasAcaciasCoffeeFarm\tipo_producto', 'foreign_key');
    }

    public function granja()
    {
        return $this->hasOne('lasAcaciasCoffeeFarm\granja', 'foreign_key');
    }

    public function venta_producto()
    {
        return $this->belongsToMany('lasAcaciasCoffeeFarm\venta_producto');
    }
}
