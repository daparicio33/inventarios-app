@extends('adminlte::page')
@section('title', 'Editar Encargado')
@section('content_header')
    <h1 class="text-primary"><i class="fas fa-marker"></i> Editar encargado</h1>
@stop
@section('content')
    {!! Form::model($encargado, ['route'=>['administrador.almacenes.encargados.update',$encargado->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
    <div class="row">
        <div class="col-sm-12 col-md-9 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-list-alt"></i> Datos del Producto</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">
                            <i class="fas fa-user"></i>  Nombre de usuario
                        </label>
                        {!! Form::select('user_id', $users, null, ['class'=>'form-control']) !!}
                        <label for="">
                            <i class="fab fa-black-tie"></i>  Cargo del usuario
                        </label>
                        {!! Form::select('cargo_id', $cargos, null, ['class'=>'form-control']) !!}
                        <label for="">
                            <i class="fab fa-buffer"></i>  Almacen
                        </label>
                        {!! Form::select('almacene_id', $almacenes, null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop