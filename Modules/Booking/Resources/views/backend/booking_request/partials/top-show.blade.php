
<!-- ============================================================== -->
<!-- Top Show Data of Categorie List Page -->
<!-- ============================================================== -->
<div class="row mt-1">
    <div class="col-md-4 col-lg-2 col-xlg-2 pointer" onclick="location.href='{{ route('admin.booking_request.index') }}?status=all'">
        <div class="card card-hover">
            <div class="box bg-info text-center">
                <h1 class="font-light text-white">{{ $count_booking_requests }}</h1>
                <h6 class="text-white">Total Requests</h6>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2 col-xlg-2 pointer" onclick="location.href='{{ route('admin.booking_request.index') }}?status=pending'">
        <div class="card card-hover">
            <div class="box bg-warning text-center">
                <h1 class="font-light text-white">{{ $count_pending_booking_requests }}</h1>
                <h6 class="text-white">Pending Requests</h6>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2 col-xlg-2 pointer" onclick="location.href='{{ route('admin.booking_request.index') }}?status=processing'">
        <div class="card card-hover">
            <div class="box bg-primary text-center">
                <h1 class="font-light text-white">{{ $count_processing_booking_requests }}</h1>
                <h6 class="text-white">Processing Requests</h6>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2 col-xlg-2 pointer" onclick="location.href='{{ route('admin.booking_request.index') }}?status=completed'">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white">{{ $count_completed_booking_requests }}</h1>
                <h6 class="text-white">Completed Requests</h6>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-2 col-xlg-2 pointer" onclick="location.href='{{ route('admin.booking_request.index') }}?status=cancelled'">
        <div class="card card-hover">
            <div class="box bg-danger text-center">
                <h1 class="font-light text-white">{{ $count_cancelled_booking_requests }}</h1>
                <h6 class="text-white">Cancelled Requests</h6>
            </div>
        </div>
    </div>
</div>
