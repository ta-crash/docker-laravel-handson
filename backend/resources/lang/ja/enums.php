<?php

use App\Enums\BloodType;
use App\Enums\Gender;
use App\Enums\Prefecture;

return [
    BloodType::class => [
        BloodType::A => 'A型',
        BloodType::B => 'B型',
        BloodType::O => 'O型',
        BloodType::AB => 'AB型',
        BloodType::UNKNOWN => '不明',
    ],
    Gender::class => [
        Gender::MALE => '男性',
        Gender::FEMALE => '女性',
    ],
    Prefecture::class => [
        Prefecture::HOKKAIDO => '北海道',
        Prefecture::TOKYO => '東京',
        Prefecture::OSAKA => '大阪',
        Prefecture::FUKUOKA => '福岡',
    ],
];