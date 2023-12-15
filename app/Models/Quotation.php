<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function customer(){
    	return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function user(){
    	return $this->belongsTo(Admin::class,'user_id','id');
    }

    public function saleItems()
    {
        return $this->hasMany(SalesItem::class);
    }

}
