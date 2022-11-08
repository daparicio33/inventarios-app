@extends('adminlte::page')
@section('title', 'Editar almacen')
@section('content_header')
<h1>Crear un almacen</h1>
{!! Form::open(['route'=>['administrador.almacenes.update', $almacene->id], 'method'=> 'put']) !!}
<label for="">Nombre</label>
<input class="form-control" type="text" style="width:50%" name="nombre">
<label for="">Observación</label>
<input type="text" class="form-control" style="width:50%" name="observacion">
<button type="submit" class="btn btn-primary" style="margin: 7px">Crear</button>
{!! Form::close() !!}
@endsection