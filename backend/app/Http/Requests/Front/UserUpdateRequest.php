<?php

namespace App\Http\Requests\Front;

use App\Enums\BloodType;
use App\Enums\Gender;
use App\Enums\Prefecture;
use BenSampo\Enum\Rules\EnumValue;

class UserUpdateRequest extends AbstractUserRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'display_name' => 'required|string|max:20',
            'email' => "required|string|email|max:191|unique:users,email,{$this->user->id},id",
            'password' => 'nullable|confirmed',
            'name' => 'required|string|max:50',
            'name_kana' => 'required|string|max:50',
            'birth_year' => 'required|integer',
            'birth_month' => 'required|integer',
            'birth_date' => 'required|integer',
            'height' => 'required|integer',
            'weight' => 'required|integer',
            'blood_type' => ['required', 'string', new EnumValue(BloodType::class, false)],
            'tel' => 'required|string|between:10,11',
            'zip_code' => 'required|string|max:9',
            'prefecture' => ['required', 'string', new EnumValue(Prefecture::class, false)],
            'address' => 'required|string|max:100',
            'address_building' => 'nullable|string|max:100',
            'plan_id' => 'required|integer|exists:plans,id',
        ];
    }
}