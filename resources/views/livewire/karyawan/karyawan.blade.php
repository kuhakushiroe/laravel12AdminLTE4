<div>
    @if ($form)
        @include('livewire.karyawan.form')
    @else
        <div class="row pt-2">
            <div class="col-md-3">
                <button class="btn btn-dark btn-sm" wire:click="open">
                    <span class="bi bi-plus-square"></span>
                    &nbsp;Karyawan
                </button>
            </div>
            <div class="col-md-6">

            </div>
            <div class="col-md-3">
                <input type="text"class="form-control form-control-sm" placeholder="Search" wire:model.live="search">
            </div>
        </div>
        <!-- resources/views/datakaryawans/index.blade.php -->
        <div class="table table-responsive pt-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>NIK</th>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Agama</th>
                        <th>Gol. Darah</th>
                        <th>Status Perkawinan</th>
                        <th>Perusahaan</th>
                        <th>Kontraktor</th>
                        <th>Departemen</th>
                        <th>Jabatan</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Domisili</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($karyawans as $index => $datakaryawan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $datakaryawan->nik }}</td>
                            <td>{{ $datakaryawan->nrp }}</td>
                            <td>{{ $datakaryawan->nama }}</td>
                            <td>{{ $datakaryawan->jenis_kelamin }}</td>
                            <td>{{ $datakaryawan->tempat_lahir }}</td>
                            <td>{{ $datakaryawan->agama }}</td>
                            <td>{{ $datakaryawan->gol_darah }}</td>
                            <td>{{ $datakaryawan->status_perkawinan }}</td>
                            <td>{{ $datakaryawan->perusahaan }}</td>
                            <td>{{ $datakaryawan->kontraktor }}</td>
                            <td>{{ $datakaryawan->dept }}</td>
                            <td>{{ $datakaryawan->jabatan }}</td>
                            <td>{{ $datakaryawan->no_hp }}</td>
                            <td>{{ $datakaryawan->alamat }}</td>
                            <td>{{ $datakaryawan->domisili }}</td>
                            <td>{{ $datakaryawan->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="17">
                                <div class="alert alert-danger">
                                    <span class="bi bi-exclamation-circle"></span>
                                    &nbsp;No data
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $karyawans->links() }}
    @endif
</div>
