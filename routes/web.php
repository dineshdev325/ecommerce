<?php
namespace App\Models;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Category;
use App\Models\ProductCategory;
use App\Models\ProductName;
use App\Http\Controllers\Price;
use App\Http\Controllers\Search;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/products/{category}', [Controller::class,'display']);
Route::get('/', [Controller::class,'render']);
Route::get('/search/{query}', [Search::class,'result']);
Route::get('/price/{product}/{size}/{color}',[Price::class,'price']);