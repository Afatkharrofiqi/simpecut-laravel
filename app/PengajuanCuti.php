<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{

    protected $guarded = ['_token'];

    public function pegawai(){
        return $this->belongsTo('App\Pegawai');
    }

    public function jenis_cuti(){
        return $this->belongsTo('App\JenisCuti');
    }

    public function status_cuti(){
        return $this->belongsTo('App\StatusCuti');
    }
}
