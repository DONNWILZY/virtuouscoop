<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thrift_member extends Model
{
    //
  
    protected $fillable = [

        'thrift_id', 'user_id', 'thrift_name', 'reference_id','number', 'amount', 'status','start_time', 'update_at',

    ];
   
    public function thrift(){

        return $this->belongsTo('App\thrift_member');

    }
}
