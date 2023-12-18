<?php

namespace App\Http\Controllers;

use App\Http\Resources\SemesterCollection;
use App\Models\Center;
use App\Models\Semester;
use Inertia\Inertia;

class CenterSemesterController extends Controller
{
    public function show(Center $center)
    {
        $query = Semester::query()->where('center_id', $center->id)->paginate(50);
        return Inertia::render('Semester', [
            'semester' => new SemesterCollection($query),
            'total_semesters' => Semester::all()->where('center_id', $center->id)->count(),
        ]);
    }
}
