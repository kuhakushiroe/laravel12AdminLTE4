<?php

namespace App\Livewire\Karyawan;

use App\Models\Karyawan as ModelsKaryawan;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Karyawan extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $listeners = ['delete'];

    #[Title('Karyawan')]
    public $search = '';
    public $form = false;
    public $nik, $nrp, $tgl_lahir, $nama, $gol_darah, $perusahaan, $kontraktor, $dept, $jabatan, $no_hp, $alamat, $domisili, $status;
    public function open()
    {
        $this->form = true;
    }
    public function close()
    {
        $this->form = false;
    }
    public function render()
    {
        if (auth()->user()->hasRole('superadmin')) {
            $karyawans = ModelsKaryawan::where('nama', 'LIKE', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $karyawans = ModelsKaryawan::where('nama', 'LIKE', '%' . $this->search . '%')
                ->where('dept', auth()->user()->subrole)
                ->paginate(10);
        }
        return view('livewire.karyawan.karyawan', compact('karyawans'));
    }
}
