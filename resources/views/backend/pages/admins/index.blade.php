@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.admins.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.admins.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.pages.admins.partials.top-show')
        @include('backend.layouts.partials.messages')
        <div class="table-responsive product-table">
            <table class="table table-striped table-bordered display ajax_view" id="users_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Roles</th>
                        <th>Phone No.</th>
                        <th>Email</th>
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
    const ajaxURL = "<?php echo Route::is('admin.admins.trashed' ? 'admins/trashed/view' : 'admins') ?>";
    $('table#users_table').DataTable({
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
            {data: 'username', name: 'username'},
            {data: 'role', name: 'role'},
            {data: 'phone_no', name: 'phone_no'},
            {data: 'email', name: 'email'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'}
        ]
    });
    </script>
@endsection