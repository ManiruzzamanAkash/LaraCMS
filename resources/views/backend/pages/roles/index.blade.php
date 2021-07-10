@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.roles.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.roles.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.pages.roles.partials.top-show')
        @include('backend.layouts.partials.messages')
        <div class="table-responsive product-table">
            <table class="table table-striped table-bordered display ajax_view" id="roles_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Total Permissions</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    const ajaxURL = "roles";
    $('table#roles_table').DataTable({
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
            {data: 'permissions', name: 'permissions'},
            {data: 'action', name: 'action'}
        ]
    });
    </script>
@endsection