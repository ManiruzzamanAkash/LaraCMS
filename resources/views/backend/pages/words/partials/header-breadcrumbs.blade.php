<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.words.index'))
                    Word List
                @elseif(Route::is('admin.words.create'))
                    Create New Word
                @elseif(Route::is('admin.words.edit'))
                    Edit Word <span class="badge badge-info">{{ $word->en }}</span>
                @elseif(Route::is('admin.words.show'))
                    View Word <span class="badge badge-info">{{ $word->en }}</span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.words.edit', $word->id) }}"> <i class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.words.index'))
                            <li class="breadcrumb-item active" aria-current="page">Word List</li>
                        @elseif(Route::is('admin.words.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.words.index') }}">Word List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Word</li>
                        @elseif(Route::is('admin.words.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.words.index') }}">Word List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Word</li>
                        @elseif(Route::is('admin.words.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.words.index') }}">Word List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Word</li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
