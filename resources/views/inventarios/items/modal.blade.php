<!-- Modal Delete -->
{!! Form::open(['route'=>['inventarios.items.destroy',$item->id],'method'=>'delete']) !!}
<div class="modal fade" id="modal-delete-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-danger" id="exampleModalLabel">
                <i class="fas fa-exclamation-triangle"></i>
                Confirmar Accion
            </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Esta seguro de que desea eliminar este item del sistema, recuerda que si este items tiene asociado otros items, estos tambien seran borrados
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="far fa-times-circle"></i> Cerrar
        </button>
          <button type="submit" class="btn btn-danger">
            <i class="fas fa-trash-alt"></i> Eliminar
        </button>
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}

  <!-- Modal Imagen -->
<div class="modal fade" id="modal-imagen-{{ $item->id }}" tabindex="-2" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">
                <i class="fas fa-images"></i> Imagen
            </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img src="{{ Storage::url($item->url) }}" width="80%" class="rounded mx-auto d-block" alt="no hay imagen">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>