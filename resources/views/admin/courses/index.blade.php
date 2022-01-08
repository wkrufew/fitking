@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Planes pendientes de aprobacion</h1>
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
            <table class="table table-striped table-hover table-sm">
                <thead class="thead-dark ">
                    <tr>
                        <th>ID</th>
                        <th>Plan</th>
                        <th> Categoria</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->title}}</td>
                            <td>{{$course->category->name}}</td>
                            <td  class="flex justify-center">
                                <a class="btn btn-sm btn-primary" href="{{route('admin.courses.show', $course)}}"><i class="fas fa-eye mr-2"></i>Revisar</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No existe registros </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
        </div>
        <div class="card-footer">
            {{$courses->links('vendor/pagination/bootstrap-4')}}
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop