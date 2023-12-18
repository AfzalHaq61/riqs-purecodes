<?php

use App\Enums\DawatiStatusesEnum;
use App\Enums\IntizamiStatusesEnum;
use App\Enums\RolesEnum;
use App\Enums\StatusesEnum;
use App\Enums\TarbiatiStatusesEnum;
use App\Models\Halqa;
use App\Models\Region;
use App\Models\Shehar;
use App\Models\Status;
use App\Models\Unit;
use App\Models\Zone;

function dawati_statuses()
{
    if (auth()->user()->hasAnyRole(RolesEnum::ZONALSADR, RolesEnum::ZONALNAZIMUMOOMI, RolesEnum::ZONALNAZIMEDAWAT)) {
        return Status::ofType(StatusesEnum::DAWATI)
            ->exclude([DawatiStatusesEnum::MEMBER_SOBAI_DAWAT_COMMITTEE])
            ->get()
            ->map(fn ($status) => [
                'id' => $status->id,
                'name' => $status->name
            ]);
    } else if (auth()->user()->hasAnyRole(RolesEnum::SADREHALQA, RolesEnum::NAZIMUMOOMIHALQA)) {
        return Status::ofType(StatusesEnum::DAWATI)
            ->exclude([DawatiStatusesEnum::MEMBER_SOBAI_DAWAT_COMMITTEE, DawatiStatusesEnum::DAYEE, DawatiStatusesEnum::Muhazir_E_DAWAT])
            ->get()
            ->map(fn ($status) => [
                'id' => $status->id,
                'name' => $status->name
            ]);
    }
}

function terbiati_statuses()
{
    if (auth()->user()->hasAnyRole(RolesEnum::ZONALNAZIMUETARBIATCOURSE1)) {
        return Status::ofType(StatusesEnum::TARBIATI)
            ->exclude([TarbiatiStatusesEnum::MOHAZIR_COURSE_1, TarbiatiStatusesEnum::MOHAZIR_COURSE_2, TarbiatiStatusesEnum::MOHAZIR_COURSE_3, TarbiatiStatusesEnum::COURSE_3, TarbiatiStatusesEnum::COURSE_2])
            ->get()
            ->map(fn ($status) => [
                'id' => $status->id,
                'name' => $status->name
            ]);
    } else if (auth()->user()->hasAnyRole(RolesEnum::ZONALSADR, RolesEnum::ZONALNAZIMUMOOMI, RolesEnum::ZONALNAZIMUETARBIATCOURSE2)) {
        return Status::ofType(StatusesEnum::TARBIATI)
            ->exclude([TarbiatiStatusesEnum::MOHAZIR_COURSE_1, TarbiatiStatusesEnum::MOHAZIR_COURSE_2, TarbiatiStatusesEnum::MOHAZIR_COURSE_3, TarbiatiStatusesEnum::COURSE_3])
            ->get()
            ->map(fn ($status) => [
                'id' => $status->id,
                'name' => $status->name
            ]);
    } else if (auth()->user()->hasAnyRole(RolesEnum::SADREHALQA, RolesEnum::NAZIMUMOOMIHALQA)) {
        return Status::ofType(StatusesEnum::TARBIATI)
            ->exclude([TarbiatiStatusesEnum::MOHAZIR_COURSE_1, TarbiatiStatusesEnum::MOHAZIR_COURSE_2, TarbiatiStatusesEnum::MOHAZIR_COURSE_3, TarbiatiStatusesEnum::COURSE_3, TarbiatiStatusesEnum::COURSE_2, TarbiatiStatusesEnum::COURSE_1])
            ->get()
            ->map(fn ($status) => [
                'id' => $status->id,
                'name' => $status->name
            ]);
    }
}

