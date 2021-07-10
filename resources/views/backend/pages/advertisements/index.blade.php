@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.advertisements.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.advertisements.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.pages.advertisements.partials.top-show')
        @include('backend.layouts.partials.messages')
        <div class="table-responsive product-table">
            <table class="table table-striped table-bordered display ajax_view" id="_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Advertisement Title</th>
                        <th>Image</th>
                        <th>Advertiser Name</th>
                        <th>Last Updated At</th>
                        <th>Start Date</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    const ajaxURL = "<?php echo Route::is('admin.advertisements.trashed' ? '/trashed/view' : '') ?>";
    $('table#_table').DataTable({
        dom: 'Blfrtip',
        language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
        processing: true,
        serverSide: true,
        ajax: {url: ajaxURL},
        aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
        buttons: ['excel', 'pdf', 'print'],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'image', name: 'image'},
            {data: 'advertiser_name', name: 'advertiser_name'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'start_date', name: 'start_date'},
            {data: 'expiry_date', name: 'expiry_date'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'}
        ]
    });
    </script>
@endsection
