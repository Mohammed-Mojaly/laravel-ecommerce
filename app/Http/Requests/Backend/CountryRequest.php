<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch ($this->method()) {
            case 'POST': {
                    return [
                        'name' => 'required|max:255|unique:countries',
                        'status' => 'required',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'name' => 'required|max:255|unique:countries,name,' . $this->route()->country->id,
                        'status' => 'required',
                    ];
                }
            default:
                break;
        }
    }
}
