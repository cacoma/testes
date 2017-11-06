<?php

namespace cacoma;

use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    //
	public function Cities()
    {
        return $this->hasMany('cacoma\City');
    }
	public function Countries()
    {
        return $this->belongsTo('cacoma\Country');
    }
}
