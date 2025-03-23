<div>
    @if ($form)
        @include('livewire.users.form')
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
                        <th>Role</th>
                        <th>Sub Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                @hasAnyRole(['superadmin', 'admin'])
                                    <button class="btn btn-outline-warning btn-sm" wire:click="edit({{ $user->id }})">
                                        <span class="bi bi-pencil"></span>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm"
                                        wire:click="deleteConfirm({{ $user->id }})">
                                        <span class="bi bi-trash"></span>
                                    </button>
                                @endhasanyrole
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->subrole }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $users->links() }}
    @endif
</div>
