@extends('adminlte::page')
@section('title', 'Lista: Marcas')
@section('content_header')
    <h1>Tipos de marcas existentes</h1>
    <a href="{{ route('inventarios.marcas.create') }}">
        <button class="btn btn-primary"> 
            <i class="fas fa-folder-open"></i> Crear nueva marca
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
        @foreach ($marcas as $marca)
            <tr>
                <td>{{ $marca->nombre }}</td>
                <td>
                <a href="{{ route('inventarios.marcas.edit', $marca->id) }}">
                    <button class="btn btn-primary">
                        <i class="far fa-edit"></i> Editar
                    </button>
                </a>
                <a data-toggle="modal" data-target="#modal-delete-{{ $marca->id }}">
                    <button class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </button>
                </a>
                </td>
            </tr>
            @include('inventarios.marcas.modal')
        @endforeach
    </tbody>
</table>
@stop