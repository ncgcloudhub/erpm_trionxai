<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customer(){
    	return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function chalan(){
    	return $this->belongsTo(Chalan::class,'chalan_id','id');
    }

    public function user(){
    	return $this->belongsTo(Admin::class,'user_id','id');
    }

}
