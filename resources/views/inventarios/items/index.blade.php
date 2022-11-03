@extends('adminlte::page')

@section('title', 'Items')

@section('content_header')
    <h1>Items</h1>
    <a href="{{ route('inventarios.items.create') }}">
        <button class="btn btn-primary"> 
            <i class="fas fa-folder-open"></i> Nuevo Item
        </button>
    </a>
@stop

@section('content')
    <p>Lista de Items del sistema.</p>
    
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
                <tr @if (count($item->hijos) != 0) class="bg-primary" @endif>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->descripcion }} <span class="badge bg-danger rounded-pill">{{ count($item->hijos) }}</span></td>
                    <td>{{ $item->marca->nombre }}</td>
                    <td>{{ $item->titem->nombre }}</td>
                    <td></td>
                </tr>
                @if (count($item->hijos) != 0) 
                        <tr>
                            <td></td>
                            <td colspan="3">
                                <ol class="list-group list-group-numbered">
                                    @foreach ($item->hijos as $hijo)
                                        <li class="list-group-item">{{ $hijo->codigo }} - {{ $hijo->descripcion }}</li>
                                    @endforeach
                                </ol>   
                            </td>
                        </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@stop
@section('js')
    <script>
        
    </script>
@stop