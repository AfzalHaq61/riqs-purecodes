<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class IntizamiStatusesEnum extends Enum
{
    public const SADR_E_UNIT = 'sadr-e-unit';
    public const NAZIM_UMOOMI_UNIT = 'nazim-umoomi-unit';
    public const COORDINATOR_PROJECT = 'coordinator-project';
    public const SADR_E_HALQA = 'sadr-e-halqa';
    public const NAZIM_E_HALQA = 'nazim-umoomi-halqa';
    public const SADR_E_SHEHAR = 'sadr-e-shehar';
    public const NAZIM_E_SHEHAR = 'nazim-umoomi-shehar';
    public const NAZIM_E_DAWAT_SHEHAR = 'nazim-e-dawat-shehar';
    public const ZONAL_SADR = 'zonal-sadr';
    public const ZONAL_NAZIM_E_UMOOMI = 'zonal-nazim-e-umoomi';
    public const ZONAL_NAZIM_E_DAWAT = 'zonal-nazim-e-dawat';
    public const MEMBER_ZONAL_DAWATI_COMMITTEE = 'member-zonal-dawati-committee';
    public const ZONAL_NAZIM_E_TARBIAT_COURSE_1 = 'zonal-nazim-e-tarbiat-course-1';
    public const MEMBER_ZONAL_TARBIAT_COMMITTEE_COURSE_1 = 'member-zonal-tarbiati-committee-course-1';
    public const ZONAL_NAZIM_E_TARBIAT_COURSE_2 = 'zonal-nazim-e-tarbiat-course-2';
    public const MEMBER_ZONAL_TARBIATI_COMMITTEE_COURSE_2 = 'member-zonal-tarbiati-committee-course-2';
    public const ZONAL_NAZIM_E_MALIYAT = 'zonal-nazim-e-malyat';
    public const MEMBER_ZONAL_MALIYAT_COMMITTEE = 'member-zonal-malyat-committee';
    public const ZONAL_NAZIM_E_RAHIMIA = 'zonal-nazim-e-rahimia';
    public const MEMBER_ZONAL_RAHIMIA_COMMITTEE = 'member-zonal-rahimia-committee';
    public const ZONAL_NAZIM_E_NASHRIYAT = 'zonal-nazim-e-nashriyat';
    public const MEMBER_ZONAL_NASHRIYAT_COMMITTEE = 'member-zonal-nashriyat-committee';
    public const REGIONAL_SADR = 'regionol-sadr';
    public const REGIONAOL_NAZIM_E_UMOOMI = 'regionol-nazim-e-umoomi';
    public const REGIONAOL_NAZIM_E_DAWAT = 'regionol-nazim-e-dawat';
    public const MEMBER_REGIONAL_DAWATI_COMMITTEE = 'member-regionol-dawati-committee';
    public const REGIONAOL_NAZIM_E_TARBIAT_COURSE_1 = 'regionol-nazim-e-tarbiat-course-1';
    public const MEMBER_REGIONAL_TARBIATI_COMMITTEE_COURSE_1 = 'member-regionol-tarbiati-committee-course-1';
    public const REGIONAOL_NAZIM_E_TARBIAT_COURSE_2 = 'regionol-nazim-e-tarbiat-course-2';
    public const MEMBER_REGIONAL_TARBIATI_COMMITTEE_COURSE_2 = 'member-regionol-tarbiati-committee-course-2';
    public const REGIONAOL_NAZIM_E_MALIYAT = 'regionol-nazim-e-malyat';
    public const MEMBER_REGIONAL_MALIYAT_COMMITTEE = 'member-regionol-malyat-committee';
    public const REGIONAOL_NAZIM_E_RAHIMIA = 'regionol-nazim-e-rahimia';
    public const MEMBER_REGIONAL_RAHIMIA_COMMITTEE = 'member-regionol-rahimia-committee';
    public const REGIONAOL_NAZIM_E_NASHRIYAT = 'regionol-nazim-e-nashriyat';
    public const MEMBER_REGIONAL_NASHRIYAT_COMMITTEE = 'member-regionol-nashriyat-committee';
}