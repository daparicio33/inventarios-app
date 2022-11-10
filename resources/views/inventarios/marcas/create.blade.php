@extends('adminlte::page')
@section('title', 'Crear marca')
@section('content_header')
<h1 class="text-primary"><i class="fas fa-marker"></i>Crear nueva marca</h1>
@stop
@section('content')
{!! Form::open(['route'=>'inventarios.marcas.store','method'=>'post']) !!}
<div class="row">
    <div class="col-sm-12 col-md-7 col-lg-7">
        <div class="card">
            <div class="card-header">
                <h3><i class="fa-solid fa-input-text"></i>Nueva marca</h3>
            </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">
                            <i class="fas fa-marker"></i>Nombre
                        </label>
                        {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"> Guardar</i>
            </button>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop
