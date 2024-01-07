<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
    	return $this->belongsTo(Product::class,'product_id','id');
    }

    public function course(){
    	return $this->belongsTo(Course::class,'product_id','id');
    }

    public function sales(){
    	return $this->belongsTo(Sales::class,'sale_id','id');
    }

    public function sale()
    {
        return $this->belongsTo(Sales::class);
    }

    public function products()
{
    return $this->belongsTo(Product::class, 'product_id');
}

}
