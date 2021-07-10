@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.translations.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.translations.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.translations.store') }}" method="POST" enctype="multipart/form-data"
                data-parsley-validate data-parsley-focus="first">
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
                                        <select class="categories_select form-control custom-select " id="language_id"
                                            name="language_id" style="width: 100%;" required>
                                            <option value="">-- Select --</option>

                                            @foreach ($languages as $language)
                                                <option value="{{ $language->id }}" {{ Auth::user()->language_id == $language->id ? 'selected' : '' }}
                                                    {{ $language->code == 'en' ? 'disabled' : ''}}
                                                    >
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

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="category_id"> Category  <i class="fa fa-chevron-right"></i>  Chapter <span
                                        class="required">*</span></label>
                                    <br>
                                    <select class="categories_select form-control custom-select " id="category_id"
                                        name="category_id" style="width: 100%;" required>
                                        <option value="">-- Select --</option>
                                        {!! $categories !!}
                                    </select>
                                    <p class="text-warning">
                                        <i class="fa fa-info-circle"></i> Please select a chapter !
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="type">Type<span class="required">*</span></label>
                                    <br>
                                    <select class="form-control custom-select" id="type" name="type" style="width: 100%;" required>
                                        @if (Auth::user()->can('translation.word'))
                                            <option value="word">Word</option>
                                        @endif

                                        @if (Auth::user()->can('translation.sentence'))
                                            <option value="sentence">Sentence</option>
                                        @endif

                                        @if (Auth::user()->can('translation.term'))
                                            <option value="term">Term</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="" id="search-result"></div>

                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-actions">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success" id="btn-translation-save"> <i class="fa fa-check"></i>
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
    @include('backend.pages.translations.partials.scripts')
@endsection
