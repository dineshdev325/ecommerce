<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirm_password;
    protected $rules = [
        'name' => 'required|min:2|alpha',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'confirm_password' => 'required|same:password'
    ];

    //REGISTER
    
    public function register()
    {

        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);
        if ($user) {
            return redirect()->to('/')->with('success', 'Register Successful');
        }
    }
    public function render()
    {
        return view('livewire.register');
    }
}
