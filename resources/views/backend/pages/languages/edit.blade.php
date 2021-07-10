@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.languages.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.languages.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.languages.update', $language->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                @csrf
                @method('put')

                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Language <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Language" value="{{ $language->name }}" required/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="code">Code <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="code" name="code" value="{{ $language->code }}" placeholder="Enter Language Code" required/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="country_id">Country <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="country_id" name="country_id" required>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" {{ $language->country_id === $country->id ? 'selected' : '' }}>{{ $country->name }} ({{ $country->code }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="flag">Language Flag <span class="optional">(optional)</span></label>
                                    <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="png jpg jpeg webp" id="flag" name="flag" data-default-file="{{ $language->flag != null ? asset('public/img/flags/'.$language->flag) : null }}"/>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="banner_caption">Language Banner Caption <span class="optional">optional</span></label>
                                    <input type="text" class="form-control" id="banner_caption" name="banner_caption" value="{{ $language->banner_caption }}" placeholder="Enter Language Caption"/>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="flag">Language Banner <span class="optional">(optional)</span></label>
                                    <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="png jpg jpeg webp" id="banner" name="banner" data-default-file="{{ $language->banner != null ? asset('public/img/flags/'.$language->banner) : null }}"/>
                                </div>
                            </div>

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

                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    $(".categories_select").select2({
        placeholder: "Select a Category"
    });
    </script>
@endsection
