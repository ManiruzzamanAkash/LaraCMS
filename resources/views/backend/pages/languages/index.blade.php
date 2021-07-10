@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.languages.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.languages.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.pages.languages.partials.top-show')
        @include('backend.layouts.partials.messages')
        <div class="table-responsive product-table">
            <table class="table table-striped table-bordered display ajax_view" id="languages_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Flag</th>
                        <th>Banner</th>
                        <th>Country</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    const ajaxURL = "<?php echo Route::is('admin.languages.trashed' ? 'languages/trashed/view' : 'languages') ?>";
    $('table#languages_table').DataTable({
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
            {data: 'code', name: 'code'},
            {data: 'flag', name: 'flag'},
            {data: 'banner', name: 'banner'},
            {data: 'country', name: 'country'},
            {data: 'action', name: 'action'}
        ]
    });
    </script>
@endsection
