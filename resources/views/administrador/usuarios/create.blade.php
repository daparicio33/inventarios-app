@extends('adminlte::page')
@section('title', 'Usuarios')
@section('content_header')
    <h1 class="text-primary"><i class="fas fa-marker"></i> Crear Usuario</h1>
@stop
@section('content')
{!! Form::open(['route'=>'administrador.usuarios.store','method'=>'post','enctype'=>'multipart/form-data']) !!}
    <div class="row">
        <div class="col-sm-12 col-md-7 col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-list-alt"></i> Datos del Usuario</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">
                            <i class="fas fa-user"></i>Nombre
                        </label>
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        {{-- <input type="text" class="form-control"> --}}
                        <label for="" class="mt-2">
                            <i class="fas fa-at"></i> Email
                        </label>
                        {!! Form::text('email', null, ['class'=>'form-control']) !!}
                        {{-- <input type="email" class="form-control"> --}}
                        <label for="">
                            <i class="fas fa-key"></i> Password
                        </label>
                        {!! Form::text('password', null, ['class'=>'form-control']) !!}
                        {{-- <input type="password" class="form-control"> --}}
                    </div>

                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
@stop