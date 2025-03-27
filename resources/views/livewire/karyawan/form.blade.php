<div class="row mb-1">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <button class="btn btn-outline-danger btn-sm" wire:click="close">
                    <span class="bi bi-arrow-left"></span>
                </button>
                Karyawan
            </div>
        </div>
        <form wire:submit.prevent="store">
            <div class="card-body">
                <div class="form-group">
                    <input type="hidden" class="form-control form-control-sm" wire:model="id_user">
                    <label for="name">Name</label>
                    <input type="text"
                        class="form-control form-control-sm
                    @error('name') is-invalid @enderror"
                        wire:model="name" placeholder="Nama User">
                    @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </form>
    </div>
</div>
