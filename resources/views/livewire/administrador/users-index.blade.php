<div>
    @if(session('notificacion'))   
    <div class="alert alert-success" role="alert">
    <strong>Exito!</strong>{{session('notificacion')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <input wire.keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escribe un nombre">
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped table-hover table-sm">
            <thead class="thead-dark ">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th> Correo</th>
                    <th> Opciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td width="10px">
                            <a class="btn btn-sm btn-primary" href="{{route('admin.users.edit', $user)}}"><i class="fas fa-edit"></i></a>
                        </td>
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No existe registro que coincida con ese nombre</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
    </div>
    <div class="card-footer">
        {{$users->links()}}
    </div>
</div>

</div>
