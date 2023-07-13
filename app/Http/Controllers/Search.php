<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Search extends Controller
{
public function result($query){
    return view('search_result',['query'=>$query]);
}
}
