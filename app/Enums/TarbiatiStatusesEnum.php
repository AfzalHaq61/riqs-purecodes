<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TarbiatiStatusesEnum extends Enum
{
    // Tarbiati Statuses
    public const MOJAWIZA_MADUU = 'mojawiza-maduu';
    public const MADUU = 'maduu';
    public const MADNI_HALL = 'madni-hall';
    public const COURSE_1 = 'course-1';
    public const COURSE_2 = 'course-2';
    public const COURSE_3 = 'course-3';
    public const MOHAZIR_COURSE_1 = 'mohazi-course-1';
    public const MOHAZIR_COURSE_2 = 'mohazi-course-2';
    public const MOHAZIR_COURSE_3 = 'mohazi-course-3';
}
