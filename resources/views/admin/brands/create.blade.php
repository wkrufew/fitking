@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Crear nueva marca</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.brands.store', 'files' => true, 'autocomplete' => 'off']) !!}
           <div class="form-group">
            {!! Form::label('brand_name', 'Nombre de la marca: ') !!}
            {!! Form::text('brand_name', null, ['class' => 'form-control' . ($errors->has('brand_name') ? ' is-invalid' : ''), 'placeholder' => 'Escriba un nombre', 'autocomplete' => 'off']) !!}
            @error('brand_name')
                <div class="alert alert-danger mt-1" role="alert">
                <strong>Ups!</strong>{{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
            <div class="form-group">
                <p class=""><b>Nota:</b> Selecciona una imagen</p>
                {!! Form::file('file', ['class' => 'form-input', 'accept' => 'image/png, .jpeg, .jpg', 'id' => 'file']) !!}
                @error('file')
                <div class="alert alert-danger mt-1" role="alert">
                <strong>Ups!</strong>{{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
        </div>
           </div>
        {!! Form::submit('Crear Marca', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop