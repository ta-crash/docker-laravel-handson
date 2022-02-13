<?php

use App\Enums\BloodType;
use App\Enums\Gender;
use App\Enums\Prefecture;

return [
    BloodType::class => [
        BloodType::A => 'type A',
        BloodType::B => 'type B',
        BloodType::O => 'type O',
        BloodType::AB => 'type AB',
        BloodType::UNKNOWN => 'unknown',
    ],
    Gender::class => [
        Gender::MALE => 'male',
        Gender::FEMALE => 'female',
    ],
    Prefecture::class => [
        Prefecture::HOKKAIDO => 'Hokkaido',
        Prefecture::TOKYO => 'Tokyo',
        Prefecture::OSAKA => 'Osaka',
        Prefecture::FUKUOKA => 'Fukuoka',
    ],
];