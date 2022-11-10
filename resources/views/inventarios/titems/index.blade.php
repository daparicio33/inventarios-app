@extends('adminlte::page')
@section('title', 'Tipos de Items')
@section('content_header')
    <h2>Tipos de Items</h2>
@stop
@section('content')
<style>
    .td{
        width: 80%;
        text-align: left;
    }
    .td i{
        margin-right: 7px;
    }
    .td1{
        width:5%;
        text-align: center;
    }
    h3{
        font-family: BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: rgba(17, 17, 199, 0.726);
    }
    button{
        margin-bottom: 10px;
        margin-top: 3px;
    }
    label{
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }
    #crear{
        color: white;
    }
    #editar{
        color: white; }
    #eliminar{
        color: white;
    }
    #nuevo{
        margin-bottom: 20px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-lg-12">
            <button id="nuevo" class="btn btn-primary" type="button" data-toggle='modal' data-target='#modalcreate' ><i class="fas fa-plus"></i>
            Nuevo Tipo de Item</button>    
            
        </div>    
    </div>       
</div>
@include('inventarios.titems.create')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-lg-12">
            <div>
                <table class="table" style="width: 100%">
                    <thead class="text-center">
                        <tr>
                            <th class="td1"><i class="fas fa-list-ol"></i></th>
                            <th class="td"><i class="fas fa-toolbox"></i>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($titems as $titem)
                            <tr>
                                <td>{{ $titem->id }}</td>
                                <td>{{ $titem->nombre }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" data-toggle='modal' data-target='#modaledit{{ $titem->id }}' class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                        <button type="button" data-toggle='modal' data-target='#modaldelete{{ $titem->id }}' class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @include('inventarios.titems.edit')
                            @include('inventarios.titems.delete')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<body>


</body>
@stop
