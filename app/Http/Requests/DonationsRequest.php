<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationsRequest extends FormRequest
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
            'patient_name' => 'required',
            'patient_age' => 'required',
            'patient_phone' => 'required',
            'hospital' => 'required',
            'address' => 'required',
            'bags_quantity' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'notes' => 'nullable',
            'city_id' => 'required',
            'blood_type_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'patient_name.required' => 'يجب إدخال إسم المريض',
            'patient_age.required' => 'يجب إدخال عمر المريض',
            'patient_phone.required' => 'يجب إدخال هاتف مرافق المريض',
            'hospital.required' => 'يجب إدخال إسم المستشفى',
            'address.required' => 'يجب إدخال عنوان المستشفى',
            'bags_quantity.required' => 'يجب إدخال عدد أكياس الدم',
            'city_id.required' => 'يجب إدخال إسم المدينه',
            'blood_type_id.required' => 'يجب إدخال إسم فصيلة الدم',
        ];
    }
}
