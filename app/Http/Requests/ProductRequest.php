<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'price' => 'required',
            'image' => 'required',
            'images' => 'required',
            'des' => 'required',
            'id_type' => 'required',
            'id_brand' => 'required',
            'id_atr' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nhập tên sản phẩm',
            'price.required' => 'Nhập giá sản phẩm',
            'image.required' => 'Thêm ảnh sản phẩm',
            'images.required' => 'Thêm ảnh chi tiết',
            'des.required' => 'Thêm miêu tả',
            'id_type.required' => 'Thêm loại',
            'id_brand.required' => 'Thêm hãng',
            'id_atr.required' => 'thêm thuộc tính',
        ];
    }
}
