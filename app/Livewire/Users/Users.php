<?php

namespace App\Livewire\Users;

use App\Models\Departments;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $listeners = ['delete'];

    #[Title('Users')]
    public $search = '';
    public $form = false;
    public $username, $name, $email, $password, $role, $subrole, $id_user;
    public function open()
    {
        $this->form = true;
    }
    public function close()
    {
        $this->form = false;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required',
            'subrole' => 'required_if:role,admin',
        ], [
            'name.required' => 'Name Harus Diisi',
            'username.required' => 'Username Harus Diisi',
            'username.unique' => 'Username sudah digunakan, silakan pilih yang lain',
            'email.required' => 'Email Harus Diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah digunakan, silakan pilih yang lain',
            'password.required' => 'Password Harus Diisi',
            'role.required' => 'Role Harus Diisi',
            'subrole.required_if' => 'Subrole Harus Diisi jika Role adalah Admin',
        ]);

        User::updateOrCreate([
            'id' => $this->id_user
        ], [
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,
            'subrole' => $this->subrole
        ]);

        $this->close();

        $this->reset(['name', 'username', 'email', 'password', 'role', 'subrole']);
        if (!empty($this->id_user)) {
            $jenis = 'Edit';
        } else {
            $jenis = 'Tambah';
        }
        $this->dispatch(
            'alert',
            type: 'success',
            title: 'Berhasil',
            text: 'Berhasil ' . $jenis . ' User',
            position: 'center',
            confirm: true,
            redirect: '/users',
        );
        return;
    }
    public function delete(int $id)
    {
        User::find($id)->delete();
    }
    public function deleteConfirm($id)
    {
        $this->dispatch(
            'confirm',
            id: $id
        );
    }
    public function mount()
    {
        $this->close();
    }
    public function edit($id)
    {
        return auth()->user()->hasRole('karyawan')
            ? redirect()->to('/notfound/users')
            : $this->form = true;
    }
    public function render()
    {
        $departments = Departments::all();
        $users = User::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.users.users', [
            'users' => $users,
            'departments' => $departments
        ]);
    }
}
