<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class Prefecture extends Enum implements LocalizedEnum
{
    // 北海道
    public const HOKKAIDO = '北海道';

    // 東京
    public const TOKYO = '東京';

    // 大阪
    public const OSAKA = '大阪';

    // 福岡
    public const FUKUOKA = '福岡';
}