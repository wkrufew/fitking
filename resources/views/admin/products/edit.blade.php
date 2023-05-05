@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Editar Marca</h1>
@stop

@section('content')
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
    <div class="card">
        <div class="card-body">
            {!! Form::model($product, [
                'route' => ['admin.products.update', $product],
                'method' => 'put',
                'files' => true,
                'autocomplete' => 'off',
            ]) !!}
            <div class="form-group">
                <div class="row ">
                    <div class="col m-2">
                        {!! Form::label('product_name', 'Nombre del producto: ') !!}
                        {!! Form::text('product_name', null, [
                            'class' => 'form-control' . ($errors->has('product_name') ? ' is-invalid' : ''),
                            'placeholder' => 'Escriba un nombre',
                            'autocomplete' => 'off',
                        ]) !!}
                        @error('product_name')
                            <div class="alert alert-danger mt-1" role="alert">
                                <strong>Ups!</strong>{{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                    <div class="col m-2">
                        {!! Form::label('product_code', 'Codigo del producto: ') !!}
                        {!! Form::text('product_code', null, [
                            'class' => 'form-control' . ($errors->has('product_code') ? ' is-invalid' : ''),
                            'placeholder' => 'Escriba el codigo',
                            'autocomplete' => 'off',
                        ]) !!}
                        @error('product_code')
                            <div class="alert alert-danger mt-1" role="alert">
                                <strong>Ups!</strong>{{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col m-2">
                        {!! Form::label('product_details', 'Detalle del producto: ') !!}
                        {!! Form::textarea('product_details', null, [
                            'class' => 'form-control' . ($errors->has('product_details') ? ' is-invalid' : ''),
                            'placeholder' => 'Escriba una cantidad',
                            'autocomplete' => 'off',
                            'rows' => '2',
                        ]) !!}
                        @error('product_details')
                            <div class="alert alert-danger mt-1" role="alert">
                                <strong>Ups!</strong>{{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="col m-2">
                        {!! Form::label('product_quantity', 'Cantidad: ') !!}
                        {!! Form::text('product_quantity', null, [
                            'class' => 'form-control' . ($errors->has('product_quantity') ? ' is-invalid' : ''),
                            'placeholder' => 'Escriba una cantidad',
                            'autocomplete' => 'off',
                        ]) !!}
                        @error('product_quantity')
                            <div class="alert alert-danger mt-1" role="alert">
                                <strong>Ups!</strong>{{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                    <div class="col m-2">
                        {!! Form::label('selling_price', 'Precio: $') !!}
                        {!! Form::text('selling_price', null, [
                            'class' => 'form-control' . ($errors->has('selling_price') ? ' is-invalid' : ''),
                            'placeholder' => 'Escriba un precio',
                            'autocomplete' => 'off',
                        ]) !!}
                        @error('selling_price')
                            <div class="alert alert-danger mt-1" role="alert">
                                <strong>Ups!</strong>{{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                    <div class="col m-2">
                        {!! Form::label('discount_price', 'Descuento: ') !!}
                        {!! Form::text('discount_price', null, [
                            'class' => 'form-control' . ($errors->has('discount_price') ? ' is-invalid' : ''),
                            'placeholder' => 'Escriba un descuento',
                            'autocomplete' => 'off',
                        ]) !!}
                        @error('discount_price')
                            <div class="alert alert-danger mt-1" role="alert">
                                <strong>Ups!</strong>{{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>


                </div>
                <hr>
                <div class="form-group row ">
                    <div class="col m-2">
                        {!! Form::label('category_id', 'Categoria:') !!}
                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

                        @error('category_id')
                            <div class="alert alert-danger mt-1" role="alert">
                                <strong>Ups!</strong>{{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                    <div class="col m-2">
                        {!! Form::label('subcategory_id', 'Subcategoria:') !!}
                        {!! Form::select('subcategory_id', $subcategories, null, ['class' => 'form-control']) !!}

                        @error('subcategory_id')
                            <div class="alert alert-danger mt-1" role="alert">
                                <strong>Ups!</strong>{{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                    <div class="col m-2">
                        {!! Form::label('brand_id', 'Marca:') !!}
                        {!! Form::select('brand_id', $brands, null, ['class' => 'form-control']) !!}

                        @error('brand_id')
                            <div class="alert alert-danger mt-1" role="alert">
                                <strong>Ups!</strong>{{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-3 m-2">
                        {!! Form::label('product_color', 'Color: ') !!}
                        {!! Form::text('product_color', null, [
                            'data-role' => 'tagsinput',
                            'class' => 'form-control' . ($errors->has('product_color') ? ' is-invalid' : ''),
                            'autocomplete' => 'off',
                        ]) !!}

                    </div>
                    <div class="col-3 m-2">
                        {!! Form::label('product_size', 'Talla/tamaño: ') !!}
                        {!! Form::text('product_size', null, [
                            'data-role' => 'tagsinput',
                            'class' => 'form-control' . ($errors->has('product_size') ? ' is-invalid' : ''),
                            'autocomplete' => 'off',
                        ]) !!}
                        <style>
                            .tag {
                                background: blueviolet;
                                border-radius: 3px;
                            }
                        </style>
                    </div>
                    <div class="col-3 m-2">
                        <p class=""><b>Nota:</b> Selecciona una imagen</p>
                        {!! Form::file('file', ['class' => 'form-input', 'accept' => 'image/png, .jpeg, .jpg', 'id' => 'file']) !!}
                        @error('file')
                            <div class="alert alert-danger mt-1" role="alert">
                                <strong>Ups!</strong>{{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                    <div class="col-2">
                        <img style="border-radius: 8px;" src="{{ Storage::url($product->image_one) }}" width="100%"
                            alt="">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row m-2">
                <div class="col-2">
                    <label>Estado: </label>
                    <div>
                        {!! Form::radio('status', 1, null, ['class' => 'mr-1']) !!}
                        <b>Activo</b>
                    </div>
                    <div>
                        {!! Form::radio('status', 0, null, ['class' => 'mr-1']) !!}
                        <b>Desactivado</b>
                    </div>
                </div>

                <div class="col-2">
                    <label>Slider principal: </label>
                    <div>
                        {!! Form::radio('main_slider', 1, null, ['class' => 'mr-1']) !!}
                        <b>Activo</b>
                    </div>
                    <div>
                        {!! Form::radio('main_slider', 0, null, ['class' => 'mr-1']) !!}
                        <b>Desactivado</b>
                    </div>
                </div>

                <div class="col-2">
                    <label>Gran oferta: </label>
                    <div>
                        {!! Form::radio('hot_deal', 1, null, ['class' => 'mr-1']) !!}
                        <b>Activo</b>
                    </div>
                    <div>
                        {!! Form::radio('hot_deal', 0, null, ['class' => 'mr-1']) !!}
                        <b>Desactivado</b>
                    </div>
                </div>

                {{-- <div class="col-2">
                <label>Slider medio: </label>
                <div>
                    {!! Form::radio('mid_slider', 1, null, ['class' => 'mr-1']) !!}
                    <b>Activo</b>
                </div>
                <div>
                    {!! Form::radio('mid_slider', 0, null, ['class' => 'mr-1']) !!}
                    <b>Desactivado</b>
                </div>
            </div> --}}
                <div class="col-2">
                    <label>Nuevo: </label>
                    <div>
                        {!! Form::radio('hot_new', 1, null, ['class' => 'mr-1']) !!}
                        <b>Activo</b>
                    </div>
                    <div>
                        {!! Form::radio('hot_new', 0, null, ['class' => 'mr-1']) !!}
                        <b>Desactivado</b>
                    </div>
                </div>
                {{--  <div class="col-2">
                <label>Tendencia: </label>
                <div>
                    {!! Form::radio('trend', 1, null, ['class' => 'mr-1']) !!}
                    <b>Activo</b>
                </div>
                <div>
                    {!! Form::radio('trend', 0, null, ['class' => 'mr-1']) !!}
                    <b>Desactivado</b>
                </div>
            </div> --}}

            </div>
            <hr>
            <div class="center-block text-center">
                {!! Form::submit('Actualizar Producto', ['class' => ' btn btn-primary mt-2']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

@stop

@section('css')

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
