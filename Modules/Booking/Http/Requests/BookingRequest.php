<?php

namespace Modules\Booking\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                => 'required|string|min: 3|max: 50',
            'phone_no'            => 'required|string|max: 50',
            'email'               => 'required|email|max : 50',
            'start_date'          => 'required|date',
            'start_time'          => 'required|string',
            'service_category_id' => 'required|numeric',
            'booking_rate_id'     => 'required|numeric',
            'service_id'          => 'required|numeric',
            'message'             => 'nullable|string'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
