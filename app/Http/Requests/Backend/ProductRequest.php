<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                    'description' => 'required',
                    'price' => 'required|numeric',
                    'quantity' => 'required|numeric',
                    'product_category_id' => 'required',
                    'tags.*' => 'required',
                    'status' => 'required',
                    'featured' => 'required',
                    'images' => 'nullable',
                    'images.*' => 'mimes:jpg,jpeg,png,gif|max:5000',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                   return [
                    'name' => 'required|max:255',
                    'description' => 'required',
                    'price' => 'required|numeric',
                    'quantity' => 'required|numeric',
                    'product_category_id' => 'required',
                    'tags.*' => 'required',
                    'status' => 'required',
                    'featured' => 'required',
                    'images' => 'nullable',
                    'images.*' => 'mimes:jpg,jpeg,png,gif|max:5000',
                ];
            }
            default: break;
        }

    }
}
