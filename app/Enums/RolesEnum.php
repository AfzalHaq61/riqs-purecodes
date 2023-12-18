<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RolesEnum extends Enum
{
    public const COORDINATORPROJECT =   'coordinator-project';
    public const SADREUNIT =   'sadr-e-unit';
    public const NAZIMEUMOOMIUNIT =   'nazim-umoomi-unit';
    public const SADREHALQA =   'sadr-e-halqa';
    public const NAZIMUMOOMIHALQA =   'nazim-umoomi-halqa';
    public const SADRESHEHAR =   'sadr-e-shehar';
    public const NAZIMEUMOOMISHEHAR =   'nazim-umoomi-shehar';
    public const ZONALSADR =   'zonal-sadr';
    public const ZONALNAZIMUMOOMI =   'zonal-nazim-e-umoomi';
    public const ZONALNAZIMEDAWAT =   'zonal-nazim-e-dawat';
    public const ZONALNAZIMUETARBIATCOURSE1 =   'zonal-nazim-e-tarbiat-course-1';
    public const ZONALNAZIMUETARBIATCOURSE2 =   'zonal-nazim-e-tarbiat-course-2';
    public const ZONALNAZIMEMALIYAT =   'zonal-nazim-e-malyat';
    public const ZONALNAZIMERAHIMIA =   'zonal-nazim-e-rahimia';
    public const ZONALNAZIMENASHRIYAT =   'zonal-nazim-e-nashriyat';
    public const REGIONALSADR =   'regional-sadr';
    public const REGIONALNAZIMUMOOMI =   'regional-nazim-e-umoomi';

    public static function asArray(): array
    {
        return static::getConstants();
    }

}
