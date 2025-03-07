<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination, WithoutUrlPagination;

    #[Title('Users')]
    public $search = '';
    public $form = false;
    public function open()
    {
        $this->form = true;
    }
    public function close()
    {
        $this->form = false;
    }
    public function edit($id)
    {
        return auth()->user()->hasRole('karyawan')
            ? redirect()->to('/notfound/users')
            : $this->form = true;
    }
    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.users.users', compact('users'));
    }
}
