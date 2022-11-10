{!! Form::open(['route'=>['inventarios.titems.update',$titem->id], 'method'=>'put']) !!}
<div class="container">
    <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="modaledit{{ $titem->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="editar" class="modal-header">
                    <h4>Editar</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label for="">Nombre</label>
                    <input class="form-control" type="text" name="nombre" value="{{ $titem->nombre }}">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-upload"></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}