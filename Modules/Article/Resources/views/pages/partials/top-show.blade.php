
<!-- ============================================================== -->
<!-- Top Show Data of Categorie List Article -->
<!-- ============================================================== -->
<div class="row mt-1">
    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3 pointer"  onclick="location.href='{{ route('admin.pages.index') }}'">
        <div class="card card-hover">
            <div class="box bg-info text-center">
                <h1 class="font-light text-white">{{ $count_pages }}</h1>
                <h6 class="text-white">Total Articles</h6>
            </div>
        </div>
    </div>

    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3 pointer"  onclick="location.href='{{ route('admin.pages.index') }}'">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white">{{ $count_active_pages }}</h1>
                <h6 class="text-white">Active Articles</h6>
            </div>
        </div>
    </div>

    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3 pointer" onclick="location.href='{{ route('admin.pages.trashed') }}'">
        <div class="card card-hover">
            <div class="box bg-primary text-center">
                <h1 class="font-light text-white">{{ $count_pages - $count_active_pages }} / {{ $count_trashed_pages }} </h1>
                <h6 class="text-white">Inactive/Trashed Articles</h6>
            </div>
        </div>
    </div>

    <!-- Column -->
    @if (Auth::user()->can('page.create'))
        <div class="col-md-6 col-lg-3 col-xlg-3 pointer" onclick="location.href='{{ route('admin.pages.create') }}'">
            <div class="card card-hover">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white">
                        <i class="fa fa-plus-circle"></i>
                    </h1>
                    <h6 class="text-white">Create New Article</h6>
                </div>
            </div>
        </div>
    @endif

</div>
