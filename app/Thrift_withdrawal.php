<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thrift_withdrawal extends Model
{
    //

    protected $fillable = [
        'transaction_id', 'thrift_id', 'user_id', 'bank','amount','status',
    ];

    public function user(){

        return $this->belongsTo('App\User');

    }



}
