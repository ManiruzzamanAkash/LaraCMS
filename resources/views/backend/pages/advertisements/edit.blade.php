@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.advertisements.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.advertisements.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.advertisements.update', $advertisement->id) }}" method="POST"
                enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                @csrf
                @method('put')

                {{-- <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Category Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $advertisement->name }}" placeholder="Enter Category Name" required=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Short URL <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $advertisement->slug }}" placeholder="Enter short url (Keep blank to auto generate)" />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="parent_category_id">Parent Category <span class="optional">(optional)</span></label>
                                    <br>
                                    <select class="parent_advertisements_select form-control custom-select " id="parent_advertisements" name="parent_category_id" style="width: 100%;">
                                        <option value="">Select Parent Category</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="status" name="status" required>
                                        <option value="1" {{ $advertisement->status === 1 ? 'selected' : null }}>Active</option>
                                        <option value="0" {{ $advertisement->status === 0 ? 'selected' : null }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="banner_image">Category Banner Image <span class="optional">(optional)</span></label>
                                    <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="png jpg jpeg webp" id="banner_image" name="banner_image" data-default-file="{{ $advertisement->banner_image != null ? asset('public/assets/images/advertisements/'.$advertisement->banner_image) : null }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="logo_image">Category Logo Image <span class="optional">(optional)</span></label>
                                    <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="png jpg jpeg webp" id="logo_image" name="logo_image" data-default-file="{{ $advertisement->logo_image != null ? asset('public/assets/images/advertisements/'.$advertisement->logo_image) : null }}" />
                                </div>
                            </div>
                        </div>


                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="description">Category Description <span class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control tinymce_simple" id="description" name="description">{!!  $advertisement->description !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="meta_description">Category Meta Description <span class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta description for SEO">{!!  $advertisement->meta_description !!}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="enable_bg" name="enable_bg" {{ $advertisement->enable_bg ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="enable_bg">
                                                <strong>Enable Color</strong>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 enable_bg_area {{ $advertisement->enable_bg ? 'display-block' : 'display-hidden' }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="text_color">Text Color</label>
                                                        <input type="text" id="text_color" name="text_color" class="form-control jscolor" value="{{ $advertisement->enable_bg ? $advertisement->text_color : '000000' }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="bg_color">Background Color</label>
                                                    <input type="text" id="bg_color" name="bg_color" class="form-control jscolor" value="{{ $advertisement->enable_bg ? $advertisement->bg_color : 'eeeeee' }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <a href="{{ route('admin.advertisements.index') }}" class="btn btn-dark">Cancel</a>
                                </div>
                            </div>

                        </div>

                    </div>

                </div> --}}

                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Title <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $advertisement->title }}" placeholder="Enter Advertisement Title"
                                        required="" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="advertiser_name">Advertiser Name <span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control" id="advertiser_name" name="advertiser_name"
                                        value="{{ $advertisement->advertiser_name }}" placeholder="Enter Advertiser Name"
                                        required="" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Short URL <span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        value="{{ $advertisement->slug }}"
                                        placeholder="Enter short url (Keep blank to auto generate)" />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="url">URL <span class="optional">optional</span></label>
                                    <input type="url" class="form-control" id="url" name="url"
                                        value="{{ $advertisement->url }}" placeholder="Enter Advertisement Link" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="start_date">Start Date <span
                                            class="required">*</span></label>
                                    <input type="date" class="form-control" id="start_date" name="start_date"
                                        value="{{ $advertisement->start_date }}" placeholder="Enter Advertisement Start Date"
                                        required="" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="expiry_date">Expiry Date <span
                                            class="required">*</span></label>
                                    <input type="date" class="form-control" id="expiry_date" name="expiry_date"
                                        value="{{ $advertisement->expiry_date }}"
                                        placeholder="Enter Advertisement Expiry Date" required="" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="status" name="status" required>
                                        <option value="1" {{ $advertisement->status == '1' ? 'selected' : null }}>Active
                                        </option>
                                        <option value="0" {{ $advertisement->status == '0' ? 'selected' : null }}>Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="language_ids">
                                        Languages <span class="optional">(optional)</span>
                                    </label>
                                    <select class="select2" multiple name="language_ids[]" id="language_ids" style="width: 100%">
                                        @foreach ($languages as $language)
                                            @php
                                                $exists = DB::table('language_advertisements')
                                                ->where('language_id', $language->id)
                                                ->where('advertisement_id', $advertisement->id)
                                                ->exists();
                                            @endphp
                                            <option value="{{ $language->id }}" {{ $exists ? 'selected' : '' }}>{{ $language->name }} ({{ $language->code }})</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="language2_ids">
                                        Second Languages <span class="optional">(optional)</span>
                                    </label>
                                    <select class="select2" multiple name="language2_ids[]" id="language2_ids" style="width: 100%">
                                        @foreach ($languages as $language)
                                            @php
                                                $exists = DB::table('language2_advertisements')
                                                ->where('language_id', $language->id)
                                                ->where('advertisement_id', $advertisement->id)
                                                ->exists();
                                            @endphp
                                            <option value="{{ $language->id }}" {{ $exists ? 'selected' : '' }}>{{ $language->name }} ({{ $language->code }})</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label class="control-label" for="advertisement_types">
                                        Types <span class="optional">(optional)</span>
                                    </label>
                                    <select class="select2" multiple name="advertisement_types[]" id="type_ids" style="width: 100%">
                                        @foreach ($advertisement_types as $typeParent)
                                            <option value="{{ $typeParent->id }}" disabled>{{ $typeParent->parent }}</option>
                                            <?php $types = App\Models\AdvertisementType::getTypesByParent($typeParent->parent); ?>
                                            @foreach ($types as $type)
                                                @php
                                                    $exists = App\Models\AdvertisementType::checkAdvertisementHasType($type->id, $advertisement->id);
                                                @endphp
                                                <option value="{{ $type->id }}" {{ $exists ? 'selected' : '' }}> -- {{ $type->name }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="categories_id">
                                        Categories/Chapters <span class="optional">(optional)</span>
                                    </label>
                                    <select class="select2" multiple name="category_ids[]" id="category_ids" style="width: 100%">
                                        @foreach ($categories as $category)
                                            @php
                                                $exists = App\Models\Category::checkAdvertisementHasCategory($category->id, $advertisement->id);
                                            @endphp
                                            <option value="{{ $category->id }}" {{ $exists ? 'selected' : '' }}>{{ $category->name }}</option>
                                            <?php
                                                $chapters = App\Models\Category::getCategories(1, null, $category->id)
                                            ?>
                                            @foreach ($chapters as $chapter)
                                                @php
                                                    $existsChapter = App\Models\Category::checkAdvertisementHasCategory($chapter->id, $advertisement->id);
                                                @endphp
                                                <option value="{{ $chapter->id }}" {{ $existsChapter ? 'selected' : '' }}> -- {{ $chapter->name }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="image">Image <span
                                            class="optional">(optional)</span></label>
                                    <input type="file" class="form-control dropify" data-height="70"
                                        data-allowed-file-extensions="png jpg jpeg webp" id="image" name="image"
                                        data-default-file="{{ $advertisement->image != null ? asset('public/images/advertisements/' . $advertisement->image) : null }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="description">Details <span
                                            class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control tinymce_advance" id="description"
                                        name="description">{!!  $advertisement->description !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="card-body">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                <a href="{{ route('admin.advertisements.index') }}" class="btn btn-dark">Cancel</a>
                            </div>
                        </div>

                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @include('backend.pages.advertisements.partials.scripts')
@endsection
