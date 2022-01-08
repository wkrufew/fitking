@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Crear precios de un plan</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.prices.store']) !!}
           <div class="form-group">
                {!! Form::label('name', 'Nombre de nivel: ') !!}
                {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Escriba nombre del precio', 'autocomplete' => 'off']) !!}

                @error('name')
                    <div class="alert alert-danger mt-1" role="alert">
                    <strong>Ups!</strong>{{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @enderror
           </div>

           <div class="form-group">
            {!! Form::label('value', 'Valor: ') !!}
            {!! Form::number('value', null, ['class' => 'form-control' . ($errors->has('value') ? ' is-invalid' : ''), 'placeholder' => 'Escriba el valor del precio', 'autocomplete' => 'off']) !!}

            @error('value')
                <div class="alert alert-danger mt-1" role="alert">
                <strong>Ups!</strong>{{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
       </div>
        {!! Form::submit('Crear Nivel', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop