
<!-- ============================================================== -->
<!-- Top Show Data of Categorie List Page -->
<!-- ============================================================== -->
<div class="row mt-1">
    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3 pointer"  onclick="location.href='{{ route('admin.advertisements.index') }}'">
        <div class="card card-hover">
            <div class="box bg-info text-center">
                <h1 class="font-light text-white">{{ $count_advertisements }}</h1>
                <h6 class="text-white">Total Advertisement</h6>
            </div>
        </div>
    </div>

    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3 pointer"  onclick="location.href='{{ route('admin.advertisements.index') }}'">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white">{{ $count_active_advertisements }}</h1>
                <h6 class="text-white">Active Advertisement</h6>
            </div>
        </div>
    </div>

    <!-- Column -->
    <div class="col-md-6 col-lg-3 col-xlg-3 pointer" onclick="location.href='{{ route('admin.advertisements.trashed') }}'">
        <div class="card card-hover">
            <div class="box bg-primary text-center">
                <h1 class="font-light text-white">{{ $count_advertisements - $count_active_advertisements }} / {{ $count_trashed_advertisements }} </h1>
                <h6 class="text-white">Inactive/Trashed Advertisement</h6>
            </div>
        </div>
    </div>

    @if (Auth::user()->can('advertisement.create'))
        <div class="col-md-6 col-lg-3 col-xlg-3 pointer" onclick="location.href='{{ route('admin.advertisements.create') }}'">
            <div class="card card-hover">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white">
                        <i class="fa fa-plus-circle"></i>
                    </h1>
                    <h6 class="text-white">Create New Advertisement</h6>
                </div>
            </div>
        </div>
    @endif

</div>
