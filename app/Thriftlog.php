<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TriftLog extends Model
{
    //
    protected $fillable = [

        'thrift_id', 'user_id', 'reference_id','amount',

    ];
    public function user(){

        return $this->belongsTo('App\User');

    }
    public function invest(){

        return $this->belongsTo('App\Thrift');

    }
}
