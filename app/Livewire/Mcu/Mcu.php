<?php

namespace App\Livewire\Mcu;

use Livewire\Attributes\Title;
use Livewire\Component;

class Mcu extends Component
{
    #[Title('MCU')]
    public function render()
    {
        return view('livewire.notfound');
    }
}
