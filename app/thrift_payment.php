<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thrift_payment extends Model
{
    //
    protected $dates = ['start_time','made_time'];

    protected $fillable = [

        'reference_id', 'user_id', 'amount',

    ];
    public function user(){

        return $this->belongsTo('App\User');

    }

    public function thrift(){

        return $this->belongsTo('App\thrift_payment');

    }
}
