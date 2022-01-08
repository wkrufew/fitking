@extends('adminlte::page')

@section('title', 'Empresa')

@section('content_header')
@stop

@section('content')
    <p>Actualizar datos de la empresa </p>
    <div class="card">
        <div class="card-header justify-between flex-row">
            Datos
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
                    {!! Form::label('email', '@ ', ['class' => 'input-group-text']) !!}
                    {!! Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'doc@dr-pools.com', 'autocomplete' => 'off']) !!}
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
                    {!! Form::label('phone', 'Telefono', ['class' => 'input-group-text']) !!}
                    {!! Form::text('phone', null, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'White phone 1 main', 'autocomplete' => 'off']) !!}
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
                    {!! Form::label('logo', 'Provincia - Canton', ['class' => 'input-group-text']) !!}
                    {!! Form::text('logo', null, ['class' => 'form-control' . ($errors->has('logo') ? ' is-invalid' : ''), 'placeholder' => 'Provincia - Canton', 'autocomplete' => 'off']) !!}
                    @error('logo')
                        <div class="alert alert-danger mt-1" role="alert">
                            <strong>Ups!</strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                <div class="col input-group">
                    {!! Form::label('adderss', 'Direccion', ['class' => 'input-group-text']) !!}
                    {!! Form::text('adderss', null, ['class' => 'form-control' . ($errors->has('adderss') ? ' is-invalid' : ''), 'placeholder' => 'Country-city', 'autocomplete' => 'off']) !!}
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
            <div class="row mb-3">
                <div class="col input-group">
                    {!! Form::label('shipping_charge', 'Cargo de envio', ['class' => 'input-group-text']) !!}
                    {!! Form::text('shipping_charge', null, ['class' => 'form-control' . ($errors->has('shipping_charge') ? ' is-invalid' : ''), 'placeholder' => 'Cargo de envio', 'autocomplete' => 'off']) !!}
                    @error('shipping_charge')
                        <div class="alert alert-danger mt-1" role="alert">
                            <strong>Ups!</strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
                <div class="col input-group">
                    {!! Form::label('vat', 'Impuestos', ['class' => 'input-group-text']) !!}
                    {!! Form::text('vat', null, ['class' => 'form-control' . ($errors->has('vat') ? ' is-invalid' : ''), 'placeholder' => 'Impuestos', 'autocomplete' => 'off']) !!}
                    @error('vat')
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
            {!! Form::submit('Update', ['class' => ' btn btn-success mt-2']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    </div>
@stop

@section('js')
    
@stop
