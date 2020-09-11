<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Divisions extends Model
{
    use SoftDeletes;
    protected $table="divisions";
    protected $dates=['deleted_at'];
}
