@extends('adminlte::page')
@section('title', 'Usuarios')
@section('content_header')
    <h1>Usuarios</h1>
@stop
@section('content')
<style>
  #foto{
    border: 1px solid rgba(17, 2, 71, 0.623)55, 34, 34);
    border-radius: 40px;
    height: 40px;
    width: 40px;
  }
</style>
<div class="container">
  <div class="row">
      <div class="col-sm-6 col-lg-12">
          <button id="nuevo" class="btn btn-primary" type="button" data-toggle='modal' data-target='#modalcreate' ><i class="fas fa-plus"></i>
          Nuevo</button>    
      </div>    
  </div>       
</div>
@include('administrador.usuarios.create')
    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-10 mx-auto">
        <table class="table">
          <thead>
            <tr>
              <th>Foto</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th style="text-align:center">Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td><img id="foto" src="{{ Storage::url($user->url) }}"></td>
                <td style="width: 250px">{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td style="text-align:center">
                  <div class="btn-group mx-auto">
                    <button type="button" data-toggle='modal' data-target='#modaledit{{ $user->id }}' class="btn btn-primary btn-sm"><i class="fas fa-pen-nib"></i></button>
                    <button type="button" data-toggle='modal' data-target='#modaldelete{{ $user->id }}' class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              @include('administrador.usuarios.edit')
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
{!! Form::open(['route'=>['administrador.usuarios.destroy',$user->id], 'method'=>'delete']) !!}
<div class="container">
    <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="modaldelete{{ $user->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="eliminar" class="modal-header btn btn-danger">
                    <h4><i class="fas fa-trash"></i> Eliminar</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>¿Esta seguro que desea eliminar el usuario <b>{{ $user->name }}</b>  del sistema?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit"><i class="fas fa-thumbs-up"></i> Confirmar</button>
                    <button data-dismiss="modal" class="btn btn-primary"><i class="fas fa-ban"></i> Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop