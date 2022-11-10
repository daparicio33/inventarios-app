@extends('adminlte::page')
@section('title', 'Nuevo almacen')
@section('content_header')
<h1>Crear un almacen</h1>
{!! Form::open(['route'=>['administrador.almacenes.store'], 'method'=>'post']) !!}
<div class="row mt-2">
    <div class="col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5>Datos del Almacen</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Nombre</label>
                    {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
                    <label for="">Observación</label>
                    {!! Form::text('observacion', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="card-footer">
            <button type="submit" class="btn btn-primary" style="margin: 7px">
                <i class="fas fa-save"></i> Guardar
            </button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection