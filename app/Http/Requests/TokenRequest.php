<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TokenRequest extends FormRequest
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
            'token' => 'required',
            'type' => 'required|in:android,ios',
        ];
    }

    public function messages()
    {
        return [
          'token.required' => 'عفواً يجب إدخال التوكن',
          'type.required' => 'عفواً يجب إدخال نوع نظام التشغيل',
        ];
    }
}
