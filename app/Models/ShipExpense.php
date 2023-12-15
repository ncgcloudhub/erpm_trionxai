<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipExpense extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function expenseType(){
    	return $this->belongsTo(ShipExpenseType::class,'expenseType_id','id');
    }
    public function madeBy(){
    	return $this->belongsTo(Admin::class,'made_by_id','id');
    }
    public function approve(){
    	return $this->belongsTo(Admin::class,'approved_by','id');
    }
}
