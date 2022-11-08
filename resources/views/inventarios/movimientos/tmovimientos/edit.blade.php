@extends('adminlte::page')
@section('title', 'Editar tipo de movimiento')
@section('content_header')
 <h1 class="text-primary"><i class="fas fa-marker"></i>Editar nuevo tipo</h1>
 @stop
@section('content')
    {!! Form::open(['route'=>'inventarios.movimientos.tmovimientos.edit','method'=>'post','enctype'=>'multipart/form-data']) !!}
    <div class="row">
        <div class="col-sm-12 col-md-7 col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h3><i class="fa-solid fa-input-text"></i>Editar tipo</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">
                                <i class="fas fa-marker"></i>Nombre
                            </label>
                            {!! Form::text('factor', null, ['class'=>'form-control']) !!}
                        <label for="" class="mt-2">
                            <i class="fas fa-stream"></i>Factor
                        </label>
                        {!! Form::text('factor', null, ['class'=>'form-control']) !!}
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
    {{ !! form::close() !! }}
@stop