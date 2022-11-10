@extends('adminlte::page')
@section('title', 'Lista de cargo')
@section('content_header')
    <h1>Lista de cargos existentes</h1>
    <a href="{{ route('administrador.cargos.create') }}">
        <button class="btn btn-primary"> 
            <i class="fas fa-folder-open"></i> Crear nuevo cargo
        </button>
    </a>
    @include('layouts.info')
@stop
@section('content')
<table class="table">
    <thead>
        <tr>
          <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cargos as $cargo)
            <tr>
                <td>{{ $cargo->nombre }}</td>
                <td>
                <a href="{{ route('administrador.cargos.edit', $cargo->id) }}">
                    <button class="btn btn-primary">
                        <i class="far fa-edit"></i> Editar
                    </button>
                </a>
                <a data-toggle="modal" data-target="#modal-delete-{{ $cargo->id }}">
                    <button class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </button>
                </a>
                </td>
            </tr>
            @include('administrador.cargos.modal')
        @endforeach
    </tbody>
</table>
@stop