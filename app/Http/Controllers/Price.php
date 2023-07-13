<?php

namespace App\Http\Controllers;

use App\Models\ProductColor;
use App\Models\ProductDetail;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class Price extends Controller
{
    //  GET PRICE
    public function price($product,$size,$color){
        
        $price=ProductDetail::
        where('product_sizes_id','=',$size)->
        where('product_names_id','=',$product)->
        where('product_colors_id','=',$color)
        ->get();
        return response()->json($price);

    }
}
