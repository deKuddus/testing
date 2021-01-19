<?php

namespace Modules\Customer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class Customer extends Model
{
	protected $table = 'customers';

    protected $fillable = [
    	'reseller_id',
        'package_id',
        'name',
        'email',
        'mobile',
        'username',
        'password',
        'unique_code',
        'address',
        'from_date',
        'to_date',
        'billing_system',
        'billing_status',
        'status',
    ];

    public function reseller(){
        return $this->belongsTo(ResellerModel::class);
    }

    public function package()
    {
        return $this->hasOne(\Modules\Package\Entities\PackageModel::class,'id','package_id');
    }

    public function admin($reseller_id)
    {
        $name=\App\User::where('reseller_id',$reseller_id)->first(['name']);
        return $name->name;
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
