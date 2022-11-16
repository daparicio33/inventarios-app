{!! Form::open(["route"=>["inventarios.movimientos.destroy",$movimiento->id],"method"=>"delete"]) !!}
<div class="modal fade" id="modal-delete-{{ $movimiento->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        Esta seguro que desea eliminar el movimiento # <b>{{ $movimiento->numero }}</b>
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
<div class="modal fade" id="modal-mostrar-{{ $movimiento->id }}" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-info" id="exampleModalLabel">
            <i class="fas fa-clipboard-list"></i> Lista de Detalles
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-1 bg-secondary pt-2 pb-2">
              
            </div>
            <div class="col-sm-2 bg-secondary pt-2 pb-2">
              <b>Cant.</b>
            </div>
            <div class="col-sm-9 bg-secondary pt-2 pb-2">
              <b>Descripcion</b>
            </div>
            @foreach ($movimiento->detalles as $detalle)
              <div class="col-sm-1 pt-1 pb-1">
                {!! Form::open(['route'=>['inventarios.movimientos.detalles.destroy',$detalle->id],'method'=>'delete']) !!}
                <button class="btn btn-danger" type="submit" title="eliminar">
                  <i class="far fa-trash-alt"></i>
                </button>
                {!! Form::close() !!}
              </div>
              <div class="col-sm-2 pt-1 pb-1 d-flex align-items-center">
                {{ $detalle->cantidad }}
              </div>
              <div class="col-sm-9 pt-1 pb-1 d-flex align-items-center">
                {{ $detalle->item->titem->nombre }} - {{ $detalle->item->marca->nombre }} - {{ $detalle->item->descripcion }}
              </div>
            @endforeach
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">
            <i class="fas fa-times"></i> Cerrar
          </button>
        </div>
      </div>
    </div>
  </div>
{{-- modal para registrar las devoluciones --}}
{!! Form::open(['route'=>['almaceneros.devoluciones',$movimiento->id],'method'=>'post']) !!}
  <div class="modal fade" id="modal-devolucion-{{ $movimiento->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <p>Esta seguro que desea registrar el regreso de prestamo #<b>{{ $movimiento->numero }}</b> al inventario</p>
          <div class="row">
            {!! Form::hidden('movimiento_id', $movimiento->id, [null]) !!}
            @foreach ($movimiento->detalles as $detalle)
              <div class="col-sm-2">
                  <x-adminlte-input-switch name="iswText-{{ $detalle->id }}" data-on-text="SI" data-off-text="NO"
                  data-on-color="teal" checked/>
              </div>
              <div class="col-sm-10">
                  {{ $detalle->item->descripcion }}
              </div>
            @endforeach
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Cerrar
          </button>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-undo-alt"></i> Aceptar
          </button>
        </div>
      </div>
    </div>
  </div>
{!! Form::close() !!}

