@extends('backend.layouts.master')

@section('title')
    @include('article::categories.partials.title')
@endsection

@section('admin-content')
    @include('article::categories.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                @csrf
                @method('put')
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Category Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" placeholder="Enter Category Name" required=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Short URL <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}" placeholder="Enter short url (Keep blank to auto generate)" />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="parent_category_id">Parent Category <span class="optional">(optional)</span></label>
                                    <br>
                                    <select class="parent_categories_select form-control custom-select " id="parent_categories" name="parent_category_id" style="width: 100%;">
                                        <option value="">Select Parent Category</option>
                                        {!! $categories !!}
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="priority">Display Order In Website <span class="optional">(optional)</span></label>
                                    <input type="number" class="form-control" id="priority" name="priority" value="{{ $category->priority }}" placeholder="Enter Display Order (Lower=Higher); eg-1" min="0"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="status" name="status" required>
                                        <option value="1" {{ $category->status === 1 ? 'selected' : null }}>Active</option>
                                        <option value="0" {{ $category->status === 0 ? 'selected' : null }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="banner_image">Category Banner Image <span class="optional">(optional)</span></label>
                                    <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="png jpg jpeg webp" id="banner_image" name="banner_image" data-default-file="{{ $category->banner_image != null ? asset('public/assets/images/categories/'.$category->banner_image) : null }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="logo_image">Category Logo Image <span class="optional">(optional)</span></label>
                                    <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="png jpg jpeg webp" id="logo_image" name="logo_image" data-default-file="{{ $category->logo_image != null ? asset('public/assets/images/categories/'.$category->logo_image) : null }}" />
                                </div>
                            </div>
                        </div>


                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="description">Category Description <span class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control tinymce_simple" id="description" name="description">{!! $category->description !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="meta_description">Category Meta Description <span class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta description for SEO">{!! $category->meta_description !!}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="enable_bg" name="enable_bg" {{ $category->enable_bg ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="enable_bg">
                                                <strong>Enable Color</strong>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 enable_bg_area {{ $category->enable_bg ? 'display-block' : 'display-hidden' }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="text_color">Text Color</label>
                                                        <input type="text" id="text_color" name="text_color" class="form-control jscolor" value="{{ $category->enable_bg ? $category->text_color : '000000' }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="bg_color">Background Color</label>
                                                    <input type="text" id="bg_color" name="bg_color" class="form-control jscolor" value="{{ $category->enable_bg ? $category->bg_color : 'eeeeee' }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-dark">Cancel</a>
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
@include('article::categories.partials.scripts')
@endsection
