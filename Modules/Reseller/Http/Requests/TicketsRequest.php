<?php

namespace Modules\Reseller\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class TicketsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        $image = Request::input('image')?Request::input('image'):'';
         return [
            'ticket_option' => 'required|max:191',
            'name' => 'required|max:191',
            'email' => 'required',
            'subject' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image'   => 'image|mimes:jpeg,png,jpg,gif|max:1024'.$image,
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
