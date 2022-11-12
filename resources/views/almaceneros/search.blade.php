{!! Form::open(['route'=>'inventarios.movimientos.create','method'=>'get','role'=>'search']) !!}
<div class="input-group mb-3">
    <input type="text" name="searchText" class="form-control" 
    placeholder="ingrese DNI" aria-label="Recipient's username" aria-describedby="button-addon2"
    value="{{ $searchText }}"
    >
    <button class="btn btn-outline-primary ml-1" type="summit" id="button-addon2">
        <i class="fab fa-searchengin"></i>
        Buscar
    </button>
</div>
{!! Form::close() !!}