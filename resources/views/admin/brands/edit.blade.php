@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Editar Marca</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($brand, ['route' => ['admin.brands.update',$brand], 'method' => 'put', 'files' => true, 'autocomplete' => 'off']) !!}
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
            <div class="form-group mt-4">
                <img src=" {{Storage::url($brand->brand_logo)}}" height="100px;" width="120px;" alt="">
            </div>
            <div class="form-group">
               
                {!! Form::file('file', ['class' => 'form-input', 'accept' => 'image/png, .jpeg, .jpg', 'id' => 'file']) !!}
                @error('file')
                <div class="alert alert-danger mt-1" role="alert">
                <strong>Ups!</strong>{{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
        <div class="center-block text-center">
            {!! Form::submit('Actualizar Marca', ['class' => ' btn btn-primary mt-2']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop