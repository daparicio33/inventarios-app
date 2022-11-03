@extends('adminlte::page')
@section('title', 'Crear Item')
@section('content_header')
    <h1>Registrar Movimiento</h1>
    <p>registrar el movimiento del inventario</p>
@stop
@section('content')
{!! Form::open(['route'=>'inventarios.movimientos.store','method'=>'post']) !!}
<div class="row">
    {{-- encabezados del formulario --}}
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Datos</h5>
            </div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="ingrese DNI" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary ml-1" type="button" id="button-addon2">
                        <i class="fab fa-searchengin"></i>
                        Buscar
                    </button>
                </div>
                {{-- fechas y hora --}}
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <label for="">Fecha</label>
                        {!! Form::date('fecha', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <label for="">Hora</label>
                        {!! Form::time('hora', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
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
            </div>
            <div class="card-body">
                <div class="input-group">
                    <button class="btn btn-outline-primary mb-1" id="add" onclick="agregar()" type="button">
                        <i class="fas fa-plus"></i>
                    </button>
                    <select id="dditems"  class="form-control" aria-label="Example select with button addon">
                      <option selected value="0">Elija...</option>
                      @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->codigo }} - {{ $item->titem->nombre }} - {{ $item->marca->nombre }} - {{ $item->descripcion }}</option>
                      @endforeach
                    </select>
                </div>
                <table class="table">
                    <thead>
                        <tr>
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
            if(document.getElementById('fila'+item.value)){
                var txt = document.getElementById('txt'+item.value);
                txt.value = parseInt(txt.value)+1;
            }else{
                var texto = item.options[item.selectedIndex].text;
                if (item.value == 0){
                    alert('selecione algun elemento');
                }else{
                    //selecciono el body de la tabla
                    var tbody = document.getElementById('tbody');
                    //creare una fila
                    var tr = document.createElement('tr');
                    tr.id = 'fila'+item.value;
                    //creare las columnas
                    var td1 = document.createElement('td');
                    var td2 = document.createElement('td');
                    var td3 = document.createElement('td');
                    var td4 = document.createElement('td');
                    td1.appendChild(document.createTextNode(item.value));
                    //vamos a poner el texto con los id de los elementos agregados
                    var item_id = document.createElement('input');
                    item_id.type = 'hidden';
                    item_id.name = 'items_id[]';
                    item_id.value = item.value;
                    td1.appendChild(item_id);
                    td2.appendChild(document.createTextNode(texto));
                    //creamos cuadro de texto
                    var text = document.createElement('input');
                    text.type = 'number';
                    text.id = 'txt'+item.value;
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
                    btn.setAttribute('onclick','deleterow('+item.value+')');
                    td4.appendChild(btn);
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