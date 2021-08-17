<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginSignup extends Component
{
    public $signIn = true;

    public function render()
    {
        return view('livewire.login-signup');
    }

    public function toggle($value)
    {
        if ($value == true) {
            $this->signIn = true;
        } else {
            $this->signIn = false;
        }
    }
}
