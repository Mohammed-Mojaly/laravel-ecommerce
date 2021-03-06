<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PaymentMethodRequest extends FormRequest
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
                    'name' => 'required|max:255',
                    'code' => 'required|max:255|unique:payment_methods,code',
                    'driver_name' => 'nullable',
                    'merchant_email' => 'nullable|email',
                    'username' => 'nullable',
                    'password' => 'nullable',
                    'secret' => 'nullable',
                    'sandbox_merchant_email' => 'nullable',
                    'sandbox_username' => 'nullable',
                    'sandbox_password' => 'nullable',
                    'sandbox_secret' => 'nullable',
                    'sandbox' => 'nullable',
                    'status' => 'required',

                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|max:255',
                    'code' => 'required|max:255|unique:payment_methods,code,'.$this->route()->payment_method->id,
                    'driver_name' => 'nullable',
                    'merchant_email' => 'nullable|email',
                    'username' => 'nullable',
                    'password' => 'nullable',
                    'secret' => 'nullable',
                    'sandbox_merchant_email' => 'nullable',
                    'sandbox_username' => 'nullable',
                    'sandbox_password' => 'nullable',
                    'sandbox_secret' => 'nullable',
                    'sandbox' => 'nullable',
                    'status' => 'required',
                ];
            }
            default: break;
        }
    }
}
