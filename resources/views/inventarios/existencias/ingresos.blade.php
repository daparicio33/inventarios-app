@extends('adminlte::page')
@section('title', 'Existencias')
@section('content_header')
<h1>Existencias del Inventario</h1>
<ul class="nav active bg-light rounded border border-info mt-2 mb-2">
    <li class="nav-item">
        <a class="nav-link btn btn-light" href="{{ route('inventarios.existencias.index') }}">
            <i class="fas fa-door-open"></i> Existencias
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link btn btn-light active" href="{{ route('inventarios.existencias.show','ingresos') }}">
            <i class="fas fa-share-square"></i> Ingresos
        </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled">Disabled</a>
    </li>
</ul>    

@stop
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Lista de Items con sus existencias</h5>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Descripción</th>
                    <th>Marca</th>
                    <th>Tipo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr @if (count($item->hijos) != 0) class="bg-info" @endif>
                        <td>{{ $item->codigo }}</td>
                        <td>{{ $item->descripcion }} <span class="badge bg-danger rounded-pill">{{ count($item->hijos) }} Items</span></td>
                        <td>{{ $item->marca->nombre }}</td>
                        <td>{{ $item->titem->nombre }}</td>
                        <td>
                            <span class="badge bg-secondary rounded-pill">en almacen {{ ingresos($item->id) }}</span>
                        </td>
                    </tr>
                    @if (count($item->hijos) != 0) 
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <ol class="list-group list-group-numbered">
                                        @foreach ($item->hijos as $hijo)
                                            <li class="list-group-item">{{ $hijo->codigo }} - {{ $hijo->descripcion }} <span class="badge bg-primary rounded-pill">En almacen {{ ingresos($hijo->id) }}</span></li>
                                        @endforeach
                                    </ol>   
                                </td>
                            </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection