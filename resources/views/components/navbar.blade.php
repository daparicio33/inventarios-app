<div>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
    <ul class="nav active bg-light rounded border border-info mt-2 mb-2">
        <li class="nav-item">
            <a class="nav-link btn btn-light @if($activo == "existencias") active @endif" href="{{ route('inventarios.existencias.index') }}">
                <i class="fas fa-door-open"></i> Existencias
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn btn-light @if($activo == "ingresos") active @endif" href="{{ route('inventarios.existencias.show','ingresos') }}">
                <i class="fas fa-share-square"></i> Ingresos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn btn-light @if($activo == "reposiciones") active @endif" href="{{ route('inventarios.existencias.show','reposicion') }}">
                <i class="fas fa-redo-alt"></i> Reposiciones
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn btn-light @if($activo == "perdidas") active @endif" href="{{ route('inventarios.existencias.show','perdida') }}">
                <i class="far fa-sad-cry"></i> Perdidas
            </a>
        </li>
    </ul> 
</div>