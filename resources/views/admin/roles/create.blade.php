@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Crear nuevo Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
               
                @include('admin.roles.partials.form')
              
                {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop