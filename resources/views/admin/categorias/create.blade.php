@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Crear categoria de tienda</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.categorias.store']) !!}
           <div class="form-group">
            {!! Form::label('name', 'Nombre de categoria: ') !!}
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
        {!! Form::submit('Crear Categoria', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop