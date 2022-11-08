@extends('adminlte::page')
@section('title', 'Almacenes')
@section('content_header')
<h1>Almacenes</h1>
<a href="{{ route('administrador.almacenes.create') }}"><button class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo almacen</button></a>
<div class="table-responvise">
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Observacion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($almacenes as $almacene)
            <tr>
                <td>{{ $almacene->nombre }}</td>
                <td>{{ $almacene->observacion }}</td>
                    <td style="width: 130p; text-align: center">
                        <a title="Editar" href="{{ route('administrador.almacenes.edit',$almacene->id) }}" class="btn btn-primary">
                            <i class="fas fa-pen"></i>
                        </a>
                        <button title="Eliminar" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $almacene->id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
            </tr>
            @include('administrador.almacenes.modal')
        @endforeach
    </tbody>
</table>
</div>
@endsection