<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxTaskProject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function admin(){
    	return $this->belongsTo(Admin::class,'assign_to','id');
    }

    public function user(){
    	return $this->belongsTo(Admin::class,'assigned_by','id');
    }

    public function project(){
    	return $this->belongsTo(TaxProject::class,'project_list','id');
    }

    public function customer(){
    	return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function made_by(){
    	return $this->belongsTo(Admin::class,'logged_in_user','id');
    }
}
