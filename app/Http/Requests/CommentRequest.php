<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'name' => 'required| string| max:255',
            'email' => 'required| string|email | max:255',
            'body' => 'required| string',
            recaptchaFieldName() => recaptchaRuleName()
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "لطفاً نام را وارد کنید",
            'name.max' => "تعداد کاراکتر نام بیش از حد مجاز است",
            'email.required' => "لطفاً ایمیل خود را وارد کنید",
            'email.email' => "ایمیل صحیح نمی باشد",
            'body.required'=>"لطفا متن نظر خود را وارد کنید",
            'recaptcha' =>"لطفا با انتخاب گزینه ' من ربات نیستم ' تائید کنید که ربات نیستید"
        ];
    }
}
