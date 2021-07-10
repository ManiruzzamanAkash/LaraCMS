@extends('backend.layouts.master')

@section('title')
@include('backend.pages.pages.partials.title')
@endsection

@section('admin-content')
@include('backend.pages.words.partials.header-breadcrumbs')
<div class="container-fluid">
    @include('backend.layouts.partials.messages')
    <div class="create-page">
        <form action="{{ route('admin.words.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
            @csrf
            <div class="form-body">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="en">Word <span class="required">*</span></label>
                                <input type="text" class="form-control" id="en" name="en" value="{{ old('en') }}" placeholder="Enter Word in English" required="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label" for="status">Status <span class="required">*</span></label>
                                <select class="form-control custom-select" id="status" name="status" required>
                                    <option value="1" {{ old('status') === 1 ? 'selected' : null }}>Published</option>
                                    <option value="0" {{ old('status') === 0 ? 'selected' : null }}>Draft</option>
                                </select>
                                <p class="text-warning">
                                    <i class="fa fa-info-circle"></i> Please make status Published, to add it now on live !
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="category_id">Word Category <i class="fa fa-chevron-right"></i> Chapter <span class="required">*</span></label>
                                <br>
                                <select class="categories_select form-control custom-select " id="categories" name="category_id" style="width: 100%;" required>
                                    {!! $categories !!}
                                </select>
                                <p class="text-warning">
                                    <i class="fa fa-info-circle"></i> Please select a chapter !
                                </p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group has-success">
                                <label class="control-label" for="is_section">Is Section <span class="required">*</span></label>
                                <select class="form-control custom-select" id="is_section" name="is_section" required>
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="order_nr">Display Order <span class="required">*</span></label>
                                <input type="text" class="form-control" id="order_nr" name="order_nr" value="{{ $order_nr }}" placeholder="Enter Display Order No." required="" />
                            </div>
                            <p class="text-warning">
                                <i class="fa fa-info-circle"></i> Please select ordering no. how it will be displayed.
                            </p>
                        </div>

                    </div>

                    <div class="row ">
                        <div class="col-md-12">
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Save</button>
                                    <a href="{{ route('admin.words.index') }}" class="btn btn-dark">Cancel</a>
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
