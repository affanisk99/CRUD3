<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    protected $table = "branches";
    protected $fillable = ['name','address','created_at','updated_at'];
}
