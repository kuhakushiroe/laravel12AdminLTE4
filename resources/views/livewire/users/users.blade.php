<div>
    @if ($form)
        <div class="row mb-1">
            <div class="col-md-3">
                <button class="btn btn-outline-secondary btn-sm" wire:click="close">
                    <span class="bi bi-arrow-left"></span>
                </button>
            </div>
        </div>
    @else
        <div class="row p-2">
            <div class="col-md-3">
                <button class="btn btn-dark btn-sm" wire:click="open">
                    <span class="bi bi-plus-square"></span>
                    &nbsp;User
                </button>
            </div>
            <div class="col-md-6">

            </div>
            <div class="col-md-3">
                <input type="text"class="form-control form-control-sm" placeholder="Search" wire:model.live="search">
            </div>
        </div>
        <div class="table table-responsive p-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Progress</th>
                        <th style="width: 40px">Label</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                @hasAnyRole(['karyawan'])
                                    <button class="btn btn-outline-warning btn-sm" wire:click="edit({{ $user->id }})">
                                        <span class="bi bi-pencil"></span>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm">
                                        <span class="bi bi-trash"></span>
                                    </button>
                                @endhasanyrole
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-danger">65%</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $users->links() }}
    @endif
</div>
