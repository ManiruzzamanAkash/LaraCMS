@extends('backend.layouts.master')

@section('title')
@include('backend.pages.pages.partials.title')
@endsection

@section('admin-content')
@include('backend.pages.pages.partials.header-breadcrumbs')
<div class="container-fluid">
    @include('backend.layouts.partials.messages')
    <div class="create-page">
        <form action="{{ route('admin.pages.translation.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
            @csrf
            <div class="form-body">
                <div class="card-body">
                    <div class="row ">

                        @if (Auth::user()->can('translation.all_language'))
                        @php $languages = DB::table('languages')->get(); @endphp
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="language_id">Language <span class="required">*</span></label>
                                <br>
                                <select class="categories_select form-control custom-select " id="language_id" name="language_id" style="width: 100%;" onchange="getTranslatedPost()" required>
                                    <option value="">-- Select --</option>

                                    @foreach ($languages as $language)
                                    <option value="{{ $language->id }}" {{ Auth::user()->language_id == $language->id ? 'selected' : '' }} {{ $language->code == 'en' ? 'disabled' : ''}}>
                                        {{ $language->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <p class="text-warning">
                                    <i class="fa fa-info-circle"></i> Please select a language !
                                </p>
                            </div>
                        </div>
                        @else
                        <input type="hidden" name="language_id" id="language_id" value="{{ Auth::user()->language_id }}" />
                        @endif

                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="category_id"> Category <i class="fa fa-chevron-right"></i> Chapter <span class="text-info">optional</span></label>
                                <br>
                                <select class="categories_select form-control custom-select " id="category_id" name="category_id" style="width: 100%;" onchange="getTranslatedPost()">
                                    <option value="">-- Select --</option>
                                    {!! $categories !!}
                                </select>
                                <p class="text-warning">
                                    <i class="fa fa-info-circle"></i> Please select a category if needed
                                </p>
                            </div>
                        </div> -->

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="article">Article/Page<span class="required">*</span></label>
                                <br>
                                <select class="form-control custom-select select2" id="article" name="article" style="width: 100%;" onchange="getTranslatedPost()" required>
                                    @foreach ($pages as $page)
                                    <option value="{{ $page->id }}">{{ $page->title }}</option>
                                    @endforeach
                                </select>
                                <p class="text-warning">
                                    <i class="fa fa-info-circle"></i> Please select an article to translate it.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="" id="search-result"></div> -->
                    <div id="search-area">
                        <input type="hidden" name="id" id="id">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="title">Page/Article Title <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required="" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="description">Page/Article Description <span class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control tinymce_terms" id="description" name="description" ></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="meta_description">Page/Article Meta Description <span class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control" id="meta_description" name="meta_description" value=""></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row ">
                        <div class="col-md-12">
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success" id="btn-translation-save"> <i class="fa fa-check"></i>
                                        Save</button>
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
    tinymce.init({
        selector: ".tinymce_terms",
        theme: "modern",
        height: 150,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor code",
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print media fullpage | forecolor backcolor emoticons | code preview",
    });
</script>
@include('backend.pages.pages.partials.scripts')
@endsection
