@extends('adminlte::page')

@section('title', 'Crear Item')

@section('content_header')
    <h1>Crear Items</h1>
@stop

@section('content')
    <p>Lista de Items del sistema.</p>
    {!! Form::open(['route'=>'inventarios.items.store','method'=>'post']) !!}
    <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5>Datos del Producto</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label(null, 'Codigo', [null]) !!}
                        {!! Form::text('codigo', null, ['class'=>'form-control']) !!}
                        {!! Form::label(null, 'Descripcion', ['class'=>'mt-2']) !!}
                        {!! Form::textarea('descripcion', null, ['class'=>'form-control']) !!}
                        <div class="row mt-2">
                            <div class="col-sm-12 col-md-6">
                                {!! Form::label(null, 'Marca', [null]) !!}
                                {!! Form::select('marca_id', $marcas, null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="col-sm-12 col-md-6">
                                {!! Form::label(null, 'Tipo', [null]) !!}
                                {!! Form::select('titem_id', $titems, null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="row mt-2">
                            {!! Form::label(null, 'Item Padre', [null]) !!}
                            <select name="item_id" id="item_id" class="form-control">
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
        <div class="col-sm-12 col-md-4 col-lg-4">

        </div>
    </div>
    {!! Form::close() !!}

@stop