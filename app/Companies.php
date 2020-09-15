<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Companies extends Model
{
    use SoftDeletes;
    protected $table = "companies";
    protected $dates = ['deleted_at'];
    protected $fillable = ['code','name','description','created_at','updated_at'];
    public function branches(){
    	return $this->hasMany(Branches::class,'company_id','id');
    }
}
