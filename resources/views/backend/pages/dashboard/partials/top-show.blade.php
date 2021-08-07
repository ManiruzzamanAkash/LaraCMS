@php $user = Auth::user(); @endphp

<!-- ============================================================== -->
<!-- Dashboard Page Top Data -->
<!-- ============================================================== -->
<div class="card-group">

    @if ($user->can('admin.view'))
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center pointer" onclick="location.href='{{ route('admin.admins.index') }}'">
                            <div>
                                <i class="mdi mdi-account font-20 text-muted"></i>
                                <p class="font-16 m-b-5">Total Admins</p>
                            </div>
                            <div class="ml-auto">
                                <h1 class="font-light text-right">{{ $count_admins }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    @endif

    @if ($user->can('role.view'))
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center pointer" onclick="location.href='{{ route('admin.roles.index') }}'">
                            <div>
                                <i class="mdi mdi-account font-20 text-muted"></i>
                                <p class="font-16 m-b-5">Total Roles</p>
                            </div>
                            <div class="ml-auto">
                                <h1 class="font-light text-right">{{ $count_roles }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    @endif

    @if ($user->can('category.view'))
    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center pointer" onclick="location.href='{{ route('admin.categories.index') }}'">
                        <div>
                            <i class="mdi mdi-tune font-20  text-muted"></i>
                            <p class="font-16 m-b-5">Total Categories</p>
                        </div>
                        <div class="ml-auto">
                            <h1 class="font-light text-right">{{ $count_categories }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    @endif

    @if ($user->can('page.view'))
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center pointer" onclick="location.href='{{ route('admin.pages.index') }}'">
                            <div>
                                <i class="mdi mdi-tune font-20 text-muted"></i>
                                <p class="font-16 m-b-5">Total Articles / Pages</p>
                            </div>
                            <div class="ml-auto">
                                <h1 class="font-light text-right">{{ $count_pages }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($user->can('blog.view'))
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center pointer" onclick="location.href='{{ route('admin.blogs.index') }}'">
                            <div>
                                <i class="mdi mdi-tune font-20 text-muted"></i>
                                <p class="font-16 m-b-5">Total Blogs</p>
                            </div>
                            <div class="ml-auto">
                                <h1 class="font-light text-right">{{ $count_blogs }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Column -->
</div>
