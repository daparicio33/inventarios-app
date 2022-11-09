@extends('adminlte::page')
@section('title')
@section('content_header')
    <h1>Tipos de movimientos existentes</h1>
    <a href="{{ route('inventarios.movimientos.tmovimientos.create') }}">
        <button class="btn btn-primary"> 
            <i class="fas fa-folder-open"></i>Crear nuevo tipo
        </button>
    </a>
@stop
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Factor</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($tmovimientos as $tmovimiento)
                <tr>
                    <td>{{ $tmovimiento->nombre }}</td>
                    <td>{{ $tmovimiento->factor }}</td>
                    <td>
                        <a href="{{ route('inventarios.movimientos.tmovimientos.edit', $tmovimiento->id) }}"><button class="btn btn-primary">Editar</button></a>
                        <a href="{{ route('inventarios.movimientos.tmovimientos.destroy',$tmovimiento->id) }}"><button class="btn btn-danger">Eliminar</button></a>
                    </td>
                </tr>
                @include('inventarios.movimientos.tmovimientos.modal')
                @endforeach

            </tbody>
    </table>

@stop