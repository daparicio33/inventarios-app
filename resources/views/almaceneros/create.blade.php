@extends('adminlte::page')
@section('title', 'Crear Item')
@section('content_header')
    <h1>Registrar Prestamo</h1>
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        @include('almaceneros.search')
    </div>
</div>
{!! Form::open(['route'=>'almaceneros.store','method'=>'post']) !!}   
<div class="row">
    {{-- encabezados del formulario --}}
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Datos</h5>
            </div>
            <div class="card-body">
             
                {{-- datos del cliente --}}
                @if (isset($cliente)) 
                    <input type="hidden" value="{{ $cliente->idCliente }}" name="cliente_id">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            {!! Form::label(null, 'Nombre', [null]) !!}
                            {!! Form::text('nombre', $cliente->nombre, ['class'=>'form-control']) !!}
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            {!! Form::label(null, 'Apellido', [null]) !!}
                            {!! Form::text('apellido', $cliente->apellido, ['class'=>'form-control']) !!}
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            {!! Form::label(null, 'Telefono', [null]) !!}
                            {!! Form::text('telefono', $cliente->telefono, ['class'=>'form-control']) !!}
                        </div>
                        <div class="col-sm-12 col-md-8 col-lg-8">
                            {!! Form::label(null, 'Direccion', [null]) !!}
                            {!! Form::text('direccion', $cliente->direccion, ['class'=>'form-control']) !!}
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            {!! Form::label(null, 'Email', [null]) !!}
                            {!! Form::text('email', $cliente->email, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                @endif
                {{-- fechas y hora --}}
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <label for="">F Entrega</label>
                        {!! Form::date('fecha', null, ['class'=>'form-control']) !!}
                        <small class="text-danger">@error('fecha') {{ $message }} @enderror</small>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <label for="">F Regreso</label>
                        {!! Form::date('fdevolucion', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <label for="">Hora</label>
                        {!! Form::time('hora', null, ['class'=>'form-control']) !!}
                        <small class="text-danger">@error('hora') {{ $message }} @enderror</small>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <label for="">T. Movimiento</label>
                        {!! Form::select('tmovimiento_id', $tmovimientos, 4, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- datos de los items de prestamos --}}
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Lista de Items</h5>
                <small class="text-danger">@error('items_id') {{ $message }} @enderror</small>
            </div>
            <div class="card-body">
                <div class="input-group">
                    <button class="btn btn-outline-primary mb-1" id="add" onclick="agregar()" type="button">
                        <i class="fas fa-plus"></i>
                    </button>
                    <select id="dditems"  class="form-control" aria-label="Example select with button addon">
                      <option selected value="0">Elija...</option>
                      @foreach ($items as $item)
                        <option value="{{ $item->id }}:{{ $item->url }}" >{{ $item->codigo }} - {{ $item->titem->nombre }} - {{ $item->marca->nombre }} - {{ $item->descripcion }}</option>
                      @endforeach
                    </select>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 4rem"></th>
                            <th>ID</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('#dditems').select2();
        });
 
        function agregar(){
            //selecion del elemento
            var item = document.getElementById('dditems');
            //selection del texto
            var datos = item.value.split(':');
            var id = datos[0];
            var url = datos[1].split('/');
            if(document.getElementById('fila'+id)){
                var txt = document.getElementById('txt'+id);
                txt.value = parseInt(txt.value)+1;
            }else{
                var texto = item.options[item.selectedIndex].text;
                if (id == 0){
                    alert('selecione algun elemento');
                }else{
                    //selecciono el body de la tabla
                    var tbody = document.getElementById('tbody');
                    //creare una fila
                    var tr = document.createElement('tr');
                    tr.id = 'fila'+id;
                    //creare las columnas
                    var td0 = document.createElement('td');
                    var img = document.createElement('img');
                    img.src = '/storage/'+url[1]+'/'+url[2];
                    img.style.width = '4rem';
                    img.class = 'rounded mx-auto d-block';
                    td0.appendChild(img);
                    var td1 = document.createElement('td');
                    var td2 = document.createElement('td');
                    var td3 = document.createElement('td');
                    var td4 = document.createElement('td');

                    td1.appendChild(document.createTextNode(id));
                    //vamos a poner el texto con los id de los elementos agregados
                    var item_id = document.createElement('input');
                    item_id.type = 'hidden';
                    item_id.name = 'items_id[]';
                    item_id.value = id;
                    td1.appendChild(item_id);
                    td2.appendChild(document.createTextNode(texto));
                    //creamos cuadro de texto
                    var text = document.createElement('input');
                    text.type = 'number';
                    text.id = 'txt'+id;
                    text.setAttribute('class','form-control');
                    text.value = 1;
                    text.name = "cantidad[]";  
                    td3.appendChild(text);
                    td3.setAttribute('style','width: 15%');
                    //creamos el boton de elminar
                    var btn = document.createElement('a')
                    var i = document.createElement('i');
                    i.setAttribute('class','fas fa-trash')
                    btn.appendChild(i);
                    btn.setAttribute('class','btn btn-danger')
                    btn.title= 'eliminar elemento';
                    btn.setAttribute('onclick','deleterow('+id+')');
                    td4.appendChild(btn);
                    tr.appendChild(td0);
                    tr.appendChild(td1);
                    tr.appendChild(td2);
                    tr.appendChild(td3);
                    tr.appendChild(td4);
                    tbody.appendChild(tr);
                }
            }
        }
        function deleterow(id){
            document.getElementById('fila'+id).remove();
        }
    </script>
@stop