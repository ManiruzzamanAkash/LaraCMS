<?php

namespace Modules\Booking\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Routing\Controller;
use Modules\Booking\Entities\BillingInformation;
use Modules\Booking\Entities\BookingRequest;
use Modules\Booking\Http\Requests\BillingInfoRequest;

class BillingInformationController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });
    }

    /**
     * Show the form for creating billing address for the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBilling($booking_request_id)
    {
        $booking_request_id = intval($booking_request_id);
        $booking_request    = BookingRequest::find($booking_request_id);

        if (empty($booking_request)) {
            session()->flash('error', 'Sorry ! Request could not be found.');
            return back();
        }

        if (Carbon::now() > $booking_request->expired_at) {
            session()->flash('error', "Billing information entry for this booking has been expired. Please create one again.");
            return back();
        }

        $service = $booking_request->service;
        $booking_default_gst =  BillingInformation::getDefaultBillingGst();

        // Check if already an entry submitted for this booking request or not
        if (BillingInformation::where('booking_request_id', $booking_request_id)->exists()) {
            throw new Exception("Already a billing information has been added for this request. Please create one again.");
        }

        return view('booking::frontend.pages.booking-request-billing', compact('booking_request', 'service', 'booking_default_gst'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function store(BillingInfoRequest $request, $id)
    {
        try {
            $data                       = $request->all();
            $data['booking_request_id'] = intval($id);

            $billing_information = BillingInformation::store($data);

            if (!empty($billing_information)) {
                session()->flash('success', 'Your request has been sent to authority. An agent will communicate with you soon.');
                return redirect()->route('demo.business.index');
            }

            session()->flash('error', 'Something went wrong adding billing information. Please try again.');
            return back();
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }
}
