@extends('backend.layouts.master')

@section('title')
    @include('booking::backend.booking_request.partials.title')
@endsection

@section('admin-content')
    @include('booking::backend.booking_request.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('booking::backend.booking_request.partials.top-show')
        @include('backend.layouts.partials.messages')
        <div class="table-responsive product-table">
            <table class="table table-striped table-bordered display ajax_view" id="booking_requests_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Service Name</th>
                        <th>Service Request Date/Time</th>
                        <th>Request Status</th>
                        <th>Payment Status</th>
                        <th>Pyable Amount</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    const ajaxURL = "<?php echo Route::is('admin.backend.booking_request.trashed' ? 'booking-request/trashed/view' : 'booking_request') ?>";
    $('table#booking_requests_table').DataTable({
        dom: 'Blfrtip',
        language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
        processing: true,
        serverSide: true,
        ajax: {url: ajaxURL},
        aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
        buttons: ['excel', 'pdf', 'print'],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone_no', name: 'phone_no'},
            {data: 'service_name', name: 'service_name'},
            {data: 'start_date', name: 'start_date'},
            {data: 'status', name: 'status'},
            {data: 'payment_status', name: 'payment_status'},
            {data: 'grand_total', name: 'grand_total'},
            {data: 'action', name: 'action'}
        ]
    });
    </script>
@endsection
