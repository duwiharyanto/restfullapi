<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table='pegawai';
    protected $guarded=['id'];
    
    public function getdepartmen(){
        return $this->belongsTo('App\Models\ModelDepartmen');
        //return $this->hasMany('App\Models\ModelDepartmen','id');
    }
}