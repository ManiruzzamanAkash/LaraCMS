<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.contacts.index'))
                    Contact List
                @elseif (Route::is('admin.contacts.show'))
                    View Message
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.contacts.index'))
                            <li class="breadcrumb-item active" aria-current="page">Contact List</li>
                        @elseif (Route::is('admin.contacts.show'))
                            <li class="breadcrumb-item active" aria-current="page">View contact</li>
                        @endif
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
