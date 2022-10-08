<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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

        $rule =( $this->getMethod() == 'PUT') ? 'nullable' : 'required';
        return [
            'title' => 'required',
            'content' => 'required',
            'image' => $rule.'|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'برجاء إدخال عنوان المقالة',
            'content.required' => 'برجاء إدخال محتوى المقالة',
            'image.required' => 'برجاء إدخال صورة المقالة',
            'image.image' => 'برجاء إدخال صورة صحيحة',
            'image.mimes' => 'الإمتدادات المسموحه فقط jpeg,png,jpg,gif,svg',
            'image.max' => 'عفواً يجب أن يكون الحد الأقصي للصورة 2 ميجا بايت',
            'category_id.required' => 'برجاء إدخال فئة المقالة',
        ];
    }
}
