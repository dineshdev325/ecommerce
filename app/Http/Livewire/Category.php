<?php

namespace App\Http\Livewire;

use App\Models\CartDetail;
use Livewire\Component;
use App\Models\ProductCategory;

class Category extends Component
{

    public $categories;
    public $cart_count;
    protected $listeners=['update_cart_count'];
    public function mount()
    {
        $this->categories = ProductCategory::get();
        $this->cart_count = CartDetail::where('users_id','=',auth()->id())->count();
    }
    // UPDATE CART COUNT
    public function update_cart_count()
    {
        $this->cart_count = CartDetail::where('users_id','=',auth()->id())->count();
    }
    public function render()
    {
        return view('livewire.category');
    }
}
