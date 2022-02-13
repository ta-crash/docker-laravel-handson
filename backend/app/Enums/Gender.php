<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class Gender extends Enum implements LocalizedEnum
{
    // 男性
    public const MALE = 'male';

    // 女性
    public const FEMALE = 'female';
}