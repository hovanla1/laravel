<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:2',
            'image' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập tên.',
            'name.min' => 'Tên có ít nhất 2 ký tự.',
            'image.required' => 'Bạn chưa chọn hình ảnh, vui lòng chọn và thử lại.',

        ];
    }
}
