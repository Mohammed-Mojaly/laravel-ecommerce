<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductReviewRequest extends FormRequest
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
                    //
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'          => 'required|max:255',
                    'user_id'       => 'nullable',
                    'product_id'    => 'required',
                    'email'         => 'required|email',
                    'title'         => 'required',
                    'message'       => 'required',
                    'rating'        => 'required|numeric',
                    'status'        => 'required',
                ];
            }
            default: break;
        }
    }
}
