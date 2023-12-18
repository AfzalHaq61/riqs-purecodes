<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusesEnum extends Enum
{
    // Statuses
    public const DAWATI = 'dawati';
    public const TARBIATI = 'tarbiati';
    public const INTIZAMI = 'intizami';
}