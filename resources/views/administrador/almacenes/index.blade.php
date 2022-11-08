@extends('adminlte::page')
@section('title', 'Almacenes')
@section('content_header')
<h1>Almacenes</h1>
<a href="almacenes/create"><button class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo almacen</button></a>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Observacion</th>
        </tr>
    </thead>
    <tbody>
        {{-- @foreach ($almacenes as $almacene) --}}
            <tr>
                {{-- <td>{{ $almacene->nombre }}</td>
                <td>{{ $almacene->observacion }}</td>
                <td>
                    <a href="{{ asset('almacenes/'.$almacene->id."/edit") }}">Editar</a>
                </td> --}}
            <td> 
                     <!-- Button trigger modal -->
           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
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
                   <button type="button" class="btn btn-danger">Confirmar</button>
                   </div>
               </div>
               </div>
           </div>
           </div>
           <td>
            <a href="almacenes/{id}/edit"><button class="btn btn-primary"><i class="fas fa-pen"></i></button></a>
           </td>
            </tr>
        {{-- @endforeach --}}
    </tbody>
</table>
@endsection