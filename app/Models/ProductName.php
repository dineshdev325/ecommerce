<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductName extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    public function product_detail(){
        return $this->hasMany(ProductDetail::class,"product_names_id");
    }
    public function product_category(){
        return $this->belongsTo(ProductDetail::class,'product_categories_id');
    }
}
