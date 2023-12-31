<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    protected $fillable=['size'];
    public function product_detail(){
        return $this->hasMany(ProductDetail::class,"product_sizes_id");
    }
}
