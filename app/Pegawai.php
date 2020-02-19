<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function jabatan(){
        return $this->belongsTo('App\Jabatan');
    }

    public function departemen(){
        return $this->belongsTo('App\Departemen');
    }
}
