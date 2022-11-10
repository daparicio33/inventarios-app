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
                <tr @if (count($item->hijos) != 0) class="bg-info" @endif>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->descripcion }} <span class="badge bg-danger rounded-pill">{{ count($item->hijos) }} items</span></td>
                    <td>{{ $item->marca->nombre }}</td>
                    <td>{{ $item->titem->nombre }}</td>
                    <td>
                        {{-- <img src="{{ Storage::url($item->url) }}" width="30px" class="rounded mx-auto d-block" alt="no hay imagen"> --}}
                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-imagen-{{ $item->id }}">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('inventarios.items.edit',$item->id) }}" class="btn btn-success btn-sm">
                            <i class="far fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @if (count($item->hijos) != 0)
                        <tr>
                            <td></td>
                            <td colspan="4">
                                <ol class="list-group list-group-numbered">
                                    @foreach ($item->hijos as $hijo)
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-10 col-lg-10">
                                                    {{ $hijo->codigo }} - {{ $hijo->descripcion }}
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-lg-2">
                                                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-imagen-{{ $hijo->id }}">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('inventarios.items.edit',$hijo->id) }}" class="btn btn-success btn-sm">
                                                       <i class="far fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $hijo->id }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        @include('inventarios.items.modal1')
                                    @endforeach
                                </ol>
                            </td>
                        </tr>
                @endif
                @include('inventarios.items.modal')
            @endforeach
        </tbody>
    </table>
@stop
@section('js')
    <script>
        
    </script>
@stop