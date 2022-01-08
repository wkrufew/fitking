@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Lista de Productos</h1>
@stop

@section('content')
    @if (session('notificacion'))
        <div class="alert alert-success" role="alert">
            <strong>Exito!</strong>{{ session('notificacion') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('admin.products.create') }}">Crear Producto</a>
            <form  action="{{ route('admin.products.index') }}" method="GET">
                @csrf
                <div class="form-row">
                    <div class="col-sm-11 my-1">
                        <input type="text" class="form-control" name="search" placeholder="Buscar por el nombre del producto o su codigo ...">
                    </div>
                    <div>
                        <div class="col-sm-auto my-1">
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
                        <th>No.</th>
                        <th>Codigo</th>
                        <th>Producto</th>
                        <th>Categoria</th>
                        <th>Marca</th>
                        <th>Catidad</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th>Estado</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $key=>$product)
                        <tr style="border: white 5px solid" @if(  $product->product_quantity <= 0 ) class="table-danger" @else class="" @endif>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->brand_name }}</td>
                            {{-- <td>{{ $product->product_quantity }}</td> --}}
                            <td>
                                @if (($product->product_quantity <= 5) && ($product->product_quantity > 0))
                                    {{-- Falta stock {{ $product->product_quantity }} --}}
                                    <span class="badge badge-warning"> <b>{{ $product->product_quantity }}</b>&nbsp;&nbsp; Poco stock</span>
                                @elseif($product->product_quantity <= 0)
                                    <span class="badge badge-danger"> <b>{{ $product->product_quantity }}</b>&nbsp;&nbsp; Sin stock</span>
                                @else
                                    <span class="badge badge-success"><b>{{ $product->product_quantity }} </b>&nbsp;&nbsp; Con stock</span>
                                @endif
                            </td>
                            <td>{{ $product->selling_price }}</td>
                            <td><img style="border-radius: 50px" src=" {{ Storage::url($product->image_one) }}"
                                    height="25px;" width="25px;" alt=""></td>
                            @if ($product->status)
                                <td><span class="badge badge-success">Activo</span></td>
                            @else
                                <td><span class="badge badge-danger">Desactivado</span></td>
                            @endif

                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.products.edit', $product) }}"><i
                                        class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm tostada"> <i
                                            class="fas fa-trash-alt"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11">No se encuentran productos</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $products->links() }}
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" /> --}}
@stop

@section('js')
    <!-- SweetAlert2 -->
   {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
    <script>
        /*     Swal.fire({
      position: 'top-end',
      width: 400,
      toast: true,
      timerProgressBar: true,
      heigth: 150,
      icon: 'success',
      title: 'Your work has been saved',
      showConfirmButton: false,
      timer: 1500
    })

        $('.tostada').click(function() {
            toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {
                timeOut: 3000,
                progressBar: true,
            })
        }); */
    </script>
@stop