function intizami_statuses()
{
    if (auth()->user()->hasAnyRole(RolesEnum::ZONALSADR, RolesEnum::ZONALNAZIMUMOOMI)) {
        return Status::ofType(StatusesEnum::INTIZAMI)
            ->exclude([
                IntizamiStatusesEnum::ZONAL_SADR,
                IntizamiStatusesEnum::REGIONAL_SADR,
                IntizamiStatusesEnum::REGIONAOL_NAZIM_E_UMOOMI,
                IntizamiStatusesEnum::REGIONAOL_NAZIM_E_DAWAT,
                IntizamiStatusesEnum::MEMBER_REGIONAL_DAWATI_COMMITTEE,
                IntizamiStatusesEnum::REGIONAOL_NAZIM_E_TARBIAT_COURSE_1,
                IntizamiStatusesEnum::MEMBER_REGIONAL_TARBIATI_COMMITTEE_COURSE_1,
                IntizamiStatusesEnum::REGIONAOL_NAZIM_E_TARBIAT_COURSE_2,
                IntizamiStatusesEnum::MEMBER_REGIONAL_TARBIATI_COMMITTEE_COURSE_2,
                IntizamiStatusesEnum::REGIONAOL_NAZIM_E_MALIYAT,
                IntizamiStatusesEnum::MEMBER_REGIONAL_MALIYAT_COMMITTEE,
                IntizamiStatusesEnum::REGIONAOL_NAZIM_E_NASHRIYAT,
                IntizamiStatusesEnum::MEMBER_REGIONAL_NASHRIYAT_COMMITTEE,
                IntizamiStatusesEnum::REGIONAOL_NAZIM_E_RAHIMIA,
                IntizamiStatusesEnum::SOBAYI_SADR,
                IntizamiStatusesEnum::SOBAYI_NAZIM_E_UMOOMI,
                IntizamiStatusesEnum::SOBAYI_NAZIM_E_DAWAT,
                IntizamiStatusesEnum::MEMBER_SOBAYI_DAWATI_COMMITTEE,
                IntizamiStatusesEnum::SOBAYI_NAZIM_E_TARBIAT_COURSE_1,
                IntizamiStatusesEnum::MEMBER_SOBAYI_TARBIATI_COMMITTEE_COURSE_1,
                IntizamiStatusesEnum::SOBAYI_NAZIM_E_TARBIAT_COURSE_2,
                IntizamiStatusesEnum::MEMBER_SOBAYI_TARBIATI_COMMITTEE_COURSE_2,
                IntizamiStatusesEnum::SOBAYI_NAZIM_E_MALIYAT,
                IntizamiStatusesEnum::MEMBER_SOBAYI_MALIYAT_COMMITTEE,
                IntizamiStatusesEnum::SOBAYI_NAZIM_E_NASHRIYAT,
                IntizamiStatusesEnum::MEMBER_SOBAYI_NASHRIYAT_COMMITTEE,
                IntizamiStatusesEnum::SOBAYI_NAZIM_E_RAHIMIA,
            ])
            ->get()
            ->map(fn ($status) => [
                'id' => $status->id,
                'name' => $status->name
            ]);
    } else if (auth()->user()->hasAnyRole(RolesEnum::SADREHALQA, RolesEnum::NAZIMUMOOMIHALQA)) {
        return Status::ofType(StatusesEnum::INTIZAMI)
            ->exclude([
                IntizamiStatusesEnum::SADR_E_HALQA,
                IntizamiStatusesEnum::SADR_E_SHEHAR,
                IntizamiStatusesEnum::NAZIM_E_SHEHAR,
                IntizamiStatusesEnum::NAZIM_E_DAWAT_SHEHAR,
                IntizamiStatusesEnum::ZONAL_SADR,
                IntizamiStatusesEnum::ZONAL_NAZIM_E_UMOOMI,
                IntizamiStatusesEnum::ZONAL_NAZIM_E_DAWAT,
                IntizamiStatusesEnum::MEMBER_ZONAL_DAWATI_COMMITTEE,
                IntizamiStatusesEnum::ZONAL_NAZIM_E_TARBIAT_COURSE_1,
                IntizamiStatusesEnum::MEMBER_ZONAL_TARBIAT_COMMITTEE_COURSE_1,
                IntizamiStatusesEnum::ZONAL_NAZIM_E_TARBIAT_COURSE_2,
                IntizamiStatusesEnum::MEMBER_ZONAL_TARBIATI_COMMITTEE_COURSE_2,
                IntizamiStatusesEnum::ZONAL_NAZIM_E_MALIYAT,
                IntizamiStatusesEnum::MEMBER_ZONAL_MALIYAT_COMMITTEE,
                IntizamiStatusesEnum::ZONAL_NAZIM_E_NASHRIYAT,
                IntizamiStatusesEnum::MEMBER_ZONAL_NASHRIYAT_COMMITTEE,
                IntizamiStatusesEnum::ZONAL_NAZIM_E_RAHIMIA,
                IntizamiStatusesEnum::MEMBER_ZONAL_RAHIMIA_COMMITTEE,
                IntizamiStatusesEnum::REGIONAL_SADR,
                IntizamiStatusesEnum::REGIONAOL_NAZIM_E_UMOOMI,
                IntizamiStatusesEnum::REGIONAOL_NAZIM_E_DAWAT,
                IntizamiStatusesEnum::MEMBER_REGIONAL_DAWATI_COMMITTEE,
                IntizamiStatusesEnum::REGIONAOL_NAZIM_E_TARBIAT_COURSE_1,
                IntizamiStatusesEnum::MEMBER_REGIONAL_TARBIATI_COMMITTEE_COURSE_1,
                IntizamiStatusesEnum::REGIONAOL_NAZIM_E_TARBIAT_COURSE_2,
                IntizamiStatusesEnum::MEMBER_REGIONAL_TARBIATI_COMMITTEE_COURSE_2,
                IntizamiStatusesEnum::REGIONAOL_NAZIM_E_MALIYAT,
                IntizamiStatusesEnum::MEMBER_REGIONAL_MALIYAT_COMMITTEE,
                IntizamiStatusesEnum::REGIONAOL_NAZIM_E_NASHRIYAT,
                IntizamiStatusesEnum::MEMBER_REGIONAL_NASHRIYAT_COMMITTEE,
                IntizamiStatusesEnum::REGIONAOL_NAZIM_E_RAHIMIA,
                IntizamiStatusesEnum::MEMBER_REGIONAL_RAHIMIA_COMMITTEE,
            ])
            ->get()
            ->map(fn ($status) => [
                'id' => $status->id,
                'name' => $status->name
            ]);
    }
}

