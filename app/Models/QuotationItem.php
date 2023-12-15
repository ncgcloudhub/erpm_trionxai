<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
    	return $this->belongsTo(Product::class,'product_id','id');
    }

    public function sales(){
    	return $this->belongsTo(Sales::class,'sale_id','id');
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
