@extends('adminlte::page')
@section('title', 'Movimientos')
@section('content_header')
    <h1>Movimientos de Almacen</h1>
    <a href="{{ route('almaceneros.create') }}">
        <button class="btn btn-primary"> 
            <i class="fas fa-paper-plane"></i> Nuevo
        </button>
    </a>
    @include('layouts.info')
@stop
@section('content')
<div class="table-responsive">
    <table class="table table-striped" style="white-space: nowrap; overflow-x: auto;">
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
                <tr @if($movimiento->movimiento_id == null) class="text-danger" @else class="bg-secondary" @endif>
                    <td>{{ ceros($movimiento->numero) }}</td>
                    <td>{{ $movimiento->tmovimiento->nombre }}</td>
                    <td>{{ date('d-m-Y',strtotime($movimiento->fecha)) }}</td>
                    <td>{{ $movimiento->hora }}</td>
                    <td>{{ $movimiento->cliente->apellido }}, {{ $movimiento->cliente->nombre }}</td>
                    <td>{{ $movimiento->user->email }}</td>
                    <td>@isset($movimiento->fdevolucion) {{ date('d-m-Y',strtotime($movimiento->fdevolucion)) }} @endisset</td>
                    <td style="text-align: center; width: 160px">
                        @if(!isset($movimiento->movimiento_id))
                            <a data-toggle="modal" data-target="#modal-devolucion-{{ $movimiento->id }}" title="registrar devolucion" class="btn btn-success">
                                <i class="fas fa-undo-alt"></i>
                            </a>
                            <a data-toggle="modal" data-target="#modal-mostrar-{{ $movimiento->id }}"  title="mostrar" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                        @endif
                        <a href="{{ route('almaceneros.imprimir',$movimiento->id) }}" class="btn btn-warning" title="imprimir">
                            <i class="fas fa-print"></i>
                        </a>
                        <a data-toggle="modal" data-target="#modal-delete-{{ $movimiento->id }}" class="btn btn-danger" title="eliminar">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                {{-- fila para mostrar devolucion --}}
                @isset($movimiento->movimiento_id)
                <tr>
                    <td></td>
                    <td colspan="7">
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Tipo</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Usuario</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($movimiento->devoluciones as $devolucion )
                                    <tr>
                                        <td>{{ ceros($devolucion->numero) }}</td>
                                        <td>{{ $devolucion->tmovimiento->nombre }}</td>
                                        <td>{{ date('d-m-Y',strtotime($devolucion->fecha)) }}</td>
                                        <td>{{ $devolucion->hora }}</td>
                                        <td>{{ $devolucion->user->email }}</td>
                                        <td>
                                            <a href="{{ route('almaceneros.imprimir',$devolucion->id) }}" class="btn btn-warning" title="imprimir">
                                                <i class="fas fa-print"></i>
                                            </a>
                                            <a data-toggle="modal" data-target="#modal-delete-devolucion{{ $devolucion->id }}" class="btn btn-danger" title="eliminar">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                @include('almaceneros.devolucion')
                            </tbody>
                        </table>
                    </td>
                </tr>
                @endisset
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