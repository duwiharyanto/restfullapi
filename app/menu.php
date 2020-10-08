<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class menu extends Model
{
    protected $table='test';
    protected $guarded=['test_id'];
    // protected $primary_key='test_id';
    public $timestamps=false;
}
