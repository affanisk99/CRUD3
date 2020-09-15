<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    protected $table = "schools";
    protected $fillable = ['name','date_start','date_end','created_at','updated_at'];
}
