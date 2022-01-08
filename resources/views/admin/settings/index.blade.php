@extends('adminlte::page')

@section('title', 'Configuraciones')

@section('content_header')
    <h1>Configuraciones</h1>
@stop

@section('content')

    @forelse($configuraciones as $setting)
    <div class="card">
        <div class="card-header">
            Datos
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">Nombre de la empresa</span>
                    <label class="form-control" for="">{{ $setting->shopname }}</label>
                </div>
               
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <label class="form-control" for="">{{ $setting->email }}</label>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">Telefono</span>
                    <label class="form-control" for="">{{ $setting->phone }}</label>
                </div>
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">Provincia - Canton</span>
                    <label class="form-control" for="">{{ $setting->adderss }}</label>
                </div>
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">Direccion</span>
                    <label class="form-control" for="">{{ $setting->logo }}</label>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">Cargos de envios</span>
                    <label class="form-control" for="">{{ $setting->shipping_charge }}</label>
                </div>
                <div class="col input-group">
                    <span class="input-group-text" id="basic-addon1">Impuesto</span>
                    <label class="form-control" for="">{{ $setting->vat }}</label>
                </div>
            </div>

        </div>
        <div class="card-footer text-center">
            <a href="{{ route('admin.settings.edit', $setting) }}" class="btn btn-primary">Editar datos</a>
        </div>
    </div>
    @empty
    
    @endforelse

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
