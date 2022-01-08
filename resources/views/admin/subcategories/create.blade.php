@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Crear Subcategoria</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.subcategories.store']) !!}
           <div class="form-group">
            {!! Form::label('subcategory_name', 'Nombre de Subcategoria: ') !!}
            {!! Form::text('subcategory_name', null, ['class' => 'form-control' . ($errors->has('subcategory_name') ? ' is-invalid' : ''), 'placeholder' => 'Escriba un nombre', 'autocomplete' => 'off']) !!}
            @error('subcategory_name')
                <div class="alert alert-danger mt-1" role="alert">
                <strong>Ups!</strong>{{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
           </div>
           <div class="form-group">
            {!! Form::label('category_id', 'Categoria:') !!}
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control' ]) !!}
            
            @error('category_id')
                <div class="alert alert-danger mt-1" role="alert">
                <strong>Ups!</strong>{{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
           </div>
        {!! Form::submit('Crear Subcategoria', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop