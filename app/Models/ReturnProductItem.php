<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnProductItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
    	return $this->belongsTo(Product::class,'product_id','id');
    }

    public function returns(){
    	return $this->belongsTo(ReturnProduct::class,'return_id','id');
    }

    public function return()
    {
        return $this->belongsTo(ReturnProduct::class);
    }
}
