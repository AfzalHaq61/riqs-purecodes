<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class DawatiStatusesEnum extends Enum
{
    // Dawati Statuses
    public const MUAWIN_DAEE = 'muawin-daee';
    public const DAYEE = 'daee';
    public const Muhazir_E_DAWAT = 'muhazir-e-dawat';
    public const MEMBER_SOBAI_DAWAT_COMMITTEE = 'member-sobai-dawate-comiite';
}
