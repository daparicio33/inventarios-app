{!! Form::open(['route'=>['inventarios.titems.destroy',$titem->id], 'method'=>'delete']) !!}
<div class="container">
    <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="modaldelete{{ $titem->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="eliminar" class="modal-header btn btn-danger">
                    <h4><i class="fas fa-trash"></i> Eliminar</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>¿Esta seguro que desea elminar el Tipo de item <b>{{ $titem->nombre }}</b>  del sistema?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit"><i class="fas fa-thumbs-up"></i> Confirmar</button>
                    <button data-dismiss="modal" class="btn btn-primary"><i class="fas fa-ban"></i> Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}