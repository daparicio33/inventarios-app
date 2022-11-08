@extends('adminlte::page')
@section('title')
@section('content_header')
    <h1>Tipos de movimientos existentes</h1>
    <a href="{{ asset('inventarios/tmovimientos/create') }}">
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
{{--         @foreach ($tmovimientos as $tmovimiento)
            <td>{{ $tmovimiento->Nombre }}</td>
            <td>{{ $tmovimiento->factor }}</td>
        @endforeach --}}