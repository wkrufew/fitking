@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Lista de Subcategorias</h1>
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
        <a class="btn btn-primary" href="{{route('admin.subcategories.create')}}">Crear Subcategoria</a>
    </div>

        <div class="card-body table-responsive">
            <table class="table table-striped table-hover table-sm text-center">
                <thead class="thead-dark ">
                    <tr>
                        <th>ID</th>
                        <th>Subcategoria</th>
                        <th>Categoria</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subcategories as $key=>$subcategory)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$subcategory->subcategory_name}}</td>
                            <td>{{$subcategory->category_name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.subcategories.edit', $subcategory)}}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.subcategories.destroy', $subcategory)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-trash-alt"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay ninguna subcategoria registrada</td>
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