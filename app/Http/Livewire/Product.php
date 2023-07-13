<?php

namespace App\Http\Livewire;

use App\Models\CartDetail;
use App\Models\ProductCategory;
use App\Models\ProductColor;
use App\Models\ProductDetail;
use Livewire\Component;
use App\Models\ProductName;
use App\Models\ProductSize;

class Product extends Component
{
    public $products = [];
    public $category;
    public $category_id;
    protected $listeners = ['add_cart'];
    public function mount()
    {
        $this->category_id = ProductCategory::where('name', 'like', $this->category)->pluck('id');
        // dd($this->category_id[0] );
        $this->products = ProductName::with([
            'product_detail',
            'product_detail.product_size',
            'product_detail.product_color'
        ])->where('product_categories_id', '=', $this->category_id[0])->get();
    }
   // ADD PRODUCT TO CART
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
    public function render()
    {
        return view('livewire.product');
    }
}
