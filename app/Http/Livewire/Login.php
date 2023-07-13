<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    //LOGIN
    public function login()
    {
        $this->validate([
            'email' => 'required|exists:users|email',
            'password' => 'required'

        ]);
    //ATTEMP TO LOGIN
        $user = Auth::attempt(
            [
                'email' => $this->email,
                'password' => $this->password

            ]
        );
        if($user) {
            session()->regenerate();
            return redirect()->to('/')->with('success','Login Successful');
        }
        else{
       throw  ValidationException::withMessages([
          'password'=>'Your email and password do not match.'
      ]);
} 
    }

    public function render()
    {
        return view('livewire.login');
    }
}
