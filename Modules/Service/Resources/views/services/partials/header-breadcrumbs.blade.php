<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.services.index'))
                    Service List
                @elseif(Route::is('admin.services.create'))
                    Create New Service
                @elseif(Route::is('admin.services.edit'))
                    Edit Service <span class="badge badge-info">{{ $service->title }}</span>
                @elseif(Route::is('admin.services.show'))
                    View Service <span class="badge badge-info">{{ $service->title }}</span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.services.edit', $service->id) }}"> <i class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.services.index'))
                            <li class="breadcrumb-item active" aria-current="page">Service List</li>
                        @elseif(Route::is('admin.services.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Service List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Service</li>
                        @elseif(Route::is('admin.services.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Service List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Service</li>
                        @elseif(Route::is('admin.services.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Service List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Service</li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
