@extends('adminlte::page')
@section('title', 'Encargados')
@section('content_header')
    <h1>Encargados</h1>
    <a href="{{ route('administrador.almecenes.encargados.create') }}">
        <button class="btn btn-primary"> 
            <i class="fas fa-folder-open"></i> Nuevo Encargado
        </button>
    </a>
@stop

@section('content')
    <p>Lista de encargados</p>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre de usuario</th>
                <th>Cargo de usuario</th>
                <th>Almacen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($encargados as $encargado)
                <tr>
                    <td>{{ $encargado->user->name }}</td>
                    <td>{{ $encargado->cargo->nombre }}</td>
                    <td>{{ $encargado->almacen->nombre }}</td>
                    <td>
                        <a href="{{ route('administrador.almacenes.encargados.edit',$encargado->id) }}" class="btn btn-success btn-sm">
                            <i class="far fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $encargado->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
