<?php

namespace App\Http\Requests\Admin;

class AdminCreateRequest extends AbstractAdminRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:191|unique:admin,email',
            'password' => 'required|confirmed',
        ];
    }
}