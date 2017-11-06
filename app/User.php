<?php

namespace cacoma;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use cacoma\Invest;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'sex', 'birthdate', 'etnia', 'estado_civil', 'cidade', 'uf', 'pais', 'email', 'password','role',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function role()
    {
        return $this->hasOne(Role::Class);
    }
	public function invests()
    {
        return $this->hasMany(Invest::Class,'id','user_id');
    }
}
