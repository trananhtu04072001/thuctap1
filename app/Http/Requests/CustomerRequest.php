<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'address' => 'required',
            'password' => 'required',
            'repassword' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'email.required' => 'email không được để trống',
            'email.unique' => 'email bị trùng',
            'phone.required' => 'sđt không được để trống',
            'phone.unique' => 'sđt bị trùng lặp',
            'address.required' => 'Địa chỉ không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'repassword.required' => 'Nhập lại mật khẩu không được để trống',
            'repassword.same' => 'Nhập lại mật khẩu không đúng',
        ];
    }
}
