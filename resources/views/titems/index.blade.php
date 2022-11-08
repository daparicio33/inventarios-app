@extends('adminlte::page')
@section('title', 'Tipos de Items')
@section('content_header')
    <h2>Tipos de Items</h2>
@stop
@section('content')
<style>
 .td{
    width: 400px;
 }
 .td1{
    width: 10px;
 }
 .td2{
    width: 20px;
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
</style>
<button class="btn btn-primary" type="button" data-toggle='modal' data-target='#modalcreate' ><i class="fas fa-plus"></i>
 Nuevo Tipo de Item</button>
<table class="table">
    <thead>
        <tr>
            <td lass="td1">#</td>
            <td class="td"><i class="fab fa-perbyte"></i> Nombre</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="td1">1</td>
            <td class="td">Llaves</td>
            <td class="td2"><button class="btn btn-primary" type="button" data-toggle='modal' data-target='#modaledit' ><i class="fas fa-pen"></i>
            <td class="td2"><button class="btn btn-danger" type="button" data-toggle='modal' data-target='#modaldelete' ><i class="fas fa-trash"></i>
            </td>
        </tr>
    </tbody>
</table>
<body>
{{-- {!! Form::open(['route'=>'titems.store', method=>'post']) !!} --}}
<div class="container">
    <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="modalcreate">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Nuevo Tipo de Item</h3>
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
                    <div class="modal-header">
                        <h3>Editar Tipo de Item</h3>
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
                <div class="modal-header">
                    <h3>EliminarTipo de Item</h3>
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
