<div class="row mb-1">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <button class="btn btn-outline-danger btn-sm" wire:click="close">
                    <span class="bi bi-arrow-left"></span>
                </button>
                Department
            </div>
        </div>
        <form wire:submit.prevent="store">
            <div class="card-body">
                <div class="form-group">
                    <input type="hidden" class="form-control form-control-sm" wire:model="id_department">
                    <label for="name">Name</label>
                    <input type="text"
                        class="form-control form-control-sm
                    @error('name_department') is-invalid @enderror"
                        wire:model="name_department" placeholder="Name Department">
                    @error('name_department')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text"
                        class="form-control form-control-sm
                    @error('description_department') is-invalid @enderror"
                        wire:model="description_department" placeholder="Description Department">
                    @error('description_department')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <span class="bi bi-save"></span>
                        &nbsp;Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
