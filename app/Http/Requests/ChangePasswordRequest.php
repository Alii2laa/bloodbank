<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'برجاء إدخال كلمة المرور الجديدة',
            'password.min' => 'كلمة المرور يجب ألا تقل عن 8 أحرف او أرقام',
            'password.confirmed' => 'عفواً كلمتان المرور غير متطابقتان',
            'password_confirmation.required' => 'برجاء إدخال تأكيد كلمة المرور الجديدة'
        ];
    }
}
