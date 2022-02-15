<?php

namespace App\Http\Requests\Front;

use App\Enums\BloodType;
use App\Enums\Prefecture;
use BenSampo\Enum\Rules\EnumValue;

class UserSearchRequest extends AbstractUserRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'age_from' => 'nullable|numeric|min:20',
            'age_to' => 'nullable|numeric|min:20|gte:age_from',
            'prefectures.*' => ['nullable', 'string', new EnumValue(Prefecture::class, false)],
        ];
    }

    public function messages()
    {
        return [
            'age_to.gte' => ':attributeは:value以上の値を指定してください。',
        ];
    }
}