<?php

namespace lasAcaciasCoffeeFarm;

use Illuminate\Database\Eloquent\Model;

class tour extends Model
{
    protected $table = 'tour';

    protected $fillable = ['precio'];

     public function tipo_tour()
    {
        return $this->belongsTo('lasAcaciasCoffeeFarm\tipo_tour', 'foreign_key');
    }

    public function granja()
    {
        return $this->hasOne('lasAcaciasCoffeeFarm\granja', 'foreign_key');
    }

    public function venta_tour()
    {
        return $this->hasMany('lasAcaciasCoffeeFarm\venta_tour', 'foreign_key');
    }
}
