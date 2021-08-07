@extends('backend.layouts.master')

@section('title')
    @include('article::categories.partials.title')
@endsection

@section('admin-content')
    @include('article::categories.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('article::categories.partials.top-show')
        @include('backend.layouts.partials.messages')
        <div class="table-responsive product-table">
            <table class="table table-striped table-bordered display ajax_view" id="categories_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Parent Category</th>
                        <th>Banner</th>
                        <th>Logo</th>
                        <th>Display Order</th>
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
    const ajaxURL = "<?php echo Route::is('admin.categories.trashed' ? 'categories/trashed/view' : 'categories') ?>";
    $('table#categories_table').DataTable({
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
            {data: 'parent_category', name: 'parent_category'},
            {data: 'banner_image', name: 'banner_image'},
            {data: 'logo_image', name: 'logo_image'},
            {data: 'priority', name: 'priority'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'}
        ]
    });
    </script>
@endsection
