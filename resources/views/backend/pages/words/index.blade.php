@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.words.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.words.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.pages.words.partials.top-show')
        @include('backend.layouts.partials.messages')
        <div class="table-responsive product-table">
            <table class="table table-striped table-bordered display ajax_view" id="words_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Chapter</th>
                        <th>Status</th>
                        <th>Order Nr.</th>
                        <th>Is Section</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    const ajaxURL = "<?php echo Route::is('admin.words.trashed' ? 'words/trashed/view' : 'words') ?>";
    $('table#words_table').DataTable({
        dom: 'Blfrtip',
        language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
        processing: true,
        serverSide: true,
        ajax: {url: ajaxURL},
        aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
        buttons: ['excel', 'pdf', 'print'],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'en', name: 'en'},
            {data: 'category', name: 'category'},
            {data: 'chapter', name: 'chapter'},
            {data: 'status', name: 'status'},
            {data: 'order_nr', name: 'order_nr'},
            {data: 'is_section', name: 'is_section'},
            {data: 'action', name: 'action'}
        ]
    });
    </script>
@endsection
