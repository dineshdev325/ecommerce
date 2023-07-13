<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $fillable=['product_details_id','users_id','quantity'];
    public function product_detail(){
        return $this->belongsTo(ProductDetail::class,'product_details_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'users_id');
    }
}
