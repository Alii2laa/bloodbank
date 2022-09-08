<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'subject' => 'required|max:30',
            'message' => 'required|max:500',
        ];
    }

    public function messages()
    {
        return [
           'email.required' => 'برجاء إدخال البريد الإلكتروني',
           'email.email' => 'برجاء إدخال البريد الإلكتروني صحيح',
           'subject.required' => 'برجاء إدخال عنوان الرساله',
           'subject.max' => 'برجاء يجب أن يكون عنوان الرساله لا يزيد عن 30 حرف',
           'message.required' => 'برجاء إدخال محتوى الرساله',
           'message.max' => 'برجاء يجب أن يكون محتوى الرساله لا يزيد عن 500 حرف',

        ];
    }
}
