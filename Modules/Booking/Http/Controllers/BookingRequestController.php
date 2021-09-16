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
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }
}
