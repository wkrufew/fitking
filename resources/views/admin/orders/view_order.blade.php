@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Detalles de una orden</h1>
@stop

@section('content')
@if(session('notificacion'))   
<div class="alert alert-success" role="alert">
<strong>Exito!</strong>{{session('notificacion')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row">
    <div class="col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <b>ORDEN</b>
            </div>
            <div class="card-body"> 
                <ul class="list-group">
                    <li class="list-group-item"><b>Numero:</b>&nbsp;{{ formatOrderNumber($order->id) }}</li>
                    <li class="list-group-item"><b>Usuario:</b>&nbsp;{{$order->name}}</li>
                    <li class="list-group-item"><b>Tipo de pago:</b>&nbsp;{{$order->payment_id}}</li>
                    <li class="list-group-item"><b>Total de la orden:</b>&nbsp;{{$order->total}}$</li>
                    <li class="list-group-item"><b>Mes:</b>&nbsp;{{$order->month }}</li>
                    <li class="list-group-item"><b>Fecha:</b>&nbsp;{{\Carbon\Carbon::parse($order->created_at)->locale('es')->isoFormat('LLLL')}}</li>
                    
                    {{-- <td>{{$order->created_at->locale('es')->isoFormat('dddd D MMMM') }} del {{ $order->created_at->locale('es')->isoFormat('YYYY') }}</td> --}}
                    {{-- <li class="list-group-item"><b>Fecha:</b>&nbsp;{{$order->date }}</li> --}}
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <b>DETALLES DEL COMPRADOR</b>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><b>Nombres:</b>&nbsp;{{$shipping->ship_name}}</li>
                    <li class="list-group-item"><b>Telefono:</b>&nbsp;{{$shipping->ship_phone}}</li>
                    <li class="list-group-item"><b>Correo:</b>&nbsp;{{$shipping->ship_email}}</li>
                    <li class="list-group-item"><b>Direccion:</b>&nbsp;{{$shipping->ship_address}}</li>
                    <li class="list-group-item"><b>Ciudad:</b>&nbsp;{{$shipping->ship_city }}</li>
                   
                    @if ($order->status == 0)
                        <li class="list-group-item"><b>Estado:</b>&nbsp;<span class="badge badge-warning">Pendiente</span></li>
                    @elseif($order->status == 1)
                        <li class="list-group-item"><b>Estado:</b>&nbsp;<span class="badge badge-info">Pago aceptado</span></li>
                    @elseif($order->status == 2)
                        <li class="list-group-item"><b>Estado:</b>&nbsp;<span class="badge badge-info">Proceso de entrega</span></li>  
                    @elseif($order->status == 3)
                    <li class="list-group-item"><b>Estado:</b>&nbsp;<span class="badge badge-success">Entregado</span></li> 
                    @else 
                    <li class="list-group-item"><b>Estado:</b>&nbsp;<span class="badge badge-danger">Cancelado</span></li> 
                    @endif 
                </ul>
            </div>
        </div>
    </div>

</div>

<div class="card">
    <div class="card-header">
        <div class="row">

                @if ($order->status == 0)
                    <div class="col-12 col-lg-6 borde"><a href="{{ url('admin/payment/accept/'.$order->id) }}"  class="btn btn-info btn-md btn-block m-2 ">Aceptar Pago</a></div>
                    <div class="col-12 col-lg-6 borde"><a href="{{ url('admin/payment/cancel/'.$order->id) }}"  class="btn btn-danger btn-md btn-block m-2">Cancelar Orden</a></div>
                @elseif($order->status == 1)
                     <div class="col-12 col-lg-12 borde"> <a href="{{ url('admin/delivery/process/'.$order->id) }}"  class="btn btn-primary btn-md btn-block m-2">Processo de Entrega</a></div>
                @elseif($order->status == 2) 
                    <div class="col-12 col-lg-12 borde"> <a href="{{ url('admin/delivery/done/'.$order->id) }}"  class="btn btn-success btn-md btn-block m-2">Entrega Realizada</a></div>
                @elseif($order->status == 4)
                    <strong class="text-danger text-center">Esta orden de compra a sido cancelada!</strong>
                @else
                    <strong class="text-success text-center">Esta orden de compra a sido entregada con exito!</strong>
                @endif

        </div>
    </div>
       
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover table-sm text-center">
                <thead class="thead-dark ">
                    <tr>
                        <th>No.</th>
                        <th>Imagen</th>
                        <th>Nombre del producto</th>
                        <th>Talla</th>
                        <th>Color</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @forelse ($details as $key=>$d)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td><img style="border-radius: 10px" src=" {{Storage::url($d->image_one)}}" height="50px;" width="40;" alt=""></td>
                            <td>{{$d->product_name}}</td>
                            <td>{{$d->size}}</td>
                            <td>{{$d->color}}</td>
                            <td>{{$d->quantity}}</td>
                            <td>${{$d->singleprice}}</td>
                            <td>${{$d->totalprice}}</td>                     
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay ninguna orden registrada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop