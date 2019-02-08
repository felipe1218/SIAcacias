<?php

namespace lasAcaciasCoffeeFarm;

use Illuminate\Database\Eloquent\Model;

class venta_producto extends Model
{
    protected $table = 'venta_producto';

    protected $fillable = ['precio', 'cantidad'];

     public function producto()
    {
        return $this->belongsToMany('lasAcaciasCoffeeFarm\producto');
    }
}
