@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.languages.partials.title')
@endsection

@section('styles')
    <style>
        .table-connection {

        }
        .table-connection td, .table-connection th {
            padding: 0px!important;
            text-align: center
        }
        .table-connection td {
            border-right: 1px solid #ddd!important;
            padding: 0px!important;
            margin: 0px!important;
            line-height: 14px;
        }
        .table-connection .table-input {
            width: 40px;
            font-size: 10px;
            border: 0px;
        }
        .table-connection input:disabled {
            background: #eee;
        }
    </style>
@endsection

@section('admin-content')
    @include('backend.pages.languages.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.languages.connection.update') }}" method="POST" enctype="multipart/form-data"
                data-parsley-validate data-parsley-focus="first">
                @csrf
                @method('put')

                <div class="form-body">
                    <div class="card-body table-responsive">
                        <table class="table table-connection">
                            <tr>
                                <td></td>
                                @foreach ($languages as $lang2)
                                    <td>{{ $lang2->code }}</td>
                                @endforeach
                            </tr>
                            @foreach ($languages as $lang1)
                                <tr>
                                    <td>{{ $lang1->code }}</td>
                                    @foreach ($languages as $lang2)
                                        <td>
                                            <input class="table-input" type="text"
                                                name="connections[{{ $lang1->id }}][{{ $lang2->id }}]" value="{{ $connections[$lang1->id][$lang2->id] }}" {{ $lang1->code === $lang2->code ? 'disabled' : null }}>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <a href="{{ route('admin.languages.index') }}" class="btn btn-dark">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
