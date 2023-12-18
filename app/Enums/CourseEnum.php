<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CourseEnum extends Enum
{
    public const COURSE1 =   1;
    public const COURSE2 =   2;
    public const COURSE3 =   3;


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
