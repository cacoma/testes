<?php

namespace cacoma;

use Illuminate\Database\Eloquent\Model;
use cacoma\User;

class Invest extends Model
{
    //
    protected $fillable = ['name','type','user_id'];

    public function user()
    {
        return $this->belongsTo(User::Class,'user_id','id');
    }
}
?>
