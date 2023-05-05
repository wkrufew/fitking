@extends('adminlte::page')

@section('title', 'Configuraciones')

@section('content_header')
    <h1>Configuraciones</h1>
@stop

@section('content')

   {{--  @forelse($configuraciones as $setting) --}}
    @if ($setting)
    <div class="card">
        <div class="card-body">
            <div class="card text-center">
                Datos Generales del Sistema
            </div>
            <div class="row mb-3">
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">Nombre de la empresa</span>
                    <label class="form-control input-group-text" for="">{{ $setting->shopname }}</label>
                </div>
               
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">Cargo de envio</span>
                    <label class="form-control input-group-text" for="">{{ $setting->shipping_charge }}</label>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">Telefono</span>
                    <label class="form-control input-group-text" for="">{{ $setting->phone }}</label>
                </div>
               
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <label class="form-control input-group-text" for="">{{ $setting->email }}</label>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">Direccion</span>
                    <label class="form-control input-group-text" for="">{{ $setting->adderss }}</label>
                </div>
            </div>
            <div class="card text-center">
                Datos de la cuenta de Banco
            </div>
            <div class="row mb-3">
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">Nombre del Banco</span>
                    <label class="form-control input-group-text" for="">{{ $setting->banco }}</label>
                </div>
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">Numero de Cuenta</span>
                    <label class="form-control input-group-text" for="">{{ $setting->cuenta }}</label>
                </div>
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">Tipo de Cuenta</span>
                    <label class="form-control input-group-text" for="">{{ $setting->tipocuenta }}</label>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">Beneficiario</span>
                    <label class="form-control input-group-text" for="">{{ $setting->beneficiario }}</label>
                </div>
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">Cedula/RUC</span>
                    <label class="form-control input-group-text" for="">{{ $setting->cedula }}</label>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('admin.settings.edit', $setting) }}" class="btn btn-primary">Editar datos</a>
        </div>
    </div>
    @else
        
    @endif
    {{-- @empty
    
    @endforelse --}}

@stop

@section('css')

@stop

@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (Session::has('mensaje'))
            Swal.fire({
            position: 'top-end',
            width: 400,
            /* background: '#333333', */
            toast: true,
            timerProgressBar: true,
            icon: 'success',
            title: 'Datos del sistema actualizados con exito!',
            showConfirmButton: false,
            timer: 4000
            })
        @endif
    </script>

@stop
