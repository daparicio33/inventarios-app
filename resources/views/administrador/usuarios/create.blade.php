{!! Form::open(['route'=>'administrador.usuarios.store', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}
<div class="container">
    <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="modalcreate">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="editar" class="modal-header btn btn-success">
                    <h4><i class="fas fa-marker"></i>  Crear</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                            <div class="card">
                              <div class="card-header">
                                <div class="row mt-3">
                                <div class="col-sm-12 col-md-8 col-lg-8 mx-auto ">
                                  <div class="card">
                                      <img id='imgpreview' style="max-width: 90%" src="{{ Storage::url('public/userspics/defaultPic.png') }}" class="rounded mx-auto d-block" alt="...">
                                      <div class="card-body">
                                          <x-adminlte-input-file onchange="previewimage(event,'#imgpreview')" name="url" >
                                              <x-slot name="prependSlot">
                                                  <div class="input-group-text bg-primary">
                                                      <i class="fas fa-upload"></i>
                                              </x-slot>
                                          </x-adminlte-input-file>
                                      </div>
                                  </div>
                                </div>
                              </div>
                              </div>
                              <div class="card-body">
                                <label  for="validationDefault01" class="form-label">Nombre</label>
                                <input type="text" name="name" class="form-control" id="validationdefault1" required>
                                <label for="validationDefault02">Correo</label>
                                <input type="email" name="email" class="form-control" id="validationDefault02" required>
                                <label for="validationDefault03">Contraseña</label>
                                <input type="password" name="password" class="form-control" id="validationDefault03" required>
                              </div>
                                <div class="card-footer">
                                    <button class="btn btn-success" type="submit"><i class="fas fa-upload"></i> Guardar</button>
                                    <button data-dismiss="modal" class="btn btn-success"><i class="fas fa-ban"></i> Cancelar</button>                                </div>
                              </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
