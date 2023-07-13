<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable=['name','email','password'];
    public function cart_detail(){
        return $this->hasMany(CartDetail::class,"user_details_id");
    }
}
