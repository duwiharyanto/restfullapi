<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelDepartmen extends Model
{
    protected $table='departmen';
    protected $guarded=['id'];
    
    public function getpegawai(){
        return $this->hasMany('App\Models\Pegawai','iddepartmen');
        //return $this->belongsTo('App\Models\Pegawai');
    }
}