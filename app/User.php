<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'unique_code',
        'role_id',
        'customer_id',
        'reseller_id',
        'two_factor_auth',
        'is_developer',
        'gender',
        'sound',
        'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    function role(){
        return $this->hasOne(\Modules\Setups\Entities\Role::class,'id','role_id');
    }

    function reseller(){
        return $this->hasOne(\Modules\Reseller\Entities\ResellerModel::class,'id','reseller_id');
    }

    function customer(){
        return $this->hasOne(\Modules\Customer\Entities\Customer::class,'id','customer_id');
    }
}
