<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConveyanceItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function conveyances(){
    	return $this->belongsTo(Conveyance::class,'conveyance_id','id');
    }
}
