<?php

namespace Modules\Reseller\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ResellerModel extends Model
{
    protected $table = 'reseller';
    
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'address',
        'username',
        'password',
        'from_date',
        'to_date',
        'user_limit',
        'billing_system',
        'status',
    ];


    public function admin()
    {
    	return $this->hasOne(\App\User::class,'reseller_id','id');
    }

    public function customer()
    {
    	return $this->hasMany(\Modules\Customer\Entities\Customer::class);
    }

    // boot() function used to insert logged user_id at 'created_by' & 'updated_by'
    public static function boot(){
        parent::boot();
        static::creating(function($query){
            if(Auth::check()){
                $query->created_by = @\Auth::user()->id;
            }
        });
        static::updating(function($query){
            if(Auth::check()){
                $query->updated_by = @\Auth::user()->id;
            }
        });
    }
}
