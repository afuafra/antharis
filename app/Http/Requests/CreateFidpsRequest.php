<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFidpsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fidp_no' => 'required',
            'fidp_device_id' => 'required',
            'device_address' => 'required',
            'device_status' => 'required',
            'device_site_id' => 'required'
        ];
    }
}
