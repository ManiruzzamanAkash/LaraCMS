<?php

namespace Modules\Booking\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Booking\Http\Requests\BookingRequest as BookingFormRequest;

class BookingRequestRestAPIController extends Controller
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
