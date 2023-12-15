<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function expenseType(){
    	return $this->belongsTo(ExpenseType::class,'expenseType_id','id');
    }

    public function user(){
    	return $this->belongsTo(Employee::class,'user_id','id');
    }

    public function madeBy(){
    	return $this->belongsTo(Admin::class,'made_by_id','id');
    }

    public function approve(){
    	return $this->belongsTo(Admin::class,'approved_by','id');
    }
}
