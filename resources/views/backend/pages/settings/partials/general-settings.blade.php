<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="name">Site name <span class="required">*</span></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Site name."
                value="{{ $settings->general->name }}" required />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="meta_author">Site author</label>
            <input type="text" class="form-control" id="meta_author" name="meta_author" placeholder="Enter Site author name."
                value="{{ $settings->general->meta_author }}" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="logo">
                Site Logo &nbsp;
                <i class="fa fa-info-circle" data-toggle="tooltip"
                    title="Only png jpg jpeg webp svg type
                images are allowed. Max image size 0.5 MB."></i>
            </label>
            <input type="file" class="form-control dropify" data-allowed-file-extensions="png jpg jpeg webp svg"
                data-max-file-size="500K" data-height="100" id="logo" name="logo" data-default-file="{{ asset('public/assets/images/logo/' . $settings->general->logo) }}" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="favicon">
                Site favicon &nbsp;
                <i class="fa fa-info-circle" data-toggle="tooltip"
                    title="Only png jpg jpeg webp svg type
                images are allowed. Max image size 0.5 MB."></i>
            </label>
            <input type="file" class="form-control dropify" data-allowed-file-extensions="ico"
                data-max-file-size="500K" data-height="100" id="favicon" name="favicon" data-default-file="{{ asset('public/assets/images/logo/' . $settings->general->favicon) }}" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="description">
                Site short description
                <i class="fa fa-info-circle" data-toggle="tooltip"
                    title="Site short description if needs to preview a short demo."></i>
            </label>
            <textarea class="form-control" rows="3" id="description" name="description">{{ $settings->general->description }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="copyright_text">
                Site copyright text
                <i class="fa fa-info-circle" data-toggle="tooltip"
                    title="Site copyright text which could be displayed in site footer."></i>
            </label>
            <textarea class="form-control" rows="3" id="copyright_text" name="copyright_text">{{ $settings->general->copyright_text }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="meta_keywords">
                Site meta keywords
            </label>
            <textarea class="form-control" rows="3" id="meta_keywords" name="meta_keywords">{{ $settings->general->meta_keywords }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="meta_description">
                Site meta description
            </label>
            <textarea class="form-control" rows="3" id="meta_description" name="meta_description">{{ $settings->general->meta_description }}</textarea>
        </div>
    </div>
</div>
