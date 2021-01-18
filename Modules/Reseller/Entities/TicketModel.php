<?php

namespace Modules\Reseller\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class TicketModel extends Model
{
    protected $table = 'support_ticket';
    
    protected $fillable = [
        'reseller_id',
        'ticket_option',
        'name',
        'email',
        'subject',
        'description',
        'image',
        'status'
    ];

     function reseller(){
        return $this->hasOne(\Modules\Reseller\Entities\ResellerModel::class,'id','reseller_id');
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
