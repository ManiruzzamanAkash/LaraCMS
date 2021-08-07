<div class="row ">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label" for="title">Page/Article Title <span class="required">*</span></label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $term['title'] }}" placeholder="Enter Title" required="" />
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label" for="description">Page/Article Description <span class="optional">(optional)</span></label>
            <textarea type="text" class="form-control tinymce_terms" id="description" name="description" value="">{!! $term['description'] !!}</textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label" for="meta_description">Page/Article Meta Description <span class="optional">(optional)</span></label>
            <textarea type="text" class="form-control" id="meta_description" name="meta_description" value="">{!! $term['meta_description'] !!}</textarea>
        </div>
    </div>
</div>
