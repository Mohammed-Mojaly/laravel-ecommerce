<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AdminInfoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username,'.auth()->id(),
            'email' => 'required|unique:users,email,'.auth()->id(),
            'mobile' => 'required|unique:users,mobile,'.auth()->id(),
            'password' => 'nullable|min:8',
            'user_image' => 'nullable|mimes:jpg,jpeg,png,gif|max:20000',
        ];
    }
}
