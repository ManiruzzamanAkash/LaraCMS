<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.admins.index'))
                    User List
                @elseif(Route::is('admin.admins.create'))
                    Create New User
                @elseif(Route::is('admin.admins.edit'))
                    Edit User <span class="badge badge-info">{{ $admin->first_name }}</span>
                @elseif(Route::is('admin.admins.profile.edit'))
                    Edit Profile <span class="badge badge-info">{{ $admin->first_name }}</span>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.admins.index'))
                            <li class="breadcrumb-item active" aria-current="page">User List</li>
                        @elseif(Route::is('admin.admins.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.admins.index') }}">User List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New User</li>
                        @elseif(Route::is('admin.admins.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.admins.index') }}">User List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                        @elseif(Route::is('admin.admins.profile.edit'))
                        <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
