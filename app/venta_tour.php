<?php

namespace lasAcaciasCoffeeFarm;

use Illuminate\Database\Eloquent\Model;

class venta_tour extends Model
{
    protected $table = 'venta_tour';

    protected $fillable = ['cantidad', 'precio'];

     public function tour()
    {
        return $this->belongsTo('lasAcaciasCoffeeFarm\tour', 'foreign_key');
    }

    public function tiquete()
    {
        return $this->hasMany('lasAcaciasCoffeeFarm\tiquete', 'foreign_key');
    }
}
