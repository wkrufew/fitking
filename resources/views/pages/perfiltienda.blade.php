@extends('layouts.appro')

@section('content')

    {{-- @include('layouts.menubar') --}}

    @php
    $order = DB::table('orders')
        ->where('user_id', Auth::id())->select('payment_id','total','date','status')
        ->orderBy('id', 'DESC')
        ->limit(10)
        ->get();
    @endphp
    <div style="margin-top: 5px" class="contact_form">
        <div class="container">
          @if(session('tiendapaypalexito'))   
          <div class="alert alert-primary" role="alert">
          <strong>Exito! </strong> {{session('tiendapaypalexito')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
          @if(session('tiendatransferexito'))   
          <div class="alert alert-success" role="alert">
          <strong>Exito! </strong> {{session('tiendatransferexito')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
          @if(session('tiendaerror'))   
          <div class="alert alert-danger" role="alert">
          <strong>Ups! </strong> {{session('tiendaerror')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
            <div class="row">
                <div style="overflow-x:auto;" class="col-sm-12 col-lg-8 card">
                    <table class="table table-response">
                        <thead>
                            <tr>
                                <th># </th>
                                <th>Tipo pago </th>
                                <th>Total </th>
                                <th>Fecha </th>
                                <th>Estado </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $key=>$row)
                                <tr>
                                    <td>{{ $key + 1 }} </td>
                                    <td>{{ $row->payment_id }} </td>
                                    <td>${{ number_format($row->total , 2) }}</td> 
                                    <td>{{$row->date}}</td>
                                    <td>
                                        @if ($row->status == 0)
                                            <span class="badge badge-warning">Pendiente</span>
                                        @elseif($row->status == 1)
                                            <span class="badge badge-info">Pago receptado</span>
                                        @elseif($row->status == 2)
                                            <span class="badge badge-primary">Proceso de entrega</span>
                                        @elseif($row->status == 3)
                                            <span class="badge badge-success">Entregado</span>
                                        @elseif($row->status == 4)
                                            <span class="badge badge-danger">Cancelado</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="card">
                        <img src="{{ Auth::user()->profile_photo_url }}" class="card-img-top"
                            style="height: 60px; width: 60px; margin-left: 40%; border-radius:50%;">
                        <div class="card-body">
                            <h5 class="text-center">{{ Auth::user()->name }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Corre: {{ Auth::user()->email }} </li>
                            <li class="list-group-item"> <a href="{{ route('profile.show') }}">Editar perfil de
                                    usuario</a> </li>
                        </ul>
                        <div class="">
                            <a href="/tienda" class="btn btn-primary btn-sm btn-block">Ir a la tienda</a>
                            <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block">Cerrar Sesion</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
