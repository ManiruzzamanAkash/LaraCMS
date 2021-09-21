@extends('themebusiness::frontend.layouts.master')

@section('title')
    Confirm Billing Address | {{ config('app.name') }}
@endsection

@section('main-content')

    <div role="main" class="main">
        <section class="page-header page-header-modern page-header-lg bg-tertiary border-0 my-0">
            <div class="container my-3">
                <div class="row">
                    <div class="col-md-12 align-self-center p-static order-2 text-center">
                        <h1 class="font-weight-bold text-10">Confirm Billing Address</h1>
                    </div>
                    <div class="col-md-12 align-self-center order-1">
                        <ul class="breadcrumb breadcrumb-light d-block text-center">
                            <li>
                                <a href="{{ route('demo.business.index') }}">Home</a>
                            </li>
                            <li class="active">Confirm Billing Address</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <div class="container pb-2 mb-5 mt-5">
            <div class="card card-body p-3">
                @include('frontend.layouts.partials.messages')
                @include('booking::frontend.partials.booking-request-billing-form')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let totalHour = 1;
        const bookingRateValue = "{{ $booking_request->booking_rate_value }}";
        const bookingGstRate = "{{ $booking_default_gst }}"; //eg: 10%
        let bookingGstAmount = bookingGstRate * (totalHour * bookingRateValue) / 100;
        let bookingGrandTotal = parseFloat(bookingRateValue) + parseFloat(bookingGstRate);

        $("#totalHour").html(totalHour + '');
        $("#booking_subtotal").html(totalHour * bookingRateValue + '');
        $("#booking_gst_rate").html(bookingGstRate + '');
        $("#booking_gst_amount").html(bookingGstAmount + '');
        $("#booking_grand_total").html(bookingGrandTotal + '');

        $("#booking_hour").on('change', function() {
            totalHour = parseFloat($("#booking_hour").val());
            bookingGstAmount = bookingGstRate * (totalHour * bookingRateValue) / 100;
            bookingGrandTotal = parseFloat(totalHour * bookingRateValue) + parseFloat(bookingGstAmount);

            $("#totalHour").html(totalHour + '');
            $("#booking_subtotal").html(totalHour * bookingRateValue + '');
            $("#booking_gst_amount").html(bookingGstAmount + '');
            $("#booking_grand_total").html(bookingGrandTotal + '');
        });
    </script>
@endsection
