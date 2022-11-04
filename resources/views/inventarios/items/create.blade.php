@extends('adminlte::page')
@section('title', 'Crear Item')
@section('content_header')
    <h1 class="text-primary"><i class="fas fa-marker"></i> Crear Item</h1>
@stop
@section('content')
    {!! Form::open(['route'=>'inventarios.items.store','method'=>'post','enctype'=>'multipart/form-data']) !!}
    <div class="row">
        <div class="col-sm-12 col-md-7 col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-list-alt"></i> Datos del Producto</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">
                            <i class="fas fa-code"></i> Código
                        </label>
                        {!! Form::text('codigo', null, ['class'=>'form-control']) !!}
                        <label for="" class="mt-2">
                            <i class="fas fa-stream"></i> Descripcion
                        </label>
                        {!! Form::textarea('descripcion', null, ['class'=>'form-control', 'rows'=>'3']) !!}
                        <div class="row mt-2" id="marcatipo">
                            <div class="col-sm-12 col-md-6">
                                <label for="">
                                    <i class="fab fa-markdown"></i> Marca
                                </label>
                                {!! Form::select('marca_id', $marcas, null, ['class'=>'form-control','id'=>'marca_id']) !!}
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="">
                                    <i class="fas fa-text-height"></i> Tipo
                                </label>
                                {!! Form::select('titem_id', $titems, null, ['class'=>'form-control','id'=>'titem_id']) !!}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="">
                                <i class="fas fa-superscript"></i> Item padre
                            </label>
                            <select name="item_id" id="item_id" class="form-control" onchange="selectpadre()">
                                <option value="0" class="form-control" >Sin padre</option>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-5 col-lg-5">
            <div class="card">
                <img id='imgpreview' style="max-width: 90%" src="{{ Storage::url('public/items/defaultitem.png') }}" class="rounded mx-auto d-block" alt="...">
                <div class="card-body">
                    <x-adminlte-input-file onchange="previewimage(event,'#imgpreview')" name="url" igroup-size="sm" placeholder="Elija un archivo...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-primary">
                                <i class="fas fa-upload"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-file>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('#marca_id').select2();
            $('#titem_id').select2();
            $('#item_id').select2();
        });
        function selectpadre (){
            let sel = document.getElementById('item_id');
            let marcatipo = document.getElementById('marcatipo');
            if (sel.value == 0){
                marcatipo.style.display = 'flex';
            }else{
                marcatipo.style.display = 'none';
            }
        }
    </script>
@stop