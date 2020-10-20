<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelDepartmen extends Model
{
    private $table='departmen';
    private $guarded=['id'];
    public function pegawai(){
        return $this->hasOne('App\Models\Pegawai','departemen_id');
    }
}