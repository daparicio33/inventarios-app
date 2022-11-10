@extends('adminlte::page')
@section('title', 'Tipos de Items')
@section('content_header')
    <h2>Tipos de Items</h2>
@stop
@section('content')
<style>
 .td{
    width: 80%;
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
    background-color: rgba(0, 81, 255, 0.89);
    color: white;
 }
 #editar{
    color: white;
    background-color: rgb(3, 85, 21);
 }
 #eliminar{
    color: white;
    background-color: red;
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

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-lg-12">
            <div>
                <table class="table" style="width: 100%">
                    <thead class="text-center">
                        <tr>
                            <th class="td1"><i class="fas fa-list-ol"></i></th>
                            <th class="td">Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="td1">1</td>
                            <td class="td">llaves</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" data-toggle='modal' data-target='#modaledit' class="btn btn-primary"><i class="fas fa-pen"></i></button>
                                <button type="button" data-toggle='modal' data-target='#modaldelete' class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<body>
{{-- {!! Form::open(['route'=>'titems.store', method=>'post']) !!} --}}
<div class="container">
    <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="modalcreate">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="crear" class="modal-header">
                    <h5>Nuevo</h5>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label for="">Nombre</label>
                    <input class="form-control" type="text" name="nombre">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-upload"></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- {!! Form::close() !!}
{!! Form::open(['route'=>'titems.edit', method=>'post']) !!} --}}
    <div class="container">
        <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="modaledit">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div id="editar" class="modal-header">
                        <h4>Editar</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <label for="">Nombre</label>
                        <input class="form-control" type="text" name="nombre">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-upload"></i> Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--     {!! Form::close() !!}
    {!! Form::open(['route'=>'titems.store', method=>'post']) !!} --}}
<div class="container">
    <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="modaldelete">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="eliminar" class="modal-header">
                    <h4>Eliminar</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input class="form-control" type="text" name="nombre">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger"><i class="fas fa-thumbs-up"></i> Confirmar</button>
                    <button data-dismiss="modal" class="btn btn-primary"><i class="fas fa-ban"></i> Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- {!! Form::close() !!} --}}
</body>
@stop
