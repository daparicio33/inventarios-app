@extends('adminlte::page')
@section('title', 'Usuarios')
@section('content_header')
    <h1>Usuarios</h1>
        <a href="{{ route('administrador.usuarios.create') }}">
        <button class="btn btn-primary"> 
            <i class="fas fa-folder-open"></i> Nuevo Usuario
        </button>
    </a>
    
@stop

@section('content')
    <p>Lista de Usuarios</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>EMAIL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user )
                    <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('administrador.usuarios.edit',$user->id) }}" class="btn btn-success btn-sm">
                                    <i class="far fa-edit"></i>  
                                </a>
                                <a data-toggle="modal" data-target="#modal-delete-{{ $user->id }}">
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </a>
                                </td>
                            </tr>
                            @include('administrador.usuarios.modal')
                        @endforeach
                    </tbody>
                </table>
                @stop      