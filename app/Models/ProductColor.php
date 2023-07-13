<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $fillable=['color'];
    public function product_detail(){
        return $this->hasMany(ProductDetail::class,"product_colors_id");
    }
}