function maliyat_update()
{
    return auth()->user()->hasAnyRole(RolesEnum::ZONALNAZIMEMALIYAT);
}

function dawat_update()
{
    return auth()->user()->hasAnyRole(RolesEnum::ZONALNAZIMEDAWAT);
}

function tarbiat_update()
{
    return auth()->user()->hasAnyRole(RolesEnum::ZONALNAZIMUETARBIATCOURSE1);
}

function region_intizamia_update()
{
    return auth()->user()->hasAnyRole(RolesEnum::REGIONALSADR, RolesEnum::REGIONALNAZIMUMOOMI);
}

function zonal_intizamia_update()
{
    return auth()->user()->hasAnyRole(RolesEnum::ZONALSADR, RolesEnum::ZONALNAZIMUMOOMI);
}

function shehar_intizamia_update()
{
    return auth()->user()->hasAnyRole(RolesEnum::SADRESHEHAR, RolesEnum::NAZIMEUMOOMISHEHAR);
}

function halqa_intizamia_update()
{
    return auth()->user()->hasAnyRole(RolesEnum::SADREHALQA, RolesEnum::NAZIMUMOOMIHALQA);
}

function unit_intizamia_update()
{
    return auth()->user()->hasAnyRole(RolesEnum::SADREUNIT, RolesEnum::NAZIMEUMOOMIUNIT);
}

function regions()
{
    return Region::all()
        ->map(fn ($region) => [
            'id' => $region->id,
            'name' => $region->name
        ]);
}

function zones()
{
    return Zone::all()
        ->map(fn ($zone) => [
            'id' => $zone->id,
            'name' => $zone->name
        ]);
}

function shehars()
{
    return Shehar::all()
        ->map(fn ($shehar) => [
            'id' => $shehar->id,
            'name' => $shehar->name
        ]);
}

function halqas()
{
    return Halqa::all()
        ->map(fn ($halqa) => [
            'id' => $halqa->id,
            'name' => $halqa->name
        ]);
}

function units()
{
    return Unit::all()
        ->map(fn ($unit) => [
            'id' => $unit->id,
            'name' => $unit->name
        ]);
}
