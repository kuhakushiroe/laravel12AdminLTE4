<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Users extends Component
{
    #[Title('Users')]
    public $search = '';
    use WithPagination, WithoutUrlPagination;
    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.users.users', compact('users'));
    }
}
