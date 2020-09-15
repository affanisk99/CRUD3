<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Employees extends Model
{
    use SoftDeletes;
    	protected $table="employees";
      protected $dates=['deleted_at'];

   public function Divisions(){
   	return $this->hasOne(Divisions::class,'id','division_id');
   }

   public function Positions(){
   	return $this->hasOne(Positions::class,'id','position_id');
   }
   public function Companies(){
   	return $this->hasOne(Companies::class,'id','company_id');
   }
   public function families(){
    return $this->hasMany(Families::class,'employee_id','id');
   }
}
