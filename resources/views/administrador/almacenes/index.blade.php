@extends('adminlte::page')
@section('title', 'Almacenes')
@section('content_header')
<h1>Almacenes</h1>
<a href="{{ route('administrador.almacenes.create') }}"><button class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo almacen</button></a>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Observacion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($almacenes as $almacene)
            <tr>
                <td>{{ $almacene->nombre }}</td>
                <td>{{ $almacene->observacion }}</td>
                <td style="width: 130p; text-align: center">
                    <a title="Editar" href="{{ route('administrador.almacenes.edit', $almacene->id) }}"><button class="btn btn-primary"><i class="fas fa-pen"></i></button></a>
                </td>
            <td style="width: 130p; text-align: center"> 
                     <!-- Button trigger modal -->
           <button title="Eliminar" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-trash"></i>
           </button>
            </td>
           <!-- Modal -->
           <div class="container">
           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
               <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                   <div class="modal-header">
                   <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar accion</h1>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   </div>
                   <div class="modal-body">
                       <p>Al eliminar este registro no podrá recuperarlo ¿Desea continuar?</p>
                   </div>
                   <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Cancelar</button>
                   {!! Form::open(['route'=>['administrador.almacenes.destroy', $almacene->id], 'method'=> 'delete']) !!}
                   <button type="submit" class="btn btn-danger">Confimar</button>
                   {!! Form::close() !!}
                   </div>
               </div>
               </div>
           </div>
           </div>
          
            </tr>
        @endforeach
    </tbody>
</table>
@endsection