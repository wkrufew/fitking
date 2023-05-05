@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Lista del Slider</h1>
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
            <a class="btn btn-primary" href="{{ route('admin.sliders.create') }}">Nuevo</a>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-striped table-hover table-sm text-center">
                <thead class="thead-dark ">
                    <tr>
                        <th>#</th>
                        {{-- <th>Orden</th> --}}
                        <th class="tostada">Image</th>
                        <th colspan="2">Options</th>
                    </tr>
                </thead>
                <tbody id="sliders">
                    @forelse ($sliders as $key=>$slider)
                        <tr data-id="{{ $slider->id }}" class="items-center justify-center">
                            <td>{{ $key + 1 }}</td>
                            {{-- <td>{{ $slider->orden }}</td> --}}
                            <td class="handler">
                                @if ($slider->imagen)
                                    <img class="cursor" style="border-radius: 50%" src="{{ Storage::url($slider->imagen) }}"
                                        height="40px;" width="40px;" alt="">
                                @else
                                    <span>Sin Imagen</span>
                                @endif
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.sliders.edit', $slider) }}"><i
                                        class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form class="formulario_eliminar" action="{{ route('admin.sliders.destroy', $slider) }}"
                                    method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm tostada"> <i
                                            class="fas fa-trash-alt"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No se encontraron registros</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" />
    <style>
        .cursor {
            cursor: grab;
        }
    </style>
@stop

@section('js')
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.3/axios.min.js"
        integrity="sha512-L4lHq2JI/GoKsERT8KYa72iCwfSrKYWEyaBxzJeeITM9Lub5vlTj8tufqYk056exhjo2QDEipJrg6zen/DDtoQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        new Sortable(sliders, {
            handle: '.handler',
            animation: 150,
            ghostClass: 'bg-secondary',
            store: {
                set: function(sortable) {
                    const sorts = sortable.toArray();
                    Swal.fire({
                        position: 'top-end',
                        width: 400,
                        /* background: '#333333', */
                        toast: true,
                        timerProgressBar: true,
                        icon: 'success',
                        title: 'Cambio de orden exitoso!',
                        showConfirmButton: false,
                        timer: 4000
                    })
                    axios.post("{{ route('api.sort.sliders') }}", {
                        sorts: sorts
                    }).catch(function(error) {
                        console.log(error);
                    });
                }
            }
        });

        @if (Session::has('mensaje'))
            Swal.fire({
                position: 'top-end',
                width: 400,
                /* background: '#333333', */
                toast: true,
                timerProgressBar: true,
                icon: 'success',
                title: 'Registro exitoso!',
                showConfirmButton: false,
                timer: 4000
            })
        @endif

        @if (Session::has('mensaje1'))
            Swal.fire({
                position: 'top-end',
                width: 400,
                toast: true,
                timerProgressBar: true,
                icon: 'success',
                title: 'Actualizacion exitosa',
                showConfirmButton: false,
                timer: 4000
            })
        @endif
        @if (Session::has('mensaje2'))
            Swal.fire({
                position: 'top-end',
                width: 400,
                toast: true,
                timerProgressBar: true,
                icon: 'success',
                title: 'Eliminacion exitosa',
                showConfirmButton: false,
                timer: 4000
            })
        @endif
    </script>
    <script>
        $('.formulario_eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Esta seguro de aliminar esta imagen?',
                text: "La imagen sera eliminada permanentemente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar esto!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();

                }
            })
        })
    </script>
@stop
