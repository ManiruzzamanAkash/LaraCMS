@extends('backend.layouts.master')

@section('title')
    @include('booking::backend.booking_request.partials.title')
@endsection

@section('admin-content')
    @include('booking::backend.booking_request.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page p-4">
            <form action="{{ route('admin.booking_request.update', $booking_request->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <h3>Booking Request Information</h3>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>REQUEST ID</th>
                                    <td>#{{ $booking_request->id }}</td>
                                </tr>
                                <tr>
                                    <th>Customer Information</th>
                                    <td>
                                        Name: {{ $booking_request->name }}<br>
                                        Email: <a
                                            href="mailto:{{ $booking_request->email }}">{{ $booking_request->email }}</a><br>
                                        Phone No: <a
                                            href="tel:{{ $booking_request->phone_no }}">{{ $booking_request->phone_no }}</a><br>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Service Information</th>
                                    <td>
                                        <b>Category:</b> {{ $booking_request->service_category_name }}<br>
                                        <b>Service:</b> {{ $booking_request->service_name }}<br>
                                        <b>Rate:</b> {{ $booking_request->booking_rate_name }}<br>
                                        <b>Rate Value:</b> {{ $booking_request->booking_rate_value }}$<br>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date Information</th>
                                    <td>
                                        <b>Service Time: </b> {{ $booking_request->start_date }} at
                                        {{ $booking_request->start_time }}<br />
                                        <b>Requested at: </b> {{ $booking_request->created_at->diffForHumans() }}<br />
                                    </td>
                                </tr>
                                <tr>
                                    <th>Additional Message</th>
                                    <td>
                                        {{ empty($booking_request->message) ? 'N/A' : $booking_request->message }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <select name="booking_status" id="booking_status" class="form-control" required>
                                            @foreach ($booking_statuses as $key => $status)
                                                <option value="{{ $key }}"
                                                    {{ $booking_request->status == $key ? 'selected' : '' }}>
                                                    {{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <h3>Billing Information</h3>
                        @if (!empty($billing))
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Billing Customer</th>
                                        <td>
                                            Name: {{ $billing->first_name }} {{ $billing->last_name }}<br>
                                            Email: <a
                                                href="mailto:{{ $billing->email }}">{{ $billing->email }}</a><br>
                                            Phone No: <a
                                                href="tel:{{ $billing->phone_no }}">{{ $billing->phone_no }}</a><br>
                                            Company Name: {{ $billing->company_name }}<br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Address Information</th>
                                        <td>
                                            <b>State:</b> {{ $billing->state }}<br>
                                            <b>City:</b> {{ $billing->city }}<br>
                                            <b>Address:</b> {{ $billing->address }}<br>
                                            <b>Postal Code:</b> {{ $billing->post_code }}<br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Additional Message</th>
                                        <td>
                                            {{ empty($billing->billing_message) ? 'N/A' : $billing->billing_message }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Service Information</th>
                                        <td>
                                            <table>
                                                <tbody class="table table-borderless table-sm">
                                                    <tr>
                                                        <th>Booking Hour:</th>
                                                        <td>{{ $billing->booking_hour }}Hr</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Unit Price:</th>
                                                        <td>{{ $booking_request->booking_rate_value }}$ </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Subtotal: (+)</th>
                                                        <td>{{ $billing->booking_hour * $booking_request->booking_rate_value }}$
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>GST: (+)</th>
                                                        <td>{{ $billing->booking_gst }}$ </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Grand Total: (+)</th>
                                                        <td>{{ $billing->grand_total }}$ </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <select name="billing_status" id="billing_status" class="form-control"
                                                required>
                                                @foreach ($billing_statuses as $key => $status)
                                                    <option value="{{ $key }}"
                                                        {{ $billing->payment_status == $key ? 'selected' : '' }}>
                                                        {{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                <div class="form-actions">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
                        <a href="{{ route('admin.booking_request.index') }}" class="btn btn-dark">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @include('booking::backend.booking_request.partials.scripts')
@endsection
