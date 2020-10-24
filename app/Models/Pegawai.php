<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table='pegawai';
    protected $guarded=['id'];
    
    public function getdepartmen(){
        return $this->belongsTo('App\Models\ModelDepartmen','departmen_id');
    }
    public function getbank(){
        return $this->belongsTo('App\Models\Bank','bank_id');
    }
}