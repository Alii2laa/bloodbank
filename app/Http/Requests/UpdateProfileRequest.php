<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
        if(auth('api')->check()){
            $guard = 'api';
        } else{
            $guard = 'client';
        }
        $clientId = auth($guard)->user()->id;
        return [
            'name' => 'required',
            'email' => 'required|email|unique:clients,email,'.$clientId,
            'date_of_birth' => 'required|date_format:Y-m-d',
            'phone' => 'required|unique:clients,phone,'.$clientId,
            'last_donation_date' => 'required|date_format:Y-m-d',
            'blood_type_id' => 'required|integer',
            'city_id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'برجاء إدخال الإسم',
            'email.required' => 'برجاء إدخال البريد الإلكتروني',
            'email.email' => 'برجاء إدخال البريد الإلكتروني بصيغة صحيحة',
            'email.unique' => 'عفواً هذا البريد الإلكتروني مستخدم لدى شخص آخر',
            'date_of_birth.required' => 'برجاء إدخال تاريخ الميلاد',
            'date_of_birth.date' => 'برجاء إدخال تاريخ صحيح',
            'phone.required' => 'برجاء إدخال رقم الهاتف',
            'phone.unique' => 'عفواً هذا الهاتف مستخدم لدى شخص آخر',
            'last_donation_date.required' => 'برجاء إدخال آخر تاريخ تبرع',
            'last_donation_date.date_format' => 'برجاء إدخال تاريخ صحيح',
            'blood_type_id.required' => 'برجاء إدخال فصيلة الدم',
            'blood_type_id.integer' => 'برجاء إدخال رقم صحيح',
            'city_id.required' => 'برجاء إدخال المدينه',
            'city_id.integer' => 'برجاء إدخال رقم صحيح',
        ];
    }
}
