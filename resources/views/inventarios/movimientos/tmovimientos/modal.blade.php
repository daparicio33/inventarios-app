{!! form::open(['route'=>'inventarios.tmovimientos.destroy',$tmovimiento->id],'method'=>'delete') !!}
<div class="modal faden" id="modal-delete-{{ $tmovimiento->id }}" tabbindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal title text-danger" id="exampleModalLabel">
                    <i class="fas fa-examation-triangle"></i>
                    Confirmar
                </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                ¿Seguro que desea eliminar?
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
