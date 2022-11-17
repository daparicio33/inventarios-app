{!! Form::open(["route"=>["almaceneros.destroy",$devolucion->id],"method"=>"delete"]) !!}
<div class="modal fade" id="modal-delete-devolucion{{ $devolucion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">
          <i class="far fa-question-circle"></i> Confirmar
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Esta seguro que desea eliminar el movimiento # <b>{{ $devolucion->numero }}</b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          <i class="fas fa-times"></i> Cerrar
        </button>
        <button type="submit" class="btn btn-danger">
          <i class="fas fa-trash"></i> Eliminar
        </button>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}