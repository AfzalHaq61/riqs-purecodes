<?php

namespace App\Models;

use App\Enums\ResourcesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'first_name',
        'second_name',
        'father_name',
        'email',
        'phone_number',
        'cnic',
        'permanent_address',
        'present_address',
        'education',
        'user_id',
        'dawati_status_id',
        'tarbiati_status_id',
        'intizami_status_id',
        'region_id',
        'zone_id',
        'shehar_id',
        'halqa_id',
        'unit_id',
        'maliyat',
    ];

    public static function resource()
    {
        $resources = Resource::paginate(request('show_per_page') ?? 50);

        $muhazir_e_dawat = Resource::paginate(request('show_per_page') ?? 50)
            ->where('dawati_status_id', ResourcesEnum::muhazir_e_dawat);
        $dayee = Resource::paginate(request('show_per_page') ?? 50)
            ->where('dawati_status_id', ResourcesEnum::dayee);
        $muawin_daee = Resource::paginate(request('show_per_page') ?? 50)
            ->where('dawati_status_id', ResourcesEnum::muawin_daee);

        $maduu = Resource::paginate(request('show_per_page') ?? 50)
            ->where('tarbiati_status_id', ResourcesEnum::maduu);
        $madni_hall = Resource::paginate(request('show_per_page') ?? 50)
            ->where('tarbiati_status_id', ResourcesEnum::madni_hall);
        $course_1 = Resource::paginate(request('show_per_page') ?? 50)
            ->where('tarbiati_status_id', ResourcesEnum::course_1);
        $course_2 = Resource::paginate(request('show_per_page') ?? 50)
            ->where('tarbiati_status_id', ResourcesEnum::course_2);
        $course_3 = Resource::paginate(request('show_per_page') ?? 50)
            ->where('tarbiati_status_id', ResourcesEnum::course_3);
        $mohazir_course_1 = Resource::paginate(request('show_per_page') ?? 50)
            ->where('tarbiati_status_id', ResourcesEnum::mohazir_course_1);
        $mohazir_course_2 = Resource::paginate(request('show_per_page') ?? 50)
            ->where('tarbiati_status_id', ResourcesEnum::mohazir_course_2);
        $mohazir_course_3 = Resource::paginate(request('show_per_page') ?? 50)
            ->where('tarbiati_status_id', ResourcesEnum::mohazir_course_3);

        $total = $resources->count();

        $total_mahazir_e_dawat = $muhazir_e_dawat->count();
        $total_dayee = $dayee->count();
        $total_muawin_daee = $muawin_daee->count();
        $total_maduu = $maduu->count();
        $total_madni_hall = $madni_hall->count();

        $total_course_1 = $course_1->count();
        $total_course_2 = $course_2->count();
        $total_course_3 = $course_3->count();
        $total_mohazir_course_1 = $mohazir_course_1->count();
        $total_mohazir_course_2 = $mohazir_course_2->count();
        $total_mohazir_course_3 = $mohazir_course_3->count();

        return [
            $total,
            $total_mahazir_e_dawat,
            $total_dayee,
            $total_muawin_daee,
            $total_maduu,
            $total_madni_hall,
            $total_course_1,
            $total_course_2,
            $total_course_3,
            $total_mohazir_course_1,
            $total_mohazir_course_2,
            $total_mohazir_course_3
        ];
    }

    // Relations

    public function dawatiStatus()
    {
        return $this->belongsTo(Status::class);
    }

    public function tarbiatiStatus()
    {
        return $this->belongsTo(Status::class);
    }

    public function intizamiStatus()
    {
        return $this->belongsTo(Status::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function shehar()
    {
        return $this->belongsTo(Shehar::class);
    }

    public function halqa()
    {
        return $this->belongsTo(Halqa::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function maliyat()
    {
        return $this->hasMany(Maliyat::class);
    }

    public function maliyatMonthly()
    {
        return $this->hasOne(Maliyat::class);
    }

    public function rahimia()
    {
        return $this->hasMany(Rahimia::class);
    }

    public function rahimiaMonthly()
    {
        return $this->hasOne(Rahimia::class);
    }

    public function semesters()
    {
        return $this->belongsToMany(Semester::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
