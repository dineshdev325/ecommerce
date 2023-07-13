<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Category;
use App\Models\ProductName;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function display($category){
    return view('home',compact('category'));
    }
    public function render(){
    return redirect("products/men");
    }
}
