<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class RequestsUser extends FormRequest
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
            'user_name' =>'required',
            'password' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'vui lòng nhập tên của bạn',
            'password.required'=>'vui lòng nhập password',
        ];
    }
}
