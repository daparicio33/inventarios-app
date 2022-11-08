@extends('adminlte::page')
@section('title', 'Nuevo Encargado')
@section('content_header')
    <h1 class="text-primary"><i class="fas fa-marker"></i> Agregar nuevo encargado</h1>
@stop

@section('content')
    {!! Form::open(['route'=>'administrador.almacenes.encargados.store','method'=>'post','enctype'=>'multipart/form-data']) !!}
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
                        <select name="user_id" class="form-control">
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <label for="">
                            <i class="fab fa-black-tie"></i>  Cargo del usuario
                        </label>
                        <select name="cargo_id" class="form-control">
                            @foreach ($cargos as $cargo)
                            <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
                            @endforeach
                        </select>
                        <label for="">
                            <i class="fab fa-buffer"></i>  Almacen
                        </label>
                        <select name="almacene_id" class="form-control">
                            @foreach ($almacenes as $almacene)
                            <option value="{{ $almacene->id }}">{{ $almacene->nombre }}</option>
                            @endforeach
                        </select>
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