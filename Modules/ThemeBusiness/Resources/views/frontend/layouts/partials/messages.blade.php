@if (Session::has('sticky_error'))
    <div class="alert alert-danger">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <h3 class="text-danger"><i class="fa fa-times-circle"></i> Error</h3>
        {!! Session::get('sticky_error') !!}
    </div>
@endif

@if (Session::has('sticky_success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3>
        {!! Session::get('sticky_success') !!}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
