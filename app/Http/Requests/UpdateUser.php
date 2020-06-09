<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'digits:11'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "لطفاً نام خود را وراد کنید",
            'name.max' => "تعداد کاراکتر نام بیش از حد مجاز است",
            'email.required' => "لطفاً ایمیل خود را وارد کنید",
            'email.email' => "ایمیل صحیح نمی باشد",
            'phone.required' => "لطفاً شماره موبایل خود را وارد کنید",
            'phone.digits' => "شماره موبایل باید 11 رقمی باشد"
        ];
    }
}
