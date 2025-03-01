<?php

namespace App\Livewire\Users;

use Livewire\Attributes\Title;
use Livewire\Component;

class Users extends Component
{
    #[Title('Users')]
    public function render()
    {
        return view('livewire.notfound');
    }
}
