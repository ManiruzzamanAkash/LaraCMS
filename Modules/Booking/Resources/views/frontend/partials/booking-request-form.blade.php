<form class="contact-form custom-form-style-1" method="POST" data-parsley-validate>
    <div class="contact-form-success alert alert-success d-none mt-4">
        <strong>Success!</strong> Your request has been sent to us.
    </div>

    <div class="contact-form-error alert alert-danger d-none mt-4">
        <strong>Error!</strong> There was an error sending your request.
        <span class="mail-error-message text-1 d-block"></span>
    </div>

    <div class="row">
        <div class="form-group col-sm-12 col-md-4 pb-1 mb-3">
            <label for="name">Your Name</label>
            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100"
                class="form-control" id="name" name="name" placeholder="Your Name" required>
        </div>
        <div class="form-group col-sm-12 col-md-4 pb-1 mb-3">
            <label for="phone_no">Your Phone Number</label>
            <input type="text" value="" data-msg-required="Please enter your phone number." maxlength="100"
                class="form-control" id="phone_no" name="phone_no" placeholder="Your Phone Number" required>
        </div>
        <div class="form-group col-sm-12 col-md-4 pb-1 mb-3">
            <label for="email">Your Email Address</label>
            <input type="email" value="" data-msg-required="Please enter your email address" maxlength="100"
                class="form-control" id="email" name="email" placeholder="Your Email Address" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12 col-md-4 pb-1 mb-3">
            <div class="custom-select-1">
                <label for="service_category">Service Category</label>
                <select data-msg-required="Please select a service." class="form-control" name="service_category" required>
                    <option value="" selected="">Select Service Category</option>
                    <option value="Build Services">Building Services</option>
                    <option value="Post Construction">Post Construction</option>
                    <option value="Office Cleaning">Office Cleaning</option>
                </select>
            </div>
        </div>
        <div class="form-group col-sm-12 col-md-4 pb-1 mb-3">
            <div class="custom-select-1">
                <label for="service">Service</label>
                <select data-msg-required="Please select a service." class="form-control" name="service" required>
                    <option value="" selected="">Select Service</option>
                    <option value="Build Services">Building Services</option>
                    <option value="Post Construction">Post Construction</option>
                    <option value="Office Cleaning">Office Cleaning</option>
                </select>
            </div>
        </div>

        <div class="form-group col-sm-12 col-md-4 pb-1 mb-3">
            <label for="date">Booking Date</label>
            <input type="date" value="" data-msg-required="Please enter date"
                class="form-control" id="date" name="date" placeholder="Enter date and time" required>
        </div>

        <div class="form-group col-sm-12 col-md-4 pb-1 mb-3">
            <label for="start_time">Start at</label>
            <input type="time" value="" data-msg-required="Please enter start time"
                class="form-control" id="start_time" name="start_time" placeholder="Enter start time" required>
        </div>

        <div class="form-group col-sm-12 col-md-8 pb-1 mb-3">
            <label for="message">Message</label>
            <textarea data-msg-required="Please enter your message (if any)"
                class="form-control" id="message" name="message" placeholder="Enter your message (if any)"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <button type="submit" class="btn btn-primary btn-modern font-weight-bold text-3 px-5 py-3" data-loading-text="Loading...">
                SEND REQUEST
            </button>
            <button type="button" class="btn btn-secondary btn-modern font-weight-bold text-3 px-5 py-3" data-bs-dismiss="modal">
                CANCEL
            </button>
        </div>
    </div>
</form>
