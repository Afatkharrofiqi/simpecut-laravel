<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
//    protected $casts = [
//        'id' => 'string'
//    ];

    public $incrementing = false;

    public function akun(){
        return $this->belongsTo('App\Akun');
    }
}
