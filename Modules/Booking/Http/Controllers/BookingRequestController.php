<?php

namespace Modules\Booking\Http\Controllers;

use Exception;
use Illuminate\Routing\Controller;
use Modules\Booking\Entities\BookingRequest;
use Modules\Booking\Http\Requests\BookingRequest as BookingFormRequest;

class BookingRequestController extends Controller
{
    public function store(BookingFormRequest $request)
    {
        try {
            BookingRequest::store($request->all());
            session()->flash('success', 'Your request has been sent to authority. An agent will communicate with you soon.');
            return back();
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
        }
    }
}
