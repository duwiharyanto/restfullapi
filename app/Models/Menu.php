<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Menu extends Model
{
    protected $table='test';
    protected $guarded=['test_id'];
    // protected $primary_key='test_id';
    public $timestamps=false;
}
