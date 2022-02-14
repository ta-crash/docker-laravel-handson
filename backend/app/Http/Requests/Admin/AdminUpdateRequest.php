<?php

namespace App\Http\Requests\Admin;

class AdminUpdateRequest extends AbstractAdminRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'email' => "required|string|email|max:191|unique:admins,email,{$this->admin->id},id",
            'password' => 'nullable|confirmed',
        ];
    }
}