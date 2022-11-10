<!-- Modal -->
{!! Form::open(['route'=>['administrador.almacenes.encargados.destroy',$encargado->id],'method'=>'delete']) !!}
<div class="modal fade" id="modal-delete-{{ $encargado->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmar accion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-left">
          <p>Esta seguro que desea eliminar al encargado <b>{{ $encargado->user->name }}</b> con cargo <b>{{ $encargado->cargo->nombre }}</b> en el almacen <b>{{ $encargado->almacene->nombre }}</b></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Confirmar</button>
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}