<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificates extends Model
{
     protected $table = "certificates";
     protected $fillable = ['name','date','description','created_at','updated_at'];
}
