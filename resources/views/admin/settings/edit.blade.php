@extends('adminlte::page')

@section('title', 'Empresa')

@section('content_header')
@stop

@section('content')
    <p>Actualizar datos de la empresa </p>
    <div class="card">
        <div class="card text-center">
            Datos Generales
        </div>
        <div class="card-body">
            {!! Form::model($setting, ['route' => ['admin.settings.update', $setting], 'method' => 'put', 'autocomplete' => 'off']) !!}
            <div class="row mb-3">
                <div class="col input-group">
                    {!! Form::label('shopname', 'Nombre de la empresa ', ['class' => 'input-group-text']) !!}
                    {!! Form::text('shopname', null, ['class' => 'form-control' . ($errors->has('shopname') ? ' is-invalid' : ''), 'placeholder' => 'Escribir el nombre de la empresa', 'autocomplete' => 'off']) !!}
                    @error('shopname')
                        <div class="alert alert-danger mt-1" role="alert">
                            <strong>Ups!</strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>

                <div class="col input-group">
                    {!! Form::label('shipping_charge', 'Cargo de Envio', ['class' => 'input-group-text']) !!}
                    {!! Form::text('shipping_charge', null, ['class' => 'form-control' . ($errors->has('shipping_charge') ? ' is-invalid' : ''), 'placeholder' => 'Escribir el nombre de la empresa', 'autocomplete' => 'off']) !!}
                    @error('shipping_charge')
                        <div class="alert alert-danger mt-1" role="alert">
                            <strong>Ups!</strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col input-group">
                    {!! Form::label('phone', 'Telefono', ['class' => 'input-group-text']) !!}
                    {!! Form::text('phone', null, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => '+593983935029', 'autocomplete' => 'off']) !!}
                    @error('phone')
                        <div class="alert alert-danger mt-1" role="alert">
                            <strong>Ups!</strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                               
                <div class="col input-group">
                    {!! Form::label('email', '@ ', ['class' => 'input-group-text']) !!}
                    {!! Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'soporte@fitking.com', 'autocomplete' => 'off']) !!}
                    @error('email')
                        <div class="alert alert-danger mt-1" role="alert">
                            <strong>Ups!</strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col input-group">
                    {!! Form::label('adderss', 'Direccion', ['class' => 'input-group-text']) !!}
                    {!! Form::text('adderss', null, ['class' => 'form-control' . ($errors->has('adderss') ? ' is-invalid' : ''), 'placeholder' => 'Av. Los puentes ...', 'autocomplete' => 'off']) !!}
                    @error('adderss')
                        <div class="alert alert-danger mt-1" role="alert">
                            <strong>Ups!</strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="card text-center">
                Datos de la cuenta de Banco
            </div>
            <div class="row mb-3">
                <div class="col input-group">
                    {!! Form::label('banco', 'Nombre del Banco', ['class' => 'input-group-text']) !!}
                    {!! Form::text('banco', null, ['class' => 'form-control' . ($errors->has('banco') ? ' is-invalid' : ''), 'placeholder' => 'Ejm. Banco del Pichincha', 'autocomplete' => 'off']) !!}
                    @error('banco')
                        <div class="alert alert-danger mt-1" role="alert">
                            <strong>Ups!</strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                <div class="col input-group">
                    {!! Form::label('cuenta', 'Cuenta', ['class' => 'input-group-text']) !!}
                    {!! Form::text('cuenta', null, ['class' => 'form-control' . ($errors->has('cuenta') ? ' is-invalid' : ''), 'placeholder' => 'Ejm. 4567458987', 'autocomplete' => 'off']) !!}
                    @error('cuenta')
                        <div class="alert alert-danger mt-1" role="alert">
                            <strong>Ups!</strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                <div class="col input-group">
                    {!! Form::label('tipocuenta', 'Tipo de Cuenta', ['class' => 'input-group-text']) !!}
                    {!! Form::text('tipocuenta', null, ['class' => 'form-control' . ($errors->has('tipocuenta') ? ' is-invalid' : ''), 'placeholder' => 'Ejm. Ahorro/Corriente', 'autocomplete' => 'off']) !!}
                    @error('tipocuenta')
                        <div class="alert alert-danger mt-1" role="alert">
                            <strong>Ups!</strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col input-group">
                    {!! Form::label('beneficiario', 'Nombre del Beneficiado ', ['class' => 'input-group-text']) !!}
                    {!! Form::text('beneficiario', null, ['class' => 'form-control' . ($errors->has('beneficiario') ? ' is-invalid' : ''), 'placeholder' => 'Escribir el nombre del beneficiario', 'autocomplete' => 'off']) !!}
                    @error('beneficiario')
                        <div class="alert alert-danger mt-1" role="alert">
                            <strong>Ups!</strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
               
                <div class="col input-group">
                    {!! Form::label('cedula', 'Cedula', ['class' => 'input-group-text']) !!}
                    {!! Form::text('cedula', null, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'Ejem. 0603649106', 'autocomplete' => 'off']) !!}
                    @error('cedula')
                        <div class="alert alert-danger mt-1" role="alert">
                            <strong>Ups!</strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            {!! Form::submit('Actualizar', ['class' => ' btn btn-success mt-2']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    </div>
@stop

@section('js')
    
@stop
