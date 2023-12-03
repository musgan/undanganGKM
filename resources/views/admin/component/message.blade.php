@if(Session::has('error'))
<div class="mb-3 alert alert-danger">
    {!! Session::get('error') !!}
</div>
@endif

@if(Session::has('success'))
    <div class="mb-3 alert alert-success">
        {!! Session::get('success') !!}
    </div>
@endif
