<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conveyance extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employee(){
    	return $this->belongsTo(Employee::class,'employee_id','id');
    }

    public function user(){
    	return $this->belongsTo(Admin::class,'user_id','id');
    }

    public function approve(){
    	return $this->belongsTo(Admin::class,'approved_by','id');
    }
}
