@extends('backend.layouts.master')

@section('title')
    @include('article::pages.partials.title')
@endsection

@section('admin-content')
    @include('article::pages.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                @csrf
                @method('put')
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Article Title <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $page->title }}" placeholder="Enter Title" required=""/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Short URL <span class="optional">(optional)</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $page->slug }}" placeholder="Enter short url (Keep blank to auto generate)" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="status" name="status" required>
                                        <option value="1" {{ $page->status === 1 ? 'selected' : null }}>Active</option>
                                        <option value="0" {{ $page->status === 0 ? 'selected' : null }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="category_id">Article Category <span class="optional">(optional)</span></label>
                                    <br>
                                    <select class="categories_select form-control custom-select " id="categories" name="category_id" style="width: 100%;">
                                        {!! $categories !!}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="article_type_id">Article Type <span class="optional">(optional)</span></label>
                                    <br>
                                    <select class="form-control" id="types" name="article_type_id" style="width: 100%;">
                                        @foreach ($article_types as $type)
                                            <option value="{{ $type->id }}" {{ $page->article_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="image">Article Featured Image <span class="optional">(optional)</span></label>
                                    <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="png jpg jpeg webp" id="image" name="image" data-default-file="{{ $page->image != null ? asset('public/assets/images/pages/'.$page->image) : null }}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="banner_image">Article Banner Image <span class="optional">(optional)</span></label>
                                    <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="png jpg jpeg webp" id="banner_image" name="banner_image" data-default-file="{{ $page->banner_image != null ? asset('public/assets/images/pages/'.$page->banner_image) : null }}"/>
                                </div>
                            </div>
                        </div>


                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="description">Article Description <span class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control tinymce_advance" id="description" name="description">{!! $page->description !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="meta_description">Article Meta Description <span class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta description for SEO">{!! $page->meta_description !!}</textarea>
                                </div>
                                <div class="form-actions">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <a href="{{ route('admin.pages.index') }}" class="btn btn-dark">Cancel</a>
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
