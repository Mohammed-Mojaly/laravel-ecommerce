<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CustomerAddressRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'user_id'           => 'required',
                    'default_address'   => 'nullable',
                    'address_title'     => 'required',
                    'first_name'        => 'required',
                    'last_name'         => 'required',
                    'email'             => 'required|email',
                    'mobile'            => 'required|numeric',
                    'address'           => 'required',
                    'address2'          => '',
                    'country_id'        => 'required',
                    'state_id'          => 'required',
                    'city_id'           => 'required',
                    'zip_code'          => 'required',
                    'po_box'            => 'required',
                ];
            }
            default: break;
        }
    }
}
