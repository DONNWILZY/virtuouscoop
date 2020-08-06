<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thrift extends Model
{
    //
    protected $dates = ['start_time','made_time'];

    protected $fillable = [

        'cyclename', 'cycle', 'name', 'reference_id','numbers','amount','status','start_time',

    ];
    public function user(){

        return $this->belongsTo('App\User');

    }

    public function thrift(){

        return $this->belongsTo('App\thrift');

    }
}
