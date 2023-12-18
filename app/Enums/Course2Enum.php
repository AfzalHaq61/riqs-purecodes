<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Course2Enum extends Enum
{
    public const SEMESTER1 =   1;
    public const SEMESTER2 =   2;
    public const SEMESTER3 =   3;
    public const SEMESTER4 =   4;
    public const SEMESTER5 =   5;
    public const SEMESTER6 =   6;


    public static function asArray(): array
    {
        return static::getConstants();
    }

    public static function asDropdown(): array
    {
        $dropdown = [];

        foreach(self::asArray() as $key => $value)
        {
            $dropdown[] = [
                'id' => $value,
                'name' => $key,
            ];
        }

        return $dropdown;
    }
}
