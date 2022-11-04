@extends('adminlte::page')
@section('title', 'Movimientos')
@section('content_header')
    <h1>Movimientos</h1>
    <a href="{{ route('inventarios.movimientos.create') }}">
        <button class="btn btn-primary"> 
            <i class="fas fa-paper-plane"></i> Nuevo Movimiento
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
                    <td>Nombre de Cliente</td>
                    <td>correo@idexperujapon.edu.pe</td>
                    <td style="text-align: center; width: 160px">
                        <a data-toggle="modal" data-target="#modal-mostrar-{{ $movimiento->id }}"  title="mostrar" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="" class="btn btn-warning btn-sm" title="imprimir">
                            <i class="fas fa-print"></i>
                        </a>
                        <a data-toggle="modal" data-target="#modal-delete-{{ $movimiento->id }}" class="btn btn-danger btn-sm" title="eliminar">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @include('inventarios.movimientos.modal')
            @endforeach
        </tbody>
    </table>
</div>

@stop
@section('js')
    <script>
        
    </script>
@stop