<?php

namespace Modules\ThemeBusiness\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required|string|min:3|max:100',
            'email'    => 'required|email|max:100',
            'phone'    => 'required|string|min:6|max:15',
            'subject'  => 'required|string|min:3|max:150',
            'message'  => 'required|string|min:3|max:1000',
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
