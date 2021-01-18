<?php

namespace Modules\Customer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'name' => 'required|max:191',
            'mobile' => 'required|max:15',
            'username' => 'required',
            // 'from_date' => 'required',
            // 'to_date' => 'required',
            'billing_system' => 'required|max:64',
            'status' => 'required',
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
