<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:clients,email',
            'date_of_birth' => 'required|date',
            'phone' => 'required|unique:clients,phone',
            'last_donation_date' => 'required|date',
            'password' => 'required|confirmed|min:8',
            'blood_type_id' => 'required|integer',
            'city_id' => 'required|integer'
        ];
    }
    public function messages()
    {
            return [
                'name.required' => 'يجب إدخال الإسم',
                'email.required' => 'يجب إدخال البريد الإلكتروني',
                'email.unique' => 'عفواً هذا البريد الإلكتروني مستخدم من قبل',
                'date_of_birth.required' => 'يجب إدخال تاريخ الميلاد',
                'date_of_birth.date' => 'يجب أن يكون تاريخ صحيح',

                'phone.required' => 'يجب إدخال رقم الهاتف',
                'phone.unique' => 'عفواً هذا الهاتف مستخدم من قبل',

                'last_donation_date.required' => 'يجب إدخال أخر تاريخ تبرع ',
                'last_donation_date.date' => 'يجب أن يكون تاريخ صحيح',

                'password.required' => 'يجب إدخال كلمة السر',
                'password.confirmed' => 'عفواً كلمتان السر غير متطابقتان',
                'password.min' => 'عفواً يجب ألا يقل كلمة السر عن 8 أرقام او حروف',
                'password_confirmation.required' => 'يجب إدخال تأكيد كلمة السر',

                'blood_type_id.required' => 'يجب إدخال فصبلة الدم',
                'city_id.required' => 'يجب إدخال المدينه',

            ];
    }
}
