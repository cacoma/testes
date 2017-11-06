<?php

namespace cacoma;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = ['type'];

    const ROLE_ADMIN = 'admin';
    const ROLE_EDITOR = 'editor';

}
