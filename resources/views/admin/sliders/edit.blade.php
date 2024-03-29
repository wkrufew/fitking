@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <div class="card">
        <div class="card-header">
            Actualizar Slider
        </div>

        <div class="card-body">
            {!! Form::model($slider, ['route' => ['admin.sliders.update', $slider], 'method' => 'put', 'files' => true, 'autocomplete' => 'off']) !!}
                <div class="form-group">
                    {!! Form::label('foto', 'Image: ') !!}
                    <p class=""><b>Nota:</b> Seleccionar una imagen rectangular (1920 x 650)px</p>
                    {!! Form::file('file', ['class' => 'form-input', 'accept' => 'image', 'id' => 'file']) !!}
                    @error('file')
                        <div class="
                        alert alert-danger mt-1" role="alert">
                            <strong>Ups!</strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                </div>
        </div>
        <div class="text-center">
            @if ($slider->imagen)
                <img id="picture" style="border-radius: 8px;" src="{{ Storage::url($slider->imagen) }}" width="100px" alt="">
            @else
                <img id="picture" style="border-radius: 8px;"
                    src="https://cdn.pixabay.com/photo/2020/04/06/13/37/coffee-5009730_960_720.png" width="100px" alt="">
            @endif
        </div>
    </div>
    <div class="card-footer text-center">
        {!! Form::submit('Update', ['class' => 'btn btn-md btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    </div>
    </div>
@stop
@section('content')
@stop
@section('js')
    <script>
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>
@stop
