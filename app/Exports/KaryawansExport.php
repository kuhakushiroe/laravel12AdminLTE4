<?php

namespace App\Exports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KaryawansExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Karyawan::select(
            'foto',
            'nik',
            'nrp',
            'tgl_lahir',
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'agama',
            'gol_darah',
            'status_perkawinan',
            'perusahaan',
            'kontraktor',
            'dept',
            'jabatan',
            'no_hp',
            'alamat',
            'domisili',
            'status'
        )->get();
    }
    public function headings(): array
    {
        return [
            'foto',
            'nik',
            'nrp',
            'tgl_lahir',
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'agama',
            'gol_darah',
            'status_perkawinan',
            'perusahaan',
            'kontraktor',
            'dept',
            'jabatan',
            'no_hp',
            'alamat',
            'domisili',
            'status'
        ];
    }
}
