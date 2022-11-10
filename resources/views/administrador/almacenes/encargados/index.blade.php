@extends('adminlte::page')
@section('title', 'Encargados')
@section('content_header')
<h1><i class="fab fa-black-tie"></i> Encargados</h1>
    <a href="{{ route('administrador.almacenes.encargados.create') }}">
        <button class="btn btn-primary"> 
            <i class="fas fa-folder-open"></i> Nuevo Encargado
        </button>
    </a>
    @include('layouts.info')
@stop

@section('content')
    <h3><p>Lista de encargados</p></h3>
    <table class="table">
        <thead>
            <tr>
                <th><i class="fas fa-user"></i>  Nombre de usuario</th>
                <th><i class="fab fa-black-tie"></i>  Cargo del usuario</th>
                <th><i class="fab fa-buffer"></i>  Almacen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($encargados as $encargado)
                <tr>
                    <td>{{ $encargado->user->name }}</td>
                    <td>{{ $encargado->cargo->nombre }}</td>
                    <td>{{ $encargado->almacene->nombre }}</td>
                    <td style="width: 130px; text-align: center">
                        <a title="editar" href="{{ route('administrador.almacenes.encargados.edit',$encargado->id) }}" class="btn btn-success">
                            <i class="far fa-edit"></i>
                        </a>
                        <a title="eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $encargado->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        
                    </td>
                </tr>
                @include('administrador.almacenes.encargados.modal')
            @endforeach
        </tbody>
    </table>
@stop
