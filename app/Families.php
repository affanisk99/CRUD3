<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Families extends Model
{
    use SoftDeletes;
    protected $table="families";
    protected $dates=['deleted_at'];
    protected $fillable=['name','date_of_birth','education_degree'];
}
