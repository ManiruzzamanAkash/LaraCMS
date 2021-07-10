<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.sentences.index'))
                    Sentence List
                @elseif(Route::is('admin.sentences.create'))
                    Create New Sentence
                @elseif(Route::is('admin.sentences.edit'))
                    Edit Sentence <span class="badge badge-info">{{ $sentence->en }}</span>
                @elseif(Route::is('admin.sentences.show'))
                    View Sentence <span class="badge badge-info">{{ $sentence->en }}</span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.sentences.edit', $sentence->id) }}"> <i class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.sentences.index'))
                            <li class="breadcrumb-item active" aria-current="page">Sentence List</li>
                        @elseif(Route::is('admin.sentences.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.sentences.index') }}">Sentence List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Sentence</li>
                        @elseif(Route::is('admin.sentences.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.sentences.index') }}">Sentence List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Sentence</li>
                        @elseif(Route::is('admin.sentences.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.sentences.index') }}">Sentence List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Sentence</li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
