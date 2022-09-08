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
        return [
            'title' => 'required',
            'content_data' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'برجاء إدخال عنوان المقالة',
            'content_data.required' => 'برجاء إدخال محتوى المقالة',
            'image.required' => 'برجاء إدخال صورة المقالة',
            'category_id.required' => 'برجاء إدخال فئة المقالة',
        ];
    }
}
