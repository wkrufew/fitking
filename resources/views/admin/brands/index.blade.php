@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Lista de Marcas</h1>
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

<div class="card">
    <div class="card-header">
    <a class="btn btn-primary" href="{{route('admin.brands.create')}}">Crear Marca</a>
    </div>

        <div class="card-body table-responsive">
            <table class="table table-striped table-hover table-sm text-center">
                <thead class="thead-dark ">
                    <tr>
                        <th>No.</th>
                        <th>Nombres de la Marca</th>
                        <th class="tostada">Logo de la Marca</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($brands as $key=>$brand)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$brand->brand_name}}</td>
                            {{-- <td><img src="{{ URL::to($brand->brand_logo)}}" height="70px;" width="80px;" alt=""></td> --}}
                            <td><img src=" {{Storage::url($brand->brand_logo)}}" height="70px;" width="80px;" alt=""></td>
                           
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.brands.edit', $brand)}}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.brands.destroy', $brand)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                        <button type="submit" class="btn btn-danger btn-sm tostada"> <i class="fas fa-trash-alt"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay ninguna marca registrada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
    </div>
@stop

@section('css')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
@stop

@section('js')
<!-- SweetAlert2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    Swal.fire({
  position: 'top-end',
  width: 400,
 /* background: '#333333',*/
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
    });
  </script>
@stop