<!-- Modal -->
<div class="container">
    <div class="modal fade" id="modal-delete-{{ $almacene->id }}" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
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