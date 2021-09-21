@php
$categories = \Modules\Article\Entities\Category::getCategories();
$services = \Modules\Service\Entities\Service::getPageData(['limit' => 20, 'orderBy' => 'asc'])['pages'];
$rates = \Modules\Booking\Entities\BookingRate::select('id', 'name', 'rate')->get();
@endphp

<form class="contact-form custom-form-style-1" action="{{ route('booking.request.store') }}" method="POST"
    data-parsley-validate>
    @csrf
    <div class="row">
        <div class="form-group col-sm-12 col-md-4 pb-1 mb-3">
            <label for="name">Your Name <span class="text-danger">*</span></label>
            <input type="text" maxlength="100" class="form-control" id="name" name="name" placeholder="Your Name"
                required>
        </div>
        <div class="form-group col-sm-12 col-md-4 pb-1 mb-3">
            <label for="phone_no">Your Phone Number <span class="text-danger">*</span></label>
            <input type="text" maxlength="100" class="form-control" id="phone_no" name="phone_no"
                placeholder="Your Phone Number" required>
        </div>
        <div class="form-group col-sm-12 col-md-4 pb-1 mb-3">
            <label for="email">Your Email Address <span class="text-danger">*</span></label>
            <input type="email" maxlength="100" class="form-control" id="email" name="email"
                placeholder="Your Email Address" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12 col-md-4 pb-1 mb-3">
            <div class="custom-select-1">
                <label for="service_category_id">Service Category <span class="text-danger">*</span></label>
                <select class="form-control" id="service_category_id" name="service_category_id" required>
                    <option value="" selected="">Select Service Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $service_category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group col-sm-12 col-md-4 pb-1 mb-3">
            <div class="custom-select-1">
                <label for="service_id">Service <span class="text-danger">*</span></label>
                <select data-msg-required="Please select a service." id="service_id" class="form-control"
                    name="service_id" required>
                    <option value="" selected="">Select Service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" {{ $service_id === $service->id ? 'selected' : '' }}>{{ $service->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group col-sm-12 col-md-4 pb-1 mb-3">
            <div class="custom-select-1">
                <label for="booking_rate_id">Rate <span class="text-danger">*</span></label>
                <select data-msg-required="Please select a rate." class="form-control" id="booking_rate_id"
                    name="booking_rate_id" required>
                    @foreach ($rates as $rate)
                        <option value="{{ $rate->id }}">{{ $rate->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group col-sm-12 col-md-4 pb-1 mb-3">
            <label for="date">Booking Date <span class="text-danger">*</span></label>
            <input type="date" value="{{ date('yy-m-d') }}" class="form-control" id="date" name="start_date"
                placeholder="Enter date and time" required>
        </div>

        <div class="form-group col-sm-12 col-md-4 pb-1 mb-3">
            <label for="start_time">Start at <span class="text-danger">*</span></label>
            <input type="time" value="{{ date('H:m') }}" class="form-control" id="start_time" name="start_time"
                placeholder="Enter start time" required>
        </div>

        <div class="form-group col-sm-12 col-md-4 pb-1 mb-3">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message"
                placeholder="Enter your message (if any)"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <button type="submit" id="btn-form-submit"
                class="btn btn-primary btn-modern font-weight-bold text-3 px-5 py-3" data-loading-text="Loading...">
                NEXT
            </button>
            <a href="{{ route('demo.business.index') }}"
                class="btn btn-secondary btn-modern font-weight-bold text-3 px-5 py-3" data-bs-dismiss="modal">
                CANCEL
            </a>
        </div>
    </div>
</form>
