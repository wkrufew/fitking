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
          <div class="small-box bg-info">
            <div class="inner">
              <h4>{{$users}} Total</h4>

              <p>Usuarios registrados</p>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
            <a href="{{route('admin.users.index')}}" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="small-box bg-primary">
            <div class="inner">
              <h4>{{$compradores}} Personas</h4>

              <p>Compradores de la tienda</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="{{route('admin.orders.success')}}" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="small-box bg-success">
            <div class="inner">
              <h4>${{$ordenes}} Total</h4>

              <p>Ventas de productos</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="{{route('admin.orders.success')}}" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="small-box bg-danger">
            <div class="inner">
              <h4>{{$productos}}&nbsp;&nbsp; <i class="fas fa-tshirt"></i> </h4>

              <p>Productos</p>
            </div>
            <div class="icon">
              <i class="fas fa-tshirt"></i>
            </div>
              <a href="{{route('admin.students.index')}}" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      {{-- <div class="row">
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
      </div> --}}
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="small-box bg-secondary">
            <div class="inner">
              <h4><span class="info-box-number">
                  {{$planes}} &nbsp;&nbsp;<i class="fas fa-dumbbell"></i>
                </h4>

              <p>Usuarios con los planes</p>
            </div>
            <div class="icon">
              <i class="fas fa-dumbbell"></i>
            </div>
            <a href="{{route('instructor.courses.index')}}" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="small-box bg-success">
            <div class="inner">
              <h4>${{$cursos}} Total</h4>

              <p>Total compra de planes</p>
            </div>
            <div class="icon">
              <i class="fas fa-dumbbell"></i>
            </div>
            <a href="{{route('instructor.courses.index')}}" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="small-box bg-info">
            <div class="inner">
              <h4>{{$rplanes}}&nbsp;&nbsp; <i class="fas fa-dumbbell"></i> &nbsp;&nbsp;&nbsp;&nbsp; {{$rordenes}}&nbsp;&nbsp; <i class="fas fa-store"></i></h4>

              <p>Reservacion de planes | tienda</p>
            </div>
            <div class="icon">
              <i class="fas fa-store"></i>
            </div>
            <div class=" text-center">
              <a href="{{route('admin.students.index')}}" class="small-box-footer" style="color: white">Ir a planes&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a href="{{route('admin.orders.index')}}" class="small-box-footer" style="color: white">Ir a tienda&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="small-box bg-primary">
            <div class="inner">
              <h4><span class="info-box-number">
                <i class="fas fa-comments"></i> 
                  &nbsp; {{$comentarios}}&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;
                <i class="fas fa-star"></i> 
                &nbsp;    {{number_format($reacciones, 2)}}
                </h4>

              <p>Comentarios y Reacciones</p>
            </div>
            <div class="icon">
              <i class="fas fa-comments"></i>
            </div>
            {{-- <a  class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
      </div>
      <!-- /.row -->
     
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
                <tr>
                  <th colspan="3">Sin registros por el momento</th>
                </tr>
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
                <tr>
                  <th colspan="4">Sin registros por el momento</th>
                </tr>
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
                  <th>{{$c->product_code}}</th>
                  <th>{{$c->product_name}}</th>
                  <th class="text-center"> {{$c->product_quantity}}</th>
                </tr>
                @empty
                <tr>
                  <th colspan="4">Sin registros por el momento</th>
                </tr>
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