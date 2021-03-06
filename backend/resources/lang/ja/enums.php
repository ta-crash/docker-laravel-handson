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
        Prefecture::AOMORI => '青森',
        Prefecture::IWATE => '岩手',
        Prefecture::MIYAGI => '宮城',
        Prefecture::AKITA => '秋田',
        Prefecture::YAMAGATA => '山形',
        Prefecture::FUKUSHIMA => '福島',
        Prefecture::IBARAKI => '茨城',
        Prefecture::TOCHIGI => '栃木',
        Prefecture::GUNMA => '群馬',
        Prefecture::SAITAMA => '埼玉',
        Prefecture::CHIBA => '千葉',
        Prefecture::TOKYO => '東京',
        Prefecture::KANAGAWA => '神奈川',
        Prefecture::NIIGATA => '新潟',
        Prefecture::TOYAMA => '富山',
        Prefecture::ISHIKAWA => '石川',
        Prefecture::FUKUI => '福井',
        Prefecture::YAMANASHI => '山梨',
        Prefecture::NAGANO => '長野',
        Prefecture::GIFU => '岐阜',
        Prefecture::SHIZUOKA => '静岡',
        Prefecture::AICHI => '愛知',
        Prefecture::MIE => '三重',
        Prefecture::SHIGA => '滋賀',
        Prefecture::KYOTO => '京都',
        Prefecture::OSAKA => '大阪',
        Prefecture::HYOGO => '兵庫',
        Prefecture::NARA => '奈良',
        Prefecture::WAKAYAMA => '和歌山',
        Prefecture::TOTTORI => '鳥取',
        Prefecture::SHIMANE => '島根',
        Prefecture::OKAYAMA => '岡山',
        Prefecture::HIROSHIMA => '広島',
        Prefecture::YAMAGUCHI => '山口',
        Prefecture::TOKUSHIMA => '徳島',
        Prefecture::KAGAWA => '香川',
        Prefecture::EHIME => '愛媛',
        Prefecture::KOCHI => '高知',
        Prefecture::FUKUOKA => '福岡',
        Prefecture::SAGA => '佐賀',
        Prefecture::NAGASAKI => '長崎',
        Prefecture::KUMAMOTO => '熊本',
        Prefecture::OITA => '大分',
        Prefecture::MIYAZAKI => '宮崎',
        Prefecture::KAGOSHIMA => '鹿児島',
        Prefecture::OKINAWA => '沖縄',
    ],
];