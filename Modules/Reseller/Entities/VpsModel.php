<?php

namespace Modules\Reseller\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class VpsModel extends Model
{
    protected $table = 'vps';
    
    protected $fillable = [
        'server_ip',
        'server_name',
        'username',
        'password',
        'operating_system',
        'vpn_type',
        'vpn_connection',
        'port',
        'status',
    ];

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
