<?php

namespace lasAcaciasCoffeeFarm;

use Illuminate\Database\Eloquent\Model;

class granja extends Model
{
    protected $table = 'granja';

    protected $fillable = ['nombre'];

     public function hospedaje()
    {
        return $this->belongsTo('lasAcaciasCoffeeFarm\hospedaje', 'foreign_key');
    }

    public function tour()
    {
        return $this->belongsTo('lasAcaciasCoffeeFarm\tour', 'foreign_key');
    }

    public function producto()
    {
        return $this->belongsTo('lasAcaciasCoffeeFarm\producto', 'foreign_key');
    }
}
