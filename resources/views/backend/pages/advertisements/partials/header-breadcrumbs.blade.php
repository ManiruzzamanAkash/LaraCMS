<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.advertisements.index'))
                    Advertisement List
                @elseif(Route::is('admin.advertisements.create'))
                    Create New Advertisement
                @elseif(Route::is('admin.advertisements.edit'))
                    Edit Advertisement <span class="badge badge-info">{{ $advertisement->name }}</span>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.advertisements.index'))
                            <li class="breadcrumb-item active" aria-current="page">Advertisement List</li>
                        @elseif(Route::is('admin.advertisements.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.advertisements.index') }}">Advertisement List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Advertisement</li>
                        @elseif(Route::is('admin.advertisements.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.advertisements.index') }}">Advertisement List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Advertisement</li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
