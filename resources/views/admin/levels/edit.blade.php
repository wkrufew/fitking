@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Editar niveles de un plan</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($level, ['route' => ['admin.levels.update',$level], 'method' => 'put']) !!}
           <div class="form-group">
            {!! Form::label('name', 'Nombre de nivel: ') !!}
            {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Escriba un nombre', 'autocomplete' => 'off']) !!}
            @error('name')
                <div class="alert alert-danger mt-1" role="alert">
                <strong>Ups!</strong>{{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
           </div>
        {!! Form::submit('Actualizar Nivel', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop