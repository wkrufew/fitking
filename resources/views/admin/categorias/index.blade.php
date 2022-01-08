@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Lista de categorias de tienda</h1>
@stop

@section('content')
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
    <a class="btn btn-primary" href="{{route('admin.categorias.create')}}">Crear Categoria de tienda</a>
    </div>

        <div class="card-body table-responsive">
            <table class="table table-striped table-hover table-sm text-center">
                <thead class="thead-dark ">
                    <tr>
                        <th>ID</th>
                        <th>Nombres de categorias</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $key=>$categoria)
                      
                       <tr>
                        <td>{{$key + 1}}</td>  
                        <td>{{$categoria->name}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.categorias.edit', $categoria)}}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.categorias.destroy', $categoria)}}" method="POST">
                                @method('delete')
                                @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-trash-alt"></i> </button>
                            </form>
                        </td>
                    </tr>
                      
                      
                    @empty
                        <tr>
                            <td colspan="4">No hay ninguna categoria registrada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
    </div>
@stop

@section('css')
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop