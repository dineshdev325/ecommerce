<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
   
      public function logout(){
        Auth::logout();
        return redirect()->to('/');
    }
    public function render()
    {
        return view('livewire.header');
    }
}
