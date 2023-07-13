<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $fillable=['product_names_id','product_colors_id','product_sizes_id','price','image'];
    public function cart_detail(){
        return $this->hasMany(CartDetail::class,'product_details_id');
    }
    public function product_name(){
        return $this->belongsTo(ProductName::class,'product_names_id');
    }
    public function product_size(){
        return $this->belongsTo(ProductSize::class,'product_sizes_id');
    }
    public function product_color(){
        return $this->belongsTo(ProductColor::class,'product_colors_id');
    }
    
}
