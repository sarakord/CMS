<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required| string| max:255',
            'slug' => 'required | unique:categories'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "لطفاً نام را وارد کنید",
            'name.max' => "تعداد کاراکتر نام بیش از حد مجاز است",
            'slug.required' => "لطفاً نام مستعار را وارد کنید",
            'slug.unique' => "نام مستعار تکرایست"
        ];
    }
}
