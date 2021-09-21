@php
$categories = \Modules\Article\Entities\Category::getCategories();
$services   = \Modules\Service\Entities\Service::getPageData(['limit' => 20, 'orderBy' => 'asc'])['pages'];
$hours      = \Modules\Booking\Entities\BookingRequest::getServiceHours();
@endphp

<form class="contact-form custom-form-style-1" action="{{ route('booking.request.store.billing', $booking_request->id) }}" method="POST"
    data-parsley-validate>
    <input type="hidden" name="booking_request_id" value="{{  $booking_request->id }}">
    @csrf
    <div class="row">
        <div class="col-md-8 col-lg-8 col-sm-12">
            <h2>Provide Billing Address <span class="small text-xsm text-sm">(<span class="text-danger">*</span> fields
                    are mendatory)</span></h2>
            <div class="row">
                <div class="form-group col-sm-12 col-md-6 pb-1 mb-3">
                    <label for="first_name">First Name <span class="text-danger">*</span></label>
                    <input type="text" maxlength="100" class="form-control" id="first_name" name="first_name"
                        placeholder="Enter First Name" required>
                </div>
                <div class="form-group col-sm-12 col-md-6 pb-1 mb-3">
                    <label for="last_name">Last Name</label>
                    <input type="text" maxlength="100" class="form-control" id="last_name" name="last_name"
                        placeholder="Enter Last Name">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12 col-md-6 pb-1 mb-3">
                    <label for="email">Email Address <span class="text-danger">*</span></label>
                    <input type="email" maxlength="100" class="form-control" id="email" name="email"
                        placeholder="Enter Email Address" required>
                </div>
                <div class="form-group col-sm-12 col-md-6 pb-1 mb-3">
                    <label for="phone_no">Phone No <span class="text-danger">*</span></label>
                    <input type="text" maxlength="100" class="form-control" id="phone_no" name="phone_no"
                        placeholder="Enter Phone No" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12 col-md-12 pb-1 mb-3">
                    <label for="company_name">Company Name</label>
                    <input type="text" maxlength="100" class="form-control" id="company_name" name="company_name"
                        placeholder="Enter Company Name">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-12 col-md-6 pb-1 mb-3">
                    <label for="phone_no">State <span class="text-danger">*</span></label>
                    <select class="form-control" id="state" name="state">
                        <option value="ACT">Australian Capital Territory</option>
                        <option value="NSW" selected="selected">New South Wales</option>
                        <option value="NT">Northern Territory</option>
                        <option value="QLD">Queensland</option>
                        <option value="SA">South Australia</option>
                        <option value="TAS">Tasmania</option>
                        <option value="VIC">Victoria</option>
                        <option value="WA">Western Australia</option>
                    </select>
                </div>
                <div class="form-group col-sm-12 col-md-6 pb-1 mb-3">
                    <label for="city">City / Area <span class="text-danger">*</span></label>
                    <input type="text" maxlength="100" class="form-control" id="city" name="city"
                        placeholder="Enter City / Area Name" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12 col-md-6 pb-1 mb-3">
                    <label for="address">Address <span class="text-danger">*</span></label>
                    <input type="text" maxlength="100" class="form-control" id="address" name="address"
                        placeholder="Enter Street Address" required>
                </div>
                <div class="form-group col-sm-12 col-md-6 pb-1 mb-3">
                    <label for="post_code">Post Code</label>
                    <input type="number" min="0" maxlength="100" class="form-control" id="post_code" name="post_code"
                        placeholder="Enter Post Code">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12 col-md-12 pb-1 mb-3">
                    <label for="billing_message">Additional Message</label>
                    <textarea data-msg-required="Please enter your additional message (if any)" class="form-control"
                        id="billing_message" name="billing_message" placeholder="Enter your message (if any)"></textarea>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 col-sm-12">
            <h2>Order Summary</h2>
            <div class="row">
                <div class="form-group col-sm-12 col-md-12 pb-1 mb-3">
                    <label for="message">Change Hour (If Needed)</label>
                    <select name="booking_hour" class="form-control" id="booking_hour">
                        @foreach ($hours as $key => $hour)
                            <option value="{{ $hour }}">{{ $key }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Service</th>
                        <td>{{ $service->title }}</td>
                    </tr>
                    <tr>
                        <th>Hour</th>
                        <td><span id="totalHour"></span>Hr</td>
                    </tr>
                    <tr>
                        <th>Unit Price</th>
                        <td>{{ $booking_request->booking_rate_value }}$</td>
                    </tr>
                    <tr>
                        <th colspan="2">
                            Time Schedule
                        </th>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{ $booking_request->start_date }}</td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td>{{ $booking_request->start_time }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Subtotal (+)</th>
                        <td><span id="booking_subtotal"></span>$</td>
                    </tr>
                    <tr>
                        <th>Total GST (+)</th>
                        <td><span id="booking_gst_rate"></span>% = <span id="booking_gst_amount"></span>$</td>
                    </tr>
                    <tr>
                        <th>Grand Total</th>
                        <td style="font-size: 20px; color: var(--color-primary)"><span id="booking_grand_total"></span>$</td>
                    </tr>
                </tfoot>
            </table>
            <div class="row text-center">
                <div class="form-group col">
                    <button type="submit" id="btn-form-submit"
                        class="btn btn-primary btn-modern font-weight-bold text-3 px-3 py-2"
                        data-loading-text="Loading...">
                        BOOK
                    </button>
                    <a href="{{ route('demo.business.booking_request.create') }}"
                        class="btn btn-secondary btn-modern font-weight-bold text-3 px-3 py-2" data-bs-dismiss="modal">
                        CANCEL
                    </a>
                    {{-- <button type="submit" id="btn-form-submit" class="btn btn-warning btn-modern font-weight-bold text-3 px-3 py-2" title="Book & Print Invoice">
                        <i class="fa fa-print"></i>
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
</form>
