@extends('adminlte::page')

@section('title', 'FitKing')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
    @livewire('administrador.users-index')
@stop

@section('css')
@stop

@section('js')
    <script> 
       
    </script>
@stop