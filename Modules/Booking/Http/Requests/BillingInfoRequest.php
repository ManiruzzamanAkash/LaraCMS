<?php

namespace Modules\Booking\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillingInfoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'booking_request_id' => 'required|numeric',
            'first_name'         => 'required|string|min: 3|max: 100',
            'last_name'          => 'nullable|string|min: 3|max: 50',
            'phone_no'           => 'required|string|max: 15',
            'email'              => 'required|email|max : 50',
            'state'              => 'required|string',
            'city'               => 'required|string',
            'address'            => 'required|string',
            'post_code'          => 'required|numeric',
            'billing_message'    => 'nullable|string',
            'booking_hour'       => 'required|numeric'
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
