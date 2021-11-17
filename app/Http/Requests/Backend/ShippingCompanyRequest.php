<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class ShippingCompanyRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name'          => 'required|max:255',
                    'code'          => 'required|unique:shipping_companies',
                    'description'   => 'required',
                    'fast'          => 'required',
                    'cost'          => 'required|numeric',
                    'status'        => 'required',
                    'countries'     => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'          => 'required|max:255',
                    'code'          => 'required|unique:shipping_companies,code,'.$this->route()->shipping_company->id,
                    'description'   => 'required',
                    'fast'          => 'required',
                    'cost'          => 'required|numeric',
                    'status'        => 'required',
                    'countries'     => 'required',
                ];
            }
            default: break;
        }

    }
}
