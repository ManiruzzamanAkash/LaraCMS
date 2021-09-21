@if (Session::has('sticky_error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span> </button>
        <h3 class="text-danger"><i class="fa fa-times-circle"></i> Error</h3>
        {!! Session::get('sticky_error') !!}
    </div>
@endif

@if (Session::has('sticky_success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span> </button>
        <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3>
        {!! Session::get('sticky_success') !!}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <h3 class="text-danger"><i class="fa fa-times-circle"></i> Error</h3>
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif
