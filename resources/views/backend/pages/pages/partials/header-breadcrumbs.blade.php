<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.pages.index'))
                    Article/Page List
                @elseif(Route::is('admin.pages.create'))
                    Create New Article/Page
                @elseif(Route::is('admin.pages.edit'))
                    Edit Article/Page <span class="badge badge-info">{{ $page->title }}</span>
                @elseif(Route::is('admin.pages.show'))
                    View Article/Page <span class="badge badge-info">{{ $page->title }}</span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.pages.edit', $page->id) }}"> <i class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.pages.index'))
                            <li class="breadcrumb-item active" aria-current="page">Article/Page List</li>
                        @elseif(Route::is('admin.pages.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Article/Page List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Article/Page</li>
                        @elseif(Route::is('admin.pages.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Article/Page List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Article/Page</li>
                        @elseif(Route::is('admin.pages.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Article/Page List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Article/Page</li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
