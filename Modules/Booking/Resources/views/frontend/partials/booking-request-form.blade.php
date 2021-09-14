<form class="contact-form custom-form-style-1" method="POST"
    novalidate="novalidate">
    <div class="contact-form-success alert alert-success d-none mt-4">
        <strong>Success!</strong> Your request has been sent to us.
    </div>

    <div class="contact-form-error alert alert-danger d-none mt-4">
        <strong>Error!</strong> There was an error sending your request.
        <span class="mail-error-message text-1 d-block"></span>
    </div>

    <div class="row">
        <div class="form-group col-sm-12 col-md-6 pb-1 mb-3">
            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100"
                class="form-control" name="name" placeholder="Your Name" required="">
        </div>
        <div class="form-group col-sm-12 col-md-6 pb-1 mb-3">
            <input type="text" value="" data-msg-required="Please enter your phone number." maxlength="100"
                class="form-control" name="phone" placeholder="Your Phone Number" required="">
        </div>
    </div>
    <div class="row">
        <div class="form-group col pb-1 mb-3">
            <div class="custom-select-1">
                <select data-msg-required="Please select a service." class="form-control" name="service" required="">
                    <option value="" selected="">Select Service</option>
                    <option value="Build Services">Building Services</option>
                    <option value="Post Construction">Post Construction</option>
                    <option value="Office Cleaning">Office Cleaning</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <button type="submit" class="btn btn-primary btn-modern font-weight-bold text-3 px-5 py-3"
                data-loading-text="Loading...">
                SEND REQUEST
            </button>
            <button type="button" class="btn btn-secondary btn-modern font-weight-bold text-3 px-5 py-3"
                data-bs-dismiss="modal">
                CANCEL
            </button>
        </div>
    </div>
</form>
