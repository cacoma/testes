<?php

namespace cacoma;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
	public function Ufs()
    {
        return $this->belongsTo('cacoma\Uf');
    }
}
