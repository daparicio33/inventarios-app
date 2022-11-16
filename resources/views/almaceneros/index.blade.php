@extends('adminlte::page')
@section('title', 'Movimientos')
@section('content_header')
    <h1>Movimientos de Almacen</h1>
    <a href="{{ route('almaceneros.create') }}">
        <button class="btn btn-primary"> 
            <i class="fas fa-paper-plane"></i> Nuevo
        </button>
    </a>
@stop
@section('content')
<div class="table-responsive">
    <table class="table" style="white-space: nowrap; overflow-x: auto;">
        <thead>
            <tr>
                <th>#</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Cliente</th>
                <th>Usuario</th>
                <th>F. Devolucion</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimientos as $movimiento)
                <tr>
                    <td>{{ $movimiento->numero }}</td>
                    <td>{{ $movimiento->tmovimiento->nombre }}</td>
                    <td>{{ date('d-M-Y',strtotime($movimiento->fecha)) }}</td>
                    <td>{{ $movimiento->hora }}</td>
                    <td>{{ $movimiento->cliente->apellido }}, {{ $movimiento->cliente->nombre }}</td>
                    <td>{{ $movimiento->user->email }}</td>
                    <td>{{ date('d-M-Y',strtotime($movimiento->fdevolucion)) }}</td>
                    <td style="text-align: center; width: 160px">
                        <a data-toggle="modal" data-target="#modal-devolucion-{{ $movimiento->id }}" title="registrar devolucion" class="btn btn-success">
                            <i class="fas fa-undo-alt"></i>
                        </a>
                        <a data-toggle="modal" data-target="#modal-mostrar-{{ $movimiento->id }}"  title="mostrar" class="btn btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="" class="btn btn-warning" title="imprimir">
                            <i class="fas fa-print"></i>
                        </a>
                        <a data-toggle="modal" data-target="#modal-delete-{{ $movimiento->id }}" class="btn btn-danger" title="eliminar">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @include('almaceneros.modal')
            @endforeach
        </tbody>
    </table>
</div>

@stop
@section('js')
    <script>
        
    </script>
@stop