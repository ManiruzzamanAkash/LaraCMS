@extends('backend.layouts.master')

@section('title')
    @include('service::services.partials.title')
@endsection

@section('admin-content')
    @include('service::services.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Page Title</label>
                                    <br>
                                    {{ $page->title }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Short URL</label>
                                    <br>
                                    {{ $page->slug }}
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="category_id">Page Category</label>
                                    <br>
                                    {{ $page->category != null ? $page->category->name : '-' }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status</label>
                                    <br>
                                    {{ $page->status === 1 ? 'Active' : 'Inactive' }}
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="image">Page Featured Image</label>
                                    <br>
                                    @if ($page->image != null)
                                    <img src="{{ asset('public/assets/images/pages/'.$page->image) }}" alt="Image" class="img width-100" />
                                    @else
                                    <span class="border p-2">
                                        No Image
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="banner_image">Page Banner Image</label>
                                    <br>
                                    @if ($page->banner_image != null)
                                    <img src="{{ asset('public/assets/images/pages/'.$page->banner_image) }}" alt="Image" class="img img-display-list" />
                                    @else
                                    <span class="border p-2">
                                        No Image
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="description">Page Description</label>
                                    <div>
                                        {!! $page->description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="meta_description">Page Meta Description</label>
                                    <div>
                                        {!! $page->meta_description !!}
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="card-body">
                                        @if (Auth::user()->can('page.edit'))
                                            <a  class="btn btn-success" href="{{ route('admin.services.edit', $page->id) }}"> <i class="fa fa-edit"></i> Edit Now</a>
                                        @endif
                                        <a href="{{ route('admin.services.index') }}" class="btn btn-dark ml-2">Cancel</a>
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
