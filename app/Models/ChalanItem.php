<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChalanItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
    	return $this->belongsTo(Product::class,'product_id','id');
    }

    public function chalans(){
    	return $this->belongsTo(Chalan::class,'chalan_id','id');
    }

    public function chalan()
    {
        return $this->belongsTo(Chalan::class);
    }
}
