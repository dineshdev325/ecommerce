<?php

namespace App\Http\Livewire;

use App\Models\CartDetail;
use App\Models\ProductDetail;
use App\Models\ProductName;
use Livewire\Component;

class Search extends Component
{
    protected $listeners=['add_cart','search'];
    public $products;
    public $query;
    public function mount(){
    // GET PRODUCT DETAILS
    $this->products = ProductName::with([
            'product_detail',
            'product_detail.product_size',
            'product_detail.product_color'
         ])->where('name', 'like', '%'.$this->query.'%')->get();

    } 
    // ADD PRODUCT TO CARTS
     public function add_cart($product_name_id, $color_id, $size_id)
    {
        $product_detail_id = 1;

        $product_detail_id =
            ProductDetail::where('product_sizes_id', '=', $size_id)->where('product_names_id', '=', $product_name_id)->where('product_colors_id', '=', $color_id)
            ->pluck('id');
        // CHECK PRODUCT IN CART
        if (CartDetail::where('product_details_id','=',$product_detail_id)->count()<1) {
            $cart=CartDetail::create([
                'users_id'=>auth()->id(),
                'product_details_id'=>$product_detail_id[0],

            ]);
        }
        else{
            session()->flash('cart_exist','already exist in the cart');
            // dd('already exist');
        }
    }

    //RETURN SEARCH RESULT
     public function search($query){
       
         $this->products = ProductName::with([
            'product_detail',
            'product_detail.product_size',
            'product_detail.product_color'
         ])->where('name','like','%'.$query.'%')->get();
    }
    public function render()
    {
        return view('livewire.search');
    }
}
