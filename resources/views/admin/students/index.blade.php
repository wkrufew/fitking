@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Estudiantes pendientes matricular</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body table-responsive">
            @if(session('info'))   
                <div class="alert alert-success" role="alert">
                {{session('info')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif

            @if(session('info1'))   
                <div class="alert alert-danger" role="alert">
                {{session('info1')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            <div class="card-header">
                <form action="{{ route('admin.students.index') }}" method="GET">
                    @csrf
                    <div class="form-row">
                        <div class="col-sm-11 my-1">
                            <input type="text" class="form-control" name="search" placeholder="Buscar por el nombre de la persona ...">
                        </div>
                        <div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary"> Buscar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <table class="table table-striped table-hover table-sm">
                <thead class="thead-dark ">
                    <tr>
                        <th>ID</th>
                        <th>Estudiante</th>
                        <th> Plan</th>
                        <th> Fecha de peticion</th>
                        <th colspan="2" class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $key=>$student)
                        <tr>
                            <td>{{$key +1}}</td>
                            <td>{{$student->nombre_usuario}}</td>
                            <td>{{$student->nombre_curso}}</td>
                            <td>{{$student->created_at->locale('es')->isoFormat('dddd D MMMM') }} del {{ $student->created_at->locale('es')->isoFormat('YYYY') }}</td>
                            
                            <td  class="flex justify-center">
                                <form action="{{ route('admin.students.aprobar', $student) }}" method="POST">
                                    @csrf 
                                    <button type="submit" class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 btn btn-sm btn-primary"><i class="fas fa-eye mr-2"></i>Matricular</button>     
                                </form>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.students.destroy', $student)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-trash-alt"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No existe registros </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
        </div>
        <div class="card-footer">
            {{ $students->links() }}
        </div>
    </div>
@stop

@section('css')
   {{--  <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop