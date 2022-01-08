@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
          
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-1 col-form-label">Nombre:</label>
                  <div class="col-sm-11">
                    <p class="form-control">{{$user->name}}</p>
                  </div><br>
                  <label for="inputEmail3" class="col-sm-1 col-form-label">Correo</label>
                  <div class="col-sm-11">
                    <p class="form-control">{{$user->email}}</p>
                  </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-11 offset-sm-1">
                        <h3><strong>Lista de Usuarios</strong></h3><br>
                        {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}

                            @foreach ($roles as $role)
                                <div>
                                    <label>
                                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                        {{$role->name}}
                                    </label>
                                </div>
                            @endforeach
                            <div class="form-group row">
                                <div class="col-sm-12">
                                  {!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary mt-2']) !!}
                                </div>
                              </div>
                        {!! Form::close() !!}
                    </div>
                  </div>
               
              
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop