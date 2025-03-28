<?php

namespace App\Livewire\Karyawan;

use App\Exports\KaryawansExport;
use App\Imports\KaryawanImport;
use App\Models\Departments;
use App\Models\Karyawan as ModelsKaryawan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Karyawan extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    protected $listeners = ['delete'];

    #[Title('Karyawan')]
    public $search = '';
    public $form = false;
    public $formImport = false;
    public $id_karyawan, $foto, $nik, $nrp, $tgl_lahir, $nama, $jenis_kelamin;
    public $tempat_lahir, $agama, $gol_darah, $status_perkawinan, $perusahaan;
    public $kontraktor, $dept, $jabatan, $no_hp, $alamat, $domisili, $status, $file;
    public function open()
    {
        $this->form = true;
    }
    public function close()
    {
        $this->form = false;
    }
    // Store or update the Karyawan record
    public function store()
    {
        $this->validate([
            'nik' => 'nullable',
            'nrp' => 'required|unique:karyawans,nrp,' . $this->id_karyawan,
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable',
            'tempat_lahir' => 'nullable|string|max:255',
            'agama' => 'nullable',
            'gol_darah' => 'nullable',
            'status_perkawinan' => 'nullable',
            'perusahaan' => 'nullable|string|max:255',
            'kontraktor' => 'nullable|string|max:255',
            'dept' => 'required',
            'jabatan' => 'nullable|string|max:255',
            'no_hp' => 'nullable|numeric',
            'alamat' => 'nullable|string|max:255',
            'domisili' => 'nullable',
            'status' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:1024',
        ]);

        // Ensure that NRP is available for folder creation
        if (!$this->nrp) {
            session()->flash('message', 'NRP is required for the folder name.');
            return;
        }

        // Path for the folder: storage/app/public/{NRP}/foto/
        $folderPath = $this->nrp . '/foto';

        // Check if folder exists, if not create it
        if (!Storage::exists($folderPath)) {
            Storage::makeDirectory($folderPath); // Create the directory if it doesn't exist
        }

        // Handle file upload for 'foto'
        if ($this->foto) {
            // Store the photo in the specific folder
            $fotoPath = $this->foto->store($folderPath, 'public');
        } else {
            $fotoPath = null; // Handle if no file is uploaded (optional)
        }

        // Update or create the Karyawan model
        ModelsKaryawan::updateOrCreate(
            ['id' => $this->id_karyawan], // Unique identifier for update
            [
                'foto' => $fotoPath,
                'nik' => $this->nik,
                'nrp' => $this->nrp,
                'tgl_lahir' => $this->tgl_lahir,
                'nama' => $this->nama,
                'jenis_kelamin' => $this->jenis_kelamin,
                'tempat_lahir' => $this->tempat_lahir,
                'agama' => $this->agama,
                'gol_darah' => $this->gol_darah,
                'status_perkawinan' => $this->status_perkawinan,
                'perusahaan' => $this->perusahaan,
                'kontraktor' => $this->kontraktor,
                'dept' => $this->dept,
                'jabatan' => $this->jabatan,
                'no_hp' => $this->no_hp,
                'alamat' => $this->alamat,
                'domisili' => $this->domisili,
                'status' => $this->status,
            ]
        );
        User::created([
            'name' => $this->nama,
            'username' => $this->nrp,
            'password' => Hash::make($this->nrp),
            'role' => 'karyawan',
            'email' => $this->nrp . '@email.com',
        ]);

        // Optionally, reset the form fields after submission
        $this->reset();
        $this->dispatch(
            'alert',
            type: 'success',
            title: 'Berhasil',
            text: 'Berhasil Tambah Data Karyawan',
            position: 'center',
            confirm: true,
            redirect: '/karyawan',
        );
        return;
    }
    public function openImport()
    {
        $this->formImport = true;
    }
    public function import()
    {
        $excel = app(Excel::class);
        $this->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:10240' // Max file size 10MB
        ]);

        try {
            // Import the Excel file
            $excel->import(new KaryawanImport, $this->file);
            // On success, show success message
            $this->dispatch(
                'alert',
                type: 'success',
                title: 'Berhasil',
                text: 'Berhasil Import Karyawan',
                position: 'center',
                confirm: true,
                redirect: '/karyawan',
            );
            return;
        } catch (\Exception $e) {
            // On error, show error message
            $this->dispatch(
                'alert',
                type: 'error',
                title: 'Gagal',
                text: 'Gagal Import Karyawan',
                position: 'center',
                confirm: true,
                redirect: '/karyawan',
            );
            return;
        }

        // Reset the file input after the import
        $this->reset('file');
    }
    public function export()
    {
        $excel = app(Excel::class);
        if (auth()->user()->hasRole('superadmin')) {
            return $excel->download(new KaryawansExport, 'karyawans-MIFA-ALL-' . date('Y-m-d') . time() . '.xlsx');
            //return Excel::download(new KaryawansExport, 'karyawans-MIFA' . date('Y-m-d') . time() . '.xlsx');
        }
        if (auth()->user()->hasRole('admin')) {
            return $excel->download(new KaryawansExport, 'karyawans-MIFA-' . auth()->user()->subrole . '-' . date('Y-m-d') . time() . '.xlsx');
            //return Excel::download(new KaryawansExport, 'karyawans-MIFA' . date('Y-m-d') . time() . '.xlsx');
        }
    }
    public function aktif(int $id)
    {
        ModelsKaryawan::where('id', $id)->update([
            'status' => 'non aktif',
        ]);
    }
    public function nonAktif(int $id)
    {
        ModelsKaryawan::where('id', $id)->update([
            'status' => 'aktif',
        ]);
    }

    public function deleteConfirm($id)
    {
        $this->dispatch(
            'confirm',
            id: $id
        );
    }
    public function render()
    {
        if (auth()->user()->hasRole('superadmin')) {
            $karyawans = ModelsKaryawan::whereAny(['nik', 'nrp', 'nama', 'status', 'dept'], 'LIKE', '%' . $this->search . '%')
                ->orderByRaw("status = 'non aktif' ASC")
                ->paginate(10);
        } else {
            $karyawans = ModelsKaryawan::whereAny(['nik', 'nrp', 'nama', 'status'], 'LIKE', '%' . $this->search . '%')
                ->orderByRaw("status = 'non aktif' ASC")
                ->where('dept', auth()->user()->subrole)
                ->paginate(10);
        }
        $departments = Departments::all();
        return view('livewire.karyawan.karyawan', compact('karyawans', 'departments'));
    }
}
