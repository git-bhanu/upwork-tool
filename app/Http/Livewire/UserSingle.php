<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserSingle extends Component
{
    public $user;
    public $selectedRole;
    /**
     * @var \string[][]
     */
    public $options;

    public function mount($user)
    {
        $this->user = $user;
    }


    public function render()
    {
        $this->options = [['key'=> 'sales-associate', 'value' => 'Sales Associate'], ['key'=> 'sales-manager', 'value' => 'Sales Manager'], ['key'=> 'super-admin', 'value' => 'Super Admin']];

        if($this->user->roles->first()) {
            foreach ($this->options as $key => $option) {
                if($option['key'] == $this->user->roles->first()->name) {
                    unset($this->options[$key]);
                }
            }
        }

        if (!$this->selectedRole) {
            $array = array_reverse($this->options);
            $value = array_pop($array);
            $this->selectedRole = $value['key'];
        }

        return view('livewire.user-single');
    }

    public function changeRole()
    {
        if ($this->selectedRole == '0' || $this->selectedRole == null ) {
            session()->flash('error', 'Select the role first.');
        }

        if ( Auth::user()->hasPermissionTo('edit role') ) {
            $this->user->syncRoles($this->selectedRole);
            $this->selectedRole = null;
        } else {
            session()->flash('error', 'Not Sufficient permission.');
        }
    }
}
