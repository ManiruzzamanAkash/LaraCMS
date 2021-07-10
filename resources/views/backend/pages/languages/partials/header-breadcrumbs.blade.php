<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.languages.index'))
                    Language List
                @elseif(Route::is('admin.languages.create'))
                    Create New Language
                @elseif(Route::is('admin.languages.edit'))
                    Edit Language <span class="badge badge-info">{{ $language->name }}</span>
                @elseif(Route::is('admin.languages.show'))
                    View Language <span class="badge badge-info">{{ $language->name }}</span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.languages.edit', $language->id) }}"> <i class="fa fa-edit"></i></a>
                @elseif(Route::is('admin.languages.connection.index'))
                    Language Connections
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.languages.index'))
                            <li class="breadcrumb-item active" aria-current="page">Language List</li>
                        @elseif(Route::is('admin.languages.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.languages.index') }}">Language List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Language</li>
                        @elseif(Route::is('admin.languages.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.languages.index') }}">Language List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Language</li>
                        @elseif(Route::is('admin.languages.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.languages.index') }}">Language List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Language</li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
