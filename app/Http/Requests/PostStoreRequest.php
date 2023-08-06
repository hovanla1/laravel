<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:2',
            'detail' => 'required|min:2',
            'metakey' => 'required',
            'metadesc' => 'required',
            'images' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập tên.',
            'name.min' => 'Tên có ít nhất 2 ký tự.',
            'metakey.required' => 'Chưa nhập từ khóa tìm kiếm.',
            'metadesc.required' => 'Chưa nhập mô tả.',
        ];
    }
}
