<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractUserRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'display_name' => '表示名',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'name' => '名前',
            'name_kana' => '名前(カナ)',
            'gender' => '性別',
            'birth_year' => '生年月日(年)',
            'birth_month' => '生年月日(月)',
            'birth_date' => '生年月日(日)',
            'height' => '身長',
            'weight' => '体重',
            'blood_type' => '血液型',
            'tel' => '電話番号',
            'zip_code' => '郵便番号',
            'prefecture' => '都道府県',
            'address' => '住所',
            'address_building' => '住所(建物名)',
            'plan_id' => 'プラン',
            'age_from' => '年齢(from)',
            'age_to' => '年齢(to)',
            'prefectures' => '都道府県',
        ];
    }
}