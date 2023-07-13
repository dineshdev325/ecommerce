<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable=["name"];
    public function product_name(){
        return $this->hasMany(ProductName::class,"product_categories_id");
    }
}
