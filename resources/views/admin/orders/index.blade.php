@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Ordenes de Compras</h1>
@stop

@section('content')
@if(session('exito'))   
<div class="alert alert-success" role="alert">
<strong>Exito! </strong> {{session('exito')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('error'))   
<div class="alert alert-danger" role="alert">
<strong>Ups! </strong> {{session('error')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card">
    {{-- <div class="card-header">
        <a class="btn btn-primary" href="#">Ordenes crear</a>
    </div> --}}
        <div class="card-header">
            <form  action="{{ route('admin.orders.index') }}" method="GET">
                @csrf
                <div class="form-row">
                    <div class="col-sm-11 my-1">
                        <input type="text" class="form-control" name="search" placeholder="Buscar por el nombre de la persona ...">
                    </div>
                    <div>
                        <div class="col-auto my-1">
                            <button type="submit" class="btn btn-primary"> Buscar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover table-sm text-center">
                <thead class="thead-dark ">
                    <tr>
                        <th>#</th>
                        <th>No. Orden</th>
                        <th>Comprador</th>
                        <th>Tipo de pago</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($order as $key=>$o)
                        <tr style="border: white 5px solid" @if($o->payment_id === 'paypal') class="table-success" @else class="" @endif>
                            <td>{{$key + 1}}</td>
                            <td>{{$o->id}}</td>
                            <td>{{$o->name}}</td>
                            <td>
                            @if ($o->payment_id === 'paypal')
                                <span class="badge badge-success">PayPal</span>
                            @elseif($o->payment_id === 'transferencia')
                                <span class="badge badge-primary">Transferencia</span>
                            @endif
                            </td>
                            <td>{{$o->total}}</td>
                            <td>{{$o->date}}</td>                          
                            <td>
                                @if ($o->status == 0)
                                    <span class="badge badge-warning">Pendiente</span>
                                @elseif($o->status == 1)
                                    <span class="badge badge-info">Pago aceptado</span>
                                @elseif($o->status == 2)
                                    <span class="badge badge-info">Proceso de entrega</span>  
                                @elseif($o->status == 3)
                                    <span class="badge badge-success">Entregado</span> 
                                @else 
                                    <span class="badge badge-danger">Cancelado</span> 
                                @endif 
                            </td>
                          
                            <td width="10px"> 
                                <a class="btn btn-primary btn-sm" href="{{ URL::to('admin/view/order/'.$o->id) }}"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No hay ninguna orden registrada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $order->links() }}
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop