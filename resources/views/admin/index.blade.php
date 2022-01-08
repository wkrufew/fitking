@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Panel Administrativo FitKing</h1>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-comments"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Comentarios y Reacciones</span>
              <span class="info-box-number">
                <i class="fas fa-comments"></i> &nbsp; {{$comentarios}}&nbsp;&nbsp;&nbsp;
                <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-star"></i> &nbsp; </small>   {{number_format($reacciones, 2)}}
                <small>Promedio</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Usuarios registrados</span>
              <span class="info-box-number">{{$users}} <small> Total</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ventas de productos</span>
              <span class="info-box-number">${{$ordenes}} <small> Total</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Reservaciones Planes/Tienda</span>
              <span class="info-box-number"> 25 <small><i class="fas fa-dumbbell"></i> Planes</small>&nbsp;&nbsp; | &nbsp;&nbsp; 32 <small><i class="fas fa-store"></i> Tienda </small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-dumbbell"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Usuarios en los planes</span>
              <span class="info-box-number">
                {{$planes}}
                <small>usuarios</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-dumbbell"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total compra de planes</span>
              <span class="info-box-number">
                {{-- @php
                  $suma =0;
                  foreach ($cursos as $item){
                    $suma =  $suma + ($item->students_count * $item->price->value);
                  }
                @endphp --}}
               $ {{$cursos}} <small> Recaudados</small>
                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Compradores de la tienda</span>
              <span class="info-box-number">{{$compradores}} <small> Personas</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tshirt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Productos</span>
              <span class="info-box-number">{{$productos}} <small> Total</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="bg-success text-white text-center">
            Tabla de Personas con mas compras de la tienda
          </div>
          <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover table-success">
              <thead class="bg-success">
                <tr class="text-center">
                  <th class="text-center" scope="col">#</th>
                  <th scope="col">Comprador</th>
                  <th scope="col">Total</th>
                  {{-- <th scope="col">Fecha</th> --}}
                </tr>
              </thead>
              <tbody>
                @forelse ($compras as $key => $compra)
                <tr>
                  <th class="text-center" scope="row">{{ $key + 1 }}</th>
                  <td>{{$compra->name}}</td>
                  <td class="text-center"> $ {{$compra->total_product}}</td>
                  {{-- <td class="text-center"> $ {{$compra->total}}</td> --}}
                  {{-- <td class="text-center">{{\Carbon\Carbon::parse($compra->created_at)->locale('es')->isoFormat('LLLL')}}</td> --}}
                </tr>
                @empty
                    Sin registros por el momento
                @endforelse
  
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="bg-primary text-white text-center">
            Tabla de productos mas vendidos
          </div>
          <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover table-primary">
              <thead class="bg-primary">
                <tr>
                  <th class="text-center" scope="col">#</th>
                  <th scope="col">Producto</th>
                  <th class="text-center" scope="col">Cantidad</th>
                  <th class="text-center" scope="col">Precio</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($mas as $key => $ma)
                <tr>
                  <th class="text-center" scope="row">{{ $key + 1 }}</th>
                  <td>{{$ma->product_name}}</td>
                  <td class="text-center">{{$ma->cont_product}}</td>
                  <td class="text-center"> $ {{$ma->total_product}}</td>
                </tr>
                @empty
                    Sin registros por el momento
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-12 col-md-3"></div>
        <div class="col-none col-md-6">
          <div class="bg-danger text-white text-center">
            Tabla de productos poco stock
          </div>
          <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover table-danger">
              <thead class="bg-danger">
                <tr>
                  <th class="text-center" scope="col">#</th>
                  <th scope="col">Codigo</th>
                  <th scope="col">Producto</th>
                  <th class="text-center" scope="col">Cantidad</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($cantidades as $key => $c)
                <tr>
                  <th class="text-center" scope="row">{{ $key + 1 }}</th>
                  <td>{{$c->product_code}}</td>
                  <td>{{$c->product_name}}</td>
                  <td class="text-center"> {{$c->product_quantity}}</td>
                </tr>
                @empty
                    Sin registros por el momento
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
      </section>
    </div><!--/. container-fluid -->
  </section>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop