@if (session('info'))
    <div class="alert alert-success mt-3" id='info'>
        <strong>{{session('info')}}</strong>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger mt-3" id='error'>
        <strong>{{session('error')}}</strong>
    </div>
@endif