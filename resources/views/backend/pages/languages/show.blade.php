@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.blogs.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.blogs.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Blog Title</label>
                                    <br>
                                    {{ $blog->title }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Short URL</label>
                                    <br>
                                    {{ $blog->slug }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="image">Blog Featured Image</label>
                                    <br>
                                    @if ($blog->image != null)
                                    <img src="{{ asset('public/assets/images/blogs/'.$blog->image) }}" alt="Image" class="img width-100" />
                                    @else 
                                    <span class="border p-2">
                                        No Image
                                    </span>
                                    @endif
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status</label>
                                    <br>
                                    {{ $blog->status === 1 ? 'Active' : 'Inactive' }}
                                </div>
                            </div>
                        </div>
                    
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="description">Blog Description</label>
                                    <div>
                                        {!! $blog->description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="meta_description">Blog Meta Description</label>
                                    <div>
                                        {!! $blog->meta_description !!}
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="card-body">
                                        <a  class="btn btn-success" href="{{ route('admin.blogs.edit', $blog->id) }}"> <i class="fa fa-edit"></i> Edit Now</a>
                                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-dark ml-2">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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