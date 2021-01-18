<?php

namespace Modules\Reseller\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResellerRequest extends FormRequest
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
            'username' => 'required|max:128|unique:reseller,id,' . $this->get('id'),
            // 'from_date' => 'required',
            // 'to_date' => 'required',
            'user_limit' => 'required',
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
