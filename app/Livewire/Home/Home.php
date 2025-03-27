<?php

namespace App\Livewire\Home;

use App\Models\Departments;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $departments = Departments::select('name_department')->get();
        $colors = [
            '#FF5733',
            '#33FF57',
            '#3357FF',
            '#F0E68C',
            '#FF8C00',
            '#8A2BE2',
            '#FF1493',
            '#00FA9A',
            '#FFD700',
            '#A52A2A',
            '#20B2AA',
            '#FF6347',
            '#800080',
            '#FFFF00',
            '#FF4500'
        ];
        $employeeCounts = [];
        foreach ($departments as $department) {
            $employeeCounts[] = rand(100, 1000); // Angka acak antara 100 hingga 1000 karyawan
        }

        // Pastikan jumlah warna cukup, ulangi warna jika jumlah departemen lebih banyak
        $assignedColors = [];
        foreach ($departments as $index => $department) {
            $assignedColors[] = $colors[$index % count($colors)];  // Gunakan modulus untuk mengulang warna
        }
        return view('livewire.home.home', [
            'departments' => $departments,
            'assignedColors' => $assignedColors,
            'employeeCounts' => $employeeCounts
        ]);
    }
}
