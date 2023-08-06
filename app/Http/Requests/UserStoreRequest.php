<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:httt_users',
            // 'other'=>'name',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'roles' => 'required',
            'password' => 'required|min:3|max:32',
            'password_re' => 'required|same:password',

            // |unique:httt_user

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'name.unique' => 'Tên đã tồn tại!',
            'username.required' => 'Bạn chưa nhập tên tài khoản',
            'email.required' => 'Bạn chưa nhập email',
            'phone.required' => 'Chưa nhập số điện thoại',
            'address.required' => 'Chưa nhập địa chỉ',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu có ít nhất 3 ký tự.',
            'password.max' => 'Mật khẩu có nhiều nhất 32 ký tự.',
            'password_re.required' => 'Vui lòng nhập xác thực mật khẩu!',
            'password_re.same' => 'Mật khẩu xác thực chưa đúng. Vui lòng kiểm tra và nhập lại!',
            'roles.required' => 'Chưa chọn phận sự'

        ];
    }
}
