<?php

namespace Modules\Reseller\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VpsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'server_ip' => 'required|max:191',
            'username' => 'required|max:15',
            'password' => 'required',
            'vpn_connection' => 'required',
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
