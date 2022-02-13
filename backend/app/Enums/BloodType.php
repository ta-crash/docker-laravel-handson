<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class BloodType extends Enum implements LocalizedEnum
{
    // A型
    public const A = 'A';

    // B型
    public const B = 'B';

    // O型
    public const O = 'O';

    // AB型
    public const AB = 'AB';

    // 不明
    public const UNKNOWN = 'unknown';
}